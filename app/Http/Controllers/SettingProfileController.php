<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use App\Models\Level;
use App\Models\UserMaterialActivity;

class SettingProfileController extends Controller
{
    public function index()
    {
        $userId = Auth::id();
        
        // Ambil semua level dengan courses dan materials
        $levels = Level::with('courses.materials')->get();
        
        // Ambil material IDs yang sudah complete
        $completedMaterialIds = UserMaterialActivity::where('user_id', $userId)
            ->where('activity_type', 'complete')
            ->pluck('material_id')
            ->toArray();
        
        // Hitung progress per level
        $levelProgress = [];
        $highestCompletedLevel = null;
        
        foreach ($levels as $level) {
            $materials = $level->courses->flatMap->materials;
            $total = $materials->count();
            $completed = $materials->whereIn('id', $completedMaterialIds)->count();
            
            $progress = $total > 0 ? round(($completed / $total) * 100) : 0;
            $levelProgress[$level->id] = $progress;
            
            // Cek apakah level ini sudah complete (100%)
            if ($progress >= 100) {
                $highestCompletedLevel = $level;
            }
        }
        
        // Tentukan title berdasarkan level tertinggi yang complete
        $userTitle = $highestCompletedLevel ? $highestCompletedLevel->level : 'Beginner';
        
        return view('pages.setting_profile.index', [
            'user' => Auth::user(),
            'userTitle' => $userTitle
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