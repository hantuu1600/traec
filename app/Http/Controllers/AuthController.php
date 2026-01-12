<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function loginView() {
        return view('pages.login', ['title' => 'Login']);
    }

    public function registerView() {
        return view('pages.register', ['title' => 'Register']);
    }

    public function loginProcess(Request $request)
    {
        $request->validate([
            'login_id' => 'required',
            'password' => 'required'
        ]);

        $loginId = $request->login_id;
        $password = $request->password;

        $field = filter_var($loginId, FILTER_VALIDATE_EMAIL)
            ? 'email'
            : 'nidn';

        if (Auth::attempt([$field => $loginId, 'password' => $password])) {
            $request->session()->regenerate();

            if (auth()->user()->role === 'admin') {
                return redirect('/pages/admin/dashboard');
            }

            return redirect('/pages/lecturer/dashboard');
        }

        return back()->withErrors([
            'login_id' => 'Email / NIDN atau Password salah'
        ]);
    }

    public function registerProcess(Request $request)
    {
        $request->validate([
            'name'        => 'required|min:3',
            'email'       => 'required|email|unique:users',
            'password'    => 'required|min:8',
            'nidn'        => 'required|numeric|min_digits:6',
            'prodi'       => 'required',
            'faculty'     => 'required',
            'position'    => 'required',
            'phonenumber' => 'required|min:10'
        ]);

        User::create([
            'name'        => $request->name,
            'email'       => $request->email,
            'password'    => Hash::make($request->password),
            'nidn'        => $request->nidn,
            'prodi'       => $request->prodi,
            'faculty'     => $request->faculty,
            'position'    => $request->position,
            'phonenumber' => $request->phonenumber,
            'role'        => 'dosen'
        ]);

        return redirect('/pages/login')
            ->with('success', 'Registration successful. Please log in.');
    }


}
