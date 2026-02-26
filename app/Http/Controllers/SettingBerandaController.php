<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Beranda;

class SettingBerandaController extends Controller
{
    public function index()
    {
        $beranda = Beranda::first();

        // jika belum ada data, buat default kosong
        if (!$beranda) {
            $beranda = Beranda::create([]);
        }

        return view('pages.setting_beranda.index', compact('beranda'));
    }

    public function update(Request $request, $id)
    {
        $beranda = Beranda::findOrFail($id);

        $data = $request->except(['hero_image']);

        // upload hero image jika ada
        if ($request->hasFile('hero_image')) {
            $file = $request->file('hero_image');
            $filename = time().'_'.$file->getClientOriginalName();
            $file->move(public_path('uploads/beranda'), $filename);
            $data['hero_image'] = 'uploads/beranda/'.$filename;
        }

        $beranda->update($data);

        return redirect()->back()->with('success', 'Setting Beranda berhasil diupdate');
    }
}