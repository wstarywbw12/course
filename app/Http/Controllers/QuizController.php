<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Quiz;
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
            'title'       => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $course->quizzes()->create($request->only('title', 'description'));

        return back()->with('success', 'Quiz berhasil ditambahkan');
    }

    public function update(Request $request, Quiz $quiz)
    {
        $request->validate([
            'title'       => 'required|string|max:255',
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
}
