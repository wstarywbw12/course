<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Quiz;
use App\Models\UserQuizAnswer;
use App\Models\UserQuizResult;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class QuizController extends Controller
{
    public function index(Course $course)
    {
        $course->load(['level', 'quizzes']);

        return view('pages.courses.quiz.index', compact('course'));
    }

    public function store(Request $request, Course $course)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'time' => 'required|integer',
            'description' => 'nullable|string',
        ]);

        $course->quizzes()->create($request->only('title', 'time', 'description'));

        return back()->with('success', 'Quiz berhasil ditambahkan');
    }

    public function update(Request $request, Quiz $quiz)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'time' => 'required|integer',
            'description' => 'nullable|string',
        ]);

        $quiz->update($request->only('title', 'time', 'description'));

        return back()->with('success', 'Quiz berhasil diperbarui');
    }

    public function destroy(Quiz $quiz)
    {
        $quiz->delete();

        return back()->with('success', 'Quiz berhasil dihapus');
    }

    public function submit(Request $request, Quiz $quiz)
    {
        $userId = Auth::id();

        $score = 0;
        $total = $quiz->questions->count();

        // hapus jawaban lama jika ada
        UserQuizAnswer::where('user_id', $userId)
            ->where('quiz_id', $quiz->id)
            ->delete();

        foreach ($quiz->questions as $question) {

            $selectedOptionId = $request->answers[$question->id] ?? null;

            if (! $selectedOptionId) {
                continue;
            }

            $option = $question->options()
                ->where('id', $selectedOptionId)
                ->first();

            $isCorrect = $option->is_correct ?? false;

            if ($isCorrect) {
                $score++;
            }

            UserQuizAnswer::create([
                'user_id' => $userId,
                'quiz_id' => $quiz->id,
                'quiz_question_id' => $question->id,
                'quiz_option_id' => $selectedOptionId,
                'is_correct' => $isCorrect,
            ]);
        }

        $finalScore = round(($score / $total) * 100);

        UserQuizResult::updateOrCreate(
            [
                'user_id' => $userId,
                'quiz_id' => $quiz->id,
            ],
            [
                'score' => $finalScore,
                'is_passed' => $finalScore >= 70,
                'submitted_at' => now(),
            ]
        );

        return redirect()->back()
            ->with('quiz_result', [
                'score' => $finalScore,
                'passed' => $finalScore >= 70,
            ]);
    }
}
