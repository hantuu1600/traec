<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;

Route::get('/', fn() => redirect('/pages/login'));
Route::get('/pages/login', [AuthController::class, 'loginView'])->name('login');
Route::get('/pages/register', [AuthController::class, 'registerView'])->name('register');
Route::get('/pages/dashboard-admin', [DashboardController::class, 'dashboardAdminView'])->name('dashboard-admin');