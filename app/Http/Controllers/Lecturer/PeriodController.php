<?php

namespace App\Http\Controllers\Lecturer;

use App\Http\Controllers\Controller;

class PeriodController extends Controller
{
    public function status()
    {
        return view('pages.lecturer.period.status', ['title' => 'Period Status']);
    }
}
