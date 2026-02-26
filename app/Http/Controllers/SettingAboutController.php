<?php

namespace App\Http\Controllers;

use App\Models\About;
use Illuminate\Http\Request;

class SettingAboutController extends Controller
{
    public function index()
    {
        $abouts = About::latest()->get();
        return view('pages.setting_about.index', compact('abouts'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'sub_title' => 'required',
            'icon' => 'required',
        ]);

        About::create($request->all());

        return redirect()->back()->with('success', 'Data berhasil ditambahkan');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'sub_title' => 'required',
            'icon' => 'required',
        ]);

        $about = About::findOrFail($id);
        $about->update($request->all());

        return redirect()->back()->with('success', 'Data berhasil diupdate');
    }

    public function destroy($id)
    {
        About::findOrFail($id)->delete();

        return redirect()->back()->with('success', 'Data berhasil dihapus');
    }
}