<?php

namespace App\Http\Controllers;

use App\Models\HomeFeature;
use Illuminate\Http\Request;

class SettingFeatureController extends Controller
{
    public function index()
    {
        $features = HomeFeature::latest()->get();
        return view('pages.setting_feature.index', compact('features'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'icon'  => 'required',
        ]);

        HomeFeature::create($request->all());

        return redirect()->back()->with('success', 'Data berhasil ditambahkan');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'icon'  => 'required',
        ]);

        $feature = HomeFeature::findOrFail($id);
        $feature->update($request->all());

        return redirect()->back()->with('success', 'Data berhasil diupdate');
    }

    public function destroy($id)
    {
        HomeFeature::findOrFail($id)->delete();

        return redirect()->back()->with('success', 'Data berhasil dihapus');
    }
}