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
            'level' => 'required',
            'icon'  => 'nullable'
        ]);

        Level::create([
            'level' => $request->level,
            'icon'  => $request->icon
        ]);

        return redirect()->back()->with('success', 'Level berhasil ditambahkan');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'level' => 'required',
            'icon'  => 'nullable'
        ]);

        $level = Level::findOrFail($id);

        $level->update([
            'level' => $request->level,
            'icon'  => $request->icon
        ]);

        return redirect()->back()->with('success', 'Level berhasil diupdate');
    }

    public function destroy($id)
    {
        Level::findOrFail($id)->delete();
        return redirect()->back()->with('success', 'Level berhasil dihapus');
    }
}