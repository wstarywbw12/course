<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class SettingProfileController extends Controller
{
    public function index()
    {
        return view('pages.setting_profile.index', [
            'user' => Auth::user()
        ]);
    }

    public function update(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'name' => 'required|string|max:255',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'password_lama' => 'nullable',
            'password_baru' => 'nullable|min:6'
        ]);

        // Update name
        $user->name = $request->name;

        // Update foto
        if ($request->hasFile('foto')) {
            if ($user->foto) {
                Storage::delete('public/' . $user->foto);
            }

            $path = $request->file('foto')->store('profile', 'public');
            $user->foto = $path;
        }

        // Update password
        if ($request->filled('password_baru')) {

            if (!Hash::check($request->password_lama, $user->password)) {
                return back()->with('error', 'Password lama salah!');
            }

            $user->password = Hash::make($request->password_baru);
        }

        $user->save();

        return back()->with('success', 'Profile berhasil diperbarui!');
    }
}