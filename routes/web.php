<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

// Lecturer controllers
use App\Http\Controllers\Lecturer\DashboardController as LecturerDashboardController;
use App\Http\Controllers\Lecturer\ProfileController;
use App\Http\Controllers\Lecturer\TeachingController;
use App\Http\Controllers\Lecturer\TeachingEditRequestController;
use App\Http\Controllers\Lecturer\ResearchController;
use App\Http\Controllers\Lecturer\PeriodController;
use App\Http\Controllers\Lecturer\SubmissionController;

// Admin controllers
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\LecturersController;
use App\Http\Controllers\Admin\DocumentController;

Route::get('/', fn() => redirect()->route('login'));

Route::get('/pages/login', [AuthController::class, 'loginView'])->name('login');
Route::get('/pages/register', [AuthController::class, 'registerView'])->name('register');

Route::post('/login', [AuthController::class, 'loginProcess'])->name('login.process');
Route::post('/register', [AuthController::class, 'registerProcess'])->name('register.process');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware('auth')->group(function () {
    Route::get('/password/change', [\App\Http\Controllers\Auth\ChangePasswordController::class, 'edit'])->name('password.edit');
    Route::put('/password/change', [\App\Http\Controllers\Auth\ChangePasswordController::class, 'update'])->name('password.update');
});

Route::middleware(['auth', 'role:dosen'])->prefix('lecturer')->name('lecturer.')->group(function () {

    Route::get('/dashboard', [LecturerDashboardController::class, 'dashboardLecturerView'])
        ->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'profile'])->name('profile');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');

    Route::prefix('teaching')->name('teaching.')->group(function () {
        Route::get('/', [TeachingController::class, 'index'])->name('index');

        Route::get('/create', [TeachingController::class, 'create'])->name('create');
        Route::post('/', [TeachingController::class, 'store'])->name('store');

        Route::get('/{id}', [TeachingController::class, 'show'])->name('show');
        Route::get('/{id}/edit', [TeachingController::class, 'edit'])->name('edit');
        Route::put('/{id}', [TeachingController::class, 'update'])->name('update');
        Route::post('/{id}/evidence', [TeachingController::class, 'uploadEvidence'])->name('evidence.upload');
        Route::delete('/{id}/evidence/{evidenceId}', [TeachingController::class, 'deleteEvidence'])->name('evidence.delete');
        Route::post('/{id}/submit', [TeachingController::class, 'submit'])->name('submit');

        Route::get('/{id}/request-edit', [TeachingEditRequestController::class, 'create'])->name('request.edit');
        Route::post('/{id}/request-edit', [TeachingEditRequestController::class, 'store'])->name('request.store');
    });

    Route::prefix('research')->name('research.')->group(function () {
        Route::get('/', [ResearchController::class, 'index'])->name('index');

        Route::get('/create', [ResearchController::class, 'create'])->name('create');
        Route::post('/', [ResearchController::class, 'store'])->name('store');

        Route::get('/{id}', [ResearchController::class, 'show'])->name('show');
        Route::get('/{id}/edit', [ResearchController::class, 'edit'])->name('edit');
        Route::put('/{id}', [ResearchController::class, 'update'])->name('update');
        Route::post('/{id}/evidence', [ResearchController::class, 'uploadEvidence'])->name('evidence.upload');
        Route::delete('/{id}/evidence/{evidenceId}', [ResearchController::class, 'deleteEvidence'])->name('evidence.delete');
        Route::post('/{id}/submit', [ResearchController::class, 'submit'])->name('submit');

        Route::get('/{id}/request-edit', [\App\Http\Controllers\Lecturer\ResearchEditRequestController::class, 'create'])->name('request.edit');
        Route::post('/{id}/request-edit', [\App\Http\Controllers\Lecturer\ResearchEditRequestController::class, 'store'])->name('request.store');
    });

    Route::prefix('community-service')->name('community-service.')->group(function () {
        Route::get('/', [\App\Http\Controllers\Lecturer\CommunityServiceController::class, 'index'])->name('index');

        Route::get('/create', [\App\Http\Controllers\Lecturer\CommunityServiceController::class, 'create'])->name('create');
        Route::post('/', [\App\Http\Controllers\Lecturer\CommunityServiceController::class, 'store'])->name('store');

        Route::get('/{id}', [\App\Http\Controllers\Lecturer\CommunityServiceController::class, 'show'])->name('show');
        Route::get('/{id}/edit', [\App\Http\Controllers\Lecturer\CommunityServiceController::class, 'edit'])->name('edit');
        Route::put('/{id}', [\App\Http\Controllers\Lecturer\CommunityServiceController::class, 'update'])->name('update');
        Route::post('/{id}/evidence', [\App\Http\Controllers\Lecturer\CommunityServiceController::class, 'uploadEvidence'])->name('evidence.upload');
        Route::delete('/{id}/evidence/{evidenceId}', [\App\Http\Controllers\Lecturer\CommunityServiceController::class, 'deleteEvidence'])->name('evidence.delete');
        Route::post('/{id}/submit', [\App\Http\Controllers\Lecturer\CommunityServiceController::class, 'submit'])->name('submit');
    });

    Route::prefix('support')->name('support.')->group(function () {
        Route::get('/', [\App\Http\Controllers\Lecturer\SupportController::class, 'index'])->name('index');

        Route::get('/create', [\App\Http\Controllers\Lecturer\SupportController::class, 'create'])->name('create');
        Route::post('/', [\App\Http\Controllers\Lecturer\SupportController::class, 'store'])->name('store');

        Route::get('/{id}', [\App\Http\Controllers\Lecturer\SupportController::class, 'show'])->name('show');
        Route::get('/{id}/edit', [\App\Http\Controllers\Lecturer\SupportController::class, 'edit'])->name('edit');
        Route::put('/{id}', [\App\Http\Controllers\Lecturer\SupportController::class, 'update'])->name('update');
        Route::post('/{id}/evidence', [\App\Http\Controllers\Lecturer\SupportController::class, 'uploadEvidence'])->name('evidence.upload');
        Route::delete('/{id}/evidence/{evidenceId}', [\App\Http\Controllers\Lecturer\SupportController::class, 'deleteEvidence'])->name('evidence.delete');
        Route::post('/{id}/submit', [\App\Http\Controllers\Lecturer\SupportController::class, 'submit'])->name('submit');
    });

    // Verified Documents
    Route::get('/verified-documents', [\App\Http\Controllers\Lecturer\VerifiedDocumentsController::class, 'index'])->name('verified-documents.index');

    Route::prefix('period')->name('period.')->group(function () {
        Route::get('/status', [PeriodController::class, 'status'])->name('status');
    });

    Route::get('/submissions', [SubmissionController::class, 'index'])
        ->name('submissions.index');
});

