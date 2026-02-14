<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Quiz;
use App\Models\UserQuizResult;
use Illuminate\Http\Request;

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
            'description' => 'nullable|string',
        ]);

        $course->quizzes()->create($request->only('title', 'description'));

        return back()->with('success', 'Quiz berhasil ditambahkan');
    }

    public function update(Request $request, Quiz $quiz)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $quiz->update($request->only('title', 'description'));

        return back()->with('success', 'Quiz berhasil diperbarui');
    }

    public function destroy(Quiz $quiz)
    {
        $quiz->delete();

        return back()->with('success', 'Quiz berhasil dihapus');
    }

    public function submit(Request $request, Quiz $quiz)
    {
        $quiz->load('questions.options');

        $score = 0;
        $total = $quiz->questions->count();

        foreach ($quiz->questions as $question) {

            $selectedOptionId = $request->answers[$question->id] ?? null;

            if ($selectedOptionId) {

                $option = $question->options
                    ->where('id', $selectedOptionId)
                    ->first();

                if ($option && $option->is_correct) {
                    $score++;
                }
            }
        }

        $finalScore = ($score / $total) * 100;
        $isPassed = $finalScore >= 70;

        UserQuizResult::create([
            'user_id' => auth()->id(),
            'quiz_id' => $quiz->id,
            'score' => $finalScore,
            'is_passed' => $isPassed,
            'submitted_at' => now(),
        ]);

        return redirect()->back()->with([
            'quiz_result' => [
                'score' => round($finalScore),
                'passed' => $isPassed,
            ],
        ]);

    }
}
