<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function DashboardAdminView() {
        return view('pages.admin.dashboard', ['title' => 'Dashboard Admin']);
    }

    public function DashboardLecturerView() {
        return view('pages.lecturer.dashboard', ['title' => 'Dashboard Lecturer']);
    }
}