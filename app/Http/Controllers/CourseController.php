<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Level;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function index()
    {
        return view('pages.courses.index', [
            'courses' => Course::with('level')->latest()->get(),
            'levels' => Level::all(),
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'level_id' => 'required|exists:levels,id',
            'description' => 'nullable|string',
        ]);

        Course::create($request->all());

        return back()->with('success', 'Course berhasil ditambahkan');
    }

    public function show(Course $course)
    {
        $course->load(['level', 'materials']);

        return view('pages.courses.detail', compact('course'));
    }

    public function update(Request $request, Course $course)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'level_id' => 'required|exists:levels,id',
            'description' => 'nullable|string',
        ]);

        $course->update($request->all());

        return back()->with('success', 'Course berhasil diperbarui');
    }

    public function destroy(Course $course)
    {
        $course->delete();

        return back()->with('success', 'Course berhasil dihapus');
    }
}
