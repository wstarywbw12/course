<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class SocialiteController extends Controller
{
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->stateless()->redirect(); // ← tambah stateless()
    }

    public function handleGoogleCallback()
{
    $googleUser = Socialite::driver('google')->stateless()->user();

    // Cari user by email dulu (kalau sudah pernah daftar manual)
    $user = User::where('email', $googleUser->email)->first();

    if ($user) {
        // Update google_id & avatar jika sudah ada akunnya
        $user->update([
            'google_id'          => $googleUser->id,
            'avatar'             => $googleUser->avatar,
            'email_verified_at'  => now(),
        ]);
    } else {
        // Buat akun baru jika belum pernah daftar
        $user = User::create([
            'name'               => $googleUser->name,
            'email'              => $googleUser->email,
            'google_id'          => $googleUser->id,
            'avatar'             => $googleUser->avatar,
            'email_verified_at'  => now(),
        ]);
    }

    Auth::login($user);

    return redirect('/dashboard');
}
}
