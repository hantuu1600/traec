<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;

/**
 * AuthController
 *
 * Handle semua urusan login, register, dan logout.
 * Pake Form Request biar controllernya bersih dari logic validasi.
 *
 * @package App\Http\Controllers
 */
class AuthController extends Controller
{
    /**
     * Tampilkan halaman login.
     *
     * @return View
     */
    public function loginView(): View
    {
        return view('pages.auth.login', ['title' => 'Login']);
    }

    /**
     * Tampilkan halaman register.
     *
     * @return View
     */
    public function registerView(): View
    {
        return view('pages.auth.register', ['title' => 'Register']);
    }

    /**
     * Proses POST login.
     * Validasi kredensial ada di LoginRequest.
     *
     * @param LoginRequest $request
     * @return RedirectResponse
     */
    public function loginProcess(LoginRequest $request): RedirectResponse
    {
        // Data udah validated di Request class, tinggal ambil.
        $loginId = $request->validated('login_id');
        $password = $request->validated('password');

        // Cek dulu user login pake email atau NIDN
        $field = filter_var($loginId, FILTER_VALIDATE_EMAIL) ? 'email' : 'nidn';
        $credentials = [
            $field => $loginId,
            'password' => $password
        ];

        if (Auth::attempt($credentials, $request->boolean('remember'))) {
            $request->session()->regenerate();

            // Arahkan user sesuai rolenya
            return match (Auth::user()->role) {
                'admin', 'super_admin' => redirect()->route('admin.dashboard'),
                default => redirect()->route('lecturer.dashboard'),
            };
        }

        // Kalau gagal login:
        return back()->withErrors([
            'login_id' => 'Akun tidak ditemukan atau password salah.',
        ])->onlyInput('login_id');
    }

    /**
     * Proses POST registrasi.
     * Validasi data lengkap ada di RegisterRequest.
     *
     * @param RegisterRequest $request
     * @return RedirectResponse
     */
    public function registerProcess(RegisterRequest $request): RedirectResponse
    {
        // Langsung create user baru
        User::create([
            'name' => $request->validated('name'),
            'email' => $request->validated('email'),
            'password' => Hash::make($request->validated('password')),
            'nidn' => $request->validated('nidn'),
            'prodi' => $request->validated('prodi'),
            'faculty' => $request->validated('faculty'),
            'position' => $request->validated('position'),
            'phonenumber' => $request->validated('phonenumber'),
            'role' => 'dosen', // Default register pasti dosen
        ]);

        return redirect()->route('login')
            ->with('success', 'Registrasi berhasil, silahkan login.');
    }

    /**
     * Logout user.
     *
     * @return RedirectResponse
     */
    public function logout(): RedirectResponse
    {
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();

        return redirect()->route('login');
    }
}
