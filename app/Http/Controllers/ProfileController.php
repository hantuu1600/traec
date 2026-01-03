<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function profile()
    {
        return view('pages.lecturer.profile', ['title' => 'My Profile']);
    }
}
