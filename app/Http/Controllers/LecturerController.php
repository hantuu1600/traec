<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LecturerController extends Controller
{
    public function profile()
    {
        return view('pages.lecturer.profile', ['title' => 'My Profile']);
    }
}
