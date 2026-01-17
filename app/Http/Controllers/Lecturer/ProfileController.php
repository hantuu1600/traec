<?php

namespace App\Http\Controllers\Lecturer;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class ProfileController extends Controller
{
    public function profile()
    {
        $prodis = ['Informatika', 'Sistem Informasi', 'Teknik Industri', 'Manajemen', 'Akuntansi', 'Desain Komunikasi Visual', 'Bahasa Inggris'];
        $faculties = ['Fakultas Teknik', 'Fakultas Bisnis & Manajemen', 'Fakultas Ekonomi', 'Fakultas Seni & Desain', 'Fakultas Bahasa'];

        return view('pages.lecturer.profile', [
            'title' => 'My Profile',
            'user' => Auth::user(),
            'prodis' => $prodis,
            'faculties' => $faculties
        ]);
    }

    public function update(Request $request)
    {
        $user = Auth::user();

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => ['required', 'email', Rule::unique('users')->ignore($user->id)],
            'nidn' => ['required', 'string', Rule::unique('users')->ignore($user->id)],
            'phonenumber' => 'required|string|max:20',
            'prodi' => 'required|string|max:100',
            'faculty' => 'required|string|max:100',
            'position' => 'required|string|max:100',
        ]);

        $user->update($validated);

        return back()->with('success', 'Profil berhasil diperbarui!');
    }
}
