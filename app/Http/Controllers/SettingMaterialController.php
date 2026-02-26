<?php

namespace App\Http\Controllers;

use App\Models\HomeMaterial;
use Illuminate\Http\Request;

class SettingMaterialController extends Controller
{
    public function index()
    {
        $materials = HomeMaterial::latest()->get();
        return view('pages.setting_material.index', compact('materials'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required'
        ]);

        HomeMaterial::create($request->all());

        return redirect()->back()->with('success', 'Data berhasil ditambahkan');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required'
        ]);

        $material = HomeMaterial::findOrFail($id);
        $material->update($request->all());

        return redirect()->back()->with('success', 'Data berhasil diupdate');
    }

    public function destroy($id)
    {
        HomeMaterial::findOrFail($id)->delete();

        return redirect()->back()->with('success', 'Data berhasil dihapus');
    }
}