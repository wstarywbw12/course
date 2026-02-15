<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\CourseMaterial;
use Illuminate\Http\Request;

class CourseMaterialController extends Controller
{
    public function store(Request $request, Course $course)
    {
        $request->validate([
            'title'        => 'required|string|max:255',
            'type'         => 'required|in:video,text',
            'time'         => 'nullable|integer',
            'content'      => 'required|string',
            'order_number' => 'nullable|integer',
        ]);

        $course->materials()->create($request->all());

        return back()->with('success', 'Materi berhasil ditambahkan');
    }

    public function update(Request $request, CourseMaterial $material)
    {
        $request->validate([
            'title'   => 'required|string|max:255',
            'type'    => 'required|in:video,text',
            'time'    => 'nullable|integer',
            'content' => 'required|string',
        ]);

        $material->update($request->all());

        return back()->with('success', 'Materi berhasil diperbarui');
    }

    public function destroy(CourseMaterial $material)
    {
        $material->delete();
        return back()->with('success', 'Materi berhasil dihapus');
    }
}
