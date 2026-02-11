<?php

namespace App\Http\Controllers;

use App\Models\Level;
use Illuminate\Http\Request;

class LevelController extends Controller
{
    public function index()
    {
        $levels = Level::orderBy('id')->get();
        return view('pages.levels.index', compact('levels'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'level' => 'required|string|max:50',
            'icon'  => 'nullable|string|max:100',
        ]);

        Level::create($request->only('level', 'icon'));

        return redirect()->route('levels.index')
            ->with('success', 'Level berhasil ditambahkan');
    }

    public function update(Request $request, Level $level)
    {
        $request->validate([
            'level' => 'required|string|max:50',
            'icon'  => 'nullable|string|max:100',
        ]);

        $level->update($request->only('level', 'icon'));

        return redirect()->route('levels.index')
            ->with('success', 'Level berhasil diperbarui');
    }

    public function destroy(Level $level)
    {
        $level->delete();

        return redirect()->route('levels.index')
            ->with('success', 'Level berhasil dihapus');
    }
}

