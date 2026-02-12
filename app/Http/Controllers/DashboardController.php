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
}
