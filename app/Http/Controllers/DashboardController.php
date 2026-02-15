<?php

namespace App\Http\Controllers;

use App\Models\Course;

class DashboardController extends Controller
{
    public function index()
    {
        $courses = Course::with('level')->get();

        return view('dashboard', compact('courses'));
    }

    public function show(Course $course)
    {
        $course->load([
            'level',
            'materials' => function ($q) {
                $q->with([
                    'userActivity' => function ($qa) {
                        $qa->where('user_id', auth()->id());
                    },
                ])->orderBy('order_number');
            },
            'quizzes.questions.options', // ✅ penting
        ]);

        return view('pages.course.detail', compact('course'));
    }
}
