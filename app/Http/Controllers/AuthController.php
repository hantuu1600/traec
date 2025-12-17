<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function loginView() {
        return view('pages.login', ['title' => 'Login']);
    }

    public function registerView() {
        return view('pages.register', ['title' => 'Register']);
    }
}
