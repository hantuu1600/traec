<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function DashboardAdminView() {
        return view('pages.dashboard-admin', ['title' => 'Dashboard Admin']);
    }
}