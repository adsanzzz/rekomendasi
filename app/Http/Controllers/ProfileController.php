<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        // Mengisi data pengguna dengan data yang telah divalidasi
        $request->user()->fill($request->validated());

        // Jika email diubah, set email_verified_at menjadi null
        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        // Simpan perubahan pada pengguna
        $request->user()->save();

        // Redirect kembali ke form edit profil dengan status pesan
        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        // Validasi password untuk menghapus akun
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        // Logout pengguna
        Auth::logout();

        // Hapus pengguna dari database
        $user->delete();

        // Invalidate session dan regenerate CSRF token
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        // Redirect ke halaman utama
        return Redirect::to('/');
    }
}
