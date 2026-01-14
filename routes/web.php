<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TeachingController;
use App\Http\Controllers\ResearchController;

Route::get('/', fn() => redirect('/pages/login'));
Route::get('/pages/login', [AuthController::class, 'loginView'])->name('login');
Route::get('/pages/register', [AuthController::class, 'registerView'])->name('register');

Route::get('/pages/admin/dashboard', [DashboardController::class, 'dashboardAdminView'])->name('admin.dashboard');
Route::get('/pages/lecturer/dashboard', [DashboardController::class, 'dashboardLecturerView'])->name('lecturer.dashboard');


Route::prefix('lecturer')
    ->name('lecturer.')
    ->group(function () {


        Route::get('/profile', [ProfileController::class, 'profile'])
            ->name('profile');


        Route::prefix('teaching')
            ->name('teaching.')
            ->group(function () {

                // Teaching list
                Route::get('/', [TeachingController::class, 'index'])
                    ->name('index');

                // Teaching edit page
                Route::match(['get', 'put'], '{id}/edit', [TeachingController::class, 'edit'])
                    ->name('edit');

            });

        Route::prefix('research')
            ->name('research.')
            ->group(function () {

                // Research list
                Route::get('/', [ResearchController::class, 'index'])
                    ->name('index');

                // Research edit page
                Route::match(['get', 'put'], '{id}/edit', [ResearchController::class, 'edit'])
                    ->name('edit');
                
                 Route::get('create', [ResearchController::class, 'create'])
                    ->name('create');

                // Store Research
                Route::post('/', [ResearchController::class, 'store'])
                    ->name('store');
                    
                // Research update
                Route::match(['get', 'put'], '{id}/edit', [ResearchController::class, 'edit'])
                    ->name('edit');

            });
    });


Route::get('/pages/admin/lecturers', [App\Http\Controllers\LecturersController::class, 'LecturersView'])->name('admin.lecturers');

Route::get('/pages/admin/document-request', [App\Http\Controllers\DocumentController::class, 'DocumentView'])->name('admin.document-request');

Route::post('/login', [AuthController::class, 'loginProcess'])->name('login.process');
Route::post('/register', [AuthController::class, 'registerProcess'])->name('register.process');