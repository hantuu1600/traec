<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function loginView() {
        return view('auth.login', ['title' => 'Login']);
    }

    public function registerView() {
        return view('auth.register', ['title' => 'Register']);
    }
}
