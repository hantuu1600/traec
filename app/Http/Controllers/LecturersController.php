<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LecturersController extends Controller
{
    public function LecturersView() {
        return view('pages.admin.lecturers', ['title' => 'Lecturers']);
    }
}