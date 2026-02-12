<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

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
            'materials',   
            'quizzes'       
        ]);

        return view('pages.course.detail', compact('course'));
    }
}
