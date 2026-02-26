<?php

namespace App\Http\Controllers;

use App\Models\Beranda;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SettingBerandaController extends Controller
{
    public function index()
    {
        // Ambil data pertama dari tabel beranda (karena biasanya hanya 1 baris untuk setting)
        $beranda = Beranda::first();
        
        return view('pages.setting_beranda.index', compact('beranda'));
    }

    public function update(Request $request)
    {
        $beranda = Beranda::first();
        
        if (!$beranda) {
            $beranda = new Beranda();
        }

        // Validasi data
        $request->validate([
            'hero_title' => 'nullable|string',
            'hero_sub_title' => 'nullable|string',
            'hero_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'about_title' => 'nullable|string',
            'about_sub_title' => 'nullable|string',
            'material_title' => 'nullable|string',
            'material_sub_title' => 'nullable|string',
            'feature_title' => 'nullable|string',
            'feature_sub_title' => 'nullable|string',
            'feature_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'testimonial_title' => 'nullable|string',
            'testimonial_sub_title' => 'nullable|string',
            'cta_title' => 'nullable|string',
            'cta_sub_title' => 'nullable|string',
            'footer_about' => 'nullable|string',
            'footer_email' => 'nullable|email',
            'footer_hp' => 'nullable|string',
            'footer_website' => 'nullable|string',
            'footer_cp' => 'nullable|string',
        ]);

        // Handle upload hero image
        if ($request->hasFile('hero_image')) {
            // Hapus image lama jika ada
            if ($beranda->hero_image) {
                Storage::delete('public/' . $beranda->hero_image);
            }
            $heroImagePath = $request->file('hero_image')->store('beranda/hero', 'public');
            $beranda->hero_image = $heroImagePath;
        }

        // Handle upload feature image
        if ($request->hasFile('feature_image')) {
            // Hapus image lama jika ada
            if ($beranda->feature_image) {
                Storage::delete('public/' . $beranda->feature_image);
            }
            $featureImagePath = $request->file('feature_image')->store('beranda/feature', 'public');
            $beranda->feature_image = $featureImagePath;
        }

        // Update data
        $beranda->hero_title = $request->hero_title;
        $beranda->hero_sub_title = $request->hero_sub_title;
        $beranda->about_title = $request->about_title;
        $beranda->about_sub_title = $request->about_sub_title;
        $beranda->material_title = $request->material_title;
        $beranda->material_sub_title = $request->material_sub_title;
        $beranda->feature_title = $request->feature_title;
        $beranda->feature_sub_title = $request->feature_sub_title;
        $beranda->testimonial_title = $request->testimonial_title;
        $beranda->testimonial_sub_title = $request->testimonial_sub_title;
        $beranda->cta_title = $request->cta_title;
        $beranda->cta_sub_title = $request->cta_sub_title;
        $beranda->footer_about = $request->footer_about;
        $beranda->footer_email = $request->footer_email;
        $beranda->footer_hp = $request->footer_hp;
        $beranda->footer_website = $request->footer_website;
        $beranda->footer_cp = $request->footer_cp;

        $beranda->save();

        return redirect()->route('setting.beranda')->with('success', 'Pengaturan beranda berhasil diperbarui');
    }
}