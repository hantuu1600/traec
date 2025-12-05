<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::get('/', fn() => redirect('/auth/login'));
Route::get('/auth/login', [AuthController::class, 'loginView'])->name('login');
Route::get('/auth/register', [AuthController::class, 'registerView'])->name('register');