<?php

namespace App\Http\Controllers;

use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;


class AuthController extends Controller
{
    public function loginView(): View
    {
        return view('pages.auth.login', ['title' => 'Login']);
    }

    public function registerView(): View
    {
        return view('pages.auth.register', ['title' => 'Register']);
    }

    public function loginProcess(LoginRequest $request): RedirectResponse
    {
        $loginId = $request->validated('login_id');
        $password = $request->validated('password');

        $field = filter_var($loginId, FILTER_VALIDATE_EMAIL) ? 'email' : 'nidn';
        $credentials = [
            $field => $loginId,
            'password' => $password
        ];

        if (Auth::attempt($credentials, $request->boolean('remember'))) {
            $request->session()->regenerate();

            return match (Auth::user()->role) {
                'admin', 'super_admin' => redirect()->route('admin.dashboard'),
                default => redirect()->route('lecturer.dashboard'),
            };
        }

        return back()->withErrors([
            'login_id' => 'Akun tidak ditemukan atau password salah.',
        ])->onlyInput('login_id');
    }

    public function registerProcess(RegisterRequest $request): RedirectResponse
    {
        User::create([
            'name' => $request->validated('name'),
            'email' => $request->validated('email'),
            'password' => Hash::make($request->validated('password')),
            'nidn' => $request->validated('nidn'),
            'prodi' => $request->validated('prodi'),
            'faculty' => $request->validated('faculty'),
            'position' => $request->validated('position'),
            'phonenumber' => $request->validated('phonenumber'),
            'role' => 'dosen',
        ]);

        return redirect()->route('login')
            ->with('success', 'Registrasi berhasil, silahkan login.');
    }

    public function logout(): RedirectResponse
    {
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();

        return redirect()->route('login');
    }
}