Route::middleware(['auth', 'role:admin,super_admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminDashboardController::class, 'dashboardAdminView'])->name('dashboard');

    // Lecturer Management
    Route::resource('lecturers', \App\Http\Controllers\Admin\LecturerController::class, ['names' => 'lecturers']);

    // Document Verification
    Route::get('/document-request', [DocumentController::class, 'index'])->name('document-request.index');
    Route::get('/document-request/{category}/{id}', [DocumentController::class, 'show'])->name('document-request.show');

    Route::put('/document-request/{category}/{id}/approve', [DocumentController::class, 'approve'])->name('document-request.approve');
    Route::put('/document-request/{category}/{id}/reject', [DocumentController::class, 'reject'])->name('document-request.reject');

    // Period Management
    Route::resource('periods', \App\Http\Controllers\Admin\PeriodController::class);
    Route::put('/periods/{id}/activate', [\App\Http\Controllers\Admin\PeriodController::class, 'activate'])->name('periods.activate');


});

Route::middleware(['auth', 'role:super_admin'])->prefix('superadmin')->name('superadmin.')->group(function () {
    Route::resource('admins', \App\Http\Controllers\SuperAdmin\AdminManagementController::class);
});



Route::get('/pages/admin/dashboard', fn() => redirect()->route('admin.dashboard'));
Route::get('/pages/lecturer/dashboard', fn() => redirect()->route('lecturer.dashboard'));
Route::get('/pages/admin/lecturers', fn() => redirect()->route('admin.lecturers.index'));
Route::get('/pages/admin/document-request', fn() => redirect()->route('admin.document-request.index'));
