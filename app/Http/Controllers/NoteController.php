<?php

namespace App\Http\Controllers;

use App\Models\Note;
use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NoteController extends Controller
{
    public function store(Request $request, Course $course)
    {
        $request->validate([
            'content' => 'required'
        ]);

        Note::create([
            'course_id' => $course->id,
            'user_id' => Auth::id(),
            'content' => $request->content
        ]);

        return back()->with('success', 'Note berhasil disimpan');
    }

    public function destroy(Note $note)
    {
        // hanya pemilik yang boleh hapus
        if ($note->user_id !== Auth::id()) {
            abort(403);
        }

        $note->delete();

        return back()->with('success', 'Note berhasil dihapus');
    }
}
