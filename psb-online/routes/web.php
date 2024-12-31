<?php

use App\Http\Controllers\AdminDashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DataUserController;
use App\Http\Controllers\PendaftaranController;
use App\Http\Controllers\registerController;
use App\Http\Controllers\UserDashboardCOntroller;

use App\Http\Middleware\user;

Route::get('/', function () {
    return view('homepage');
});


Route::middleware(['guest'])->group(function () {
    Route::get('/login', [AuthController::class, 'index'])->name('login');
    Route::post('/login-post', [AuthController::class, 'login'])->name('login-post');

    Route::get('/register', [registerController::class, 'index'])->name('register-show');
    Route::post('/register-post', [registerController::class, 'store'])->name('register-post');
});

// Rute untuk admin dashboard
Route::middleware(['auth', user::class . ':admin'])->group(function () {
    Route::post('/logout-admin', [AuthController::class, 'logout'])->name('logout-admin');
    Route::get('/dashboard-admin', [AdminDashboardController::class, 'index'])->name('dashboard-admin');
    Route::get('/show-admin/{id}', [AdminDashboardController::class, 'show'])->name('show-admin');

    Route::get('/data-user', [DataUserController::class, 'index'])->name('data-user');
    Route::get('/data-user-create', [DataUserController::class, 'create'])->name('data-user-create');
    Route::post('/data-user-store', [DataUserController::class, 'store'])->name('data-user-store');
    Route::get('/data-user/{id}/edit', [DataUserController::class, 'edit'])->name('data-user-edit');
    Route::put('/data-user/{id}', [DataUserController::class, 'update'])->name('data-user.update');
    Route::delete('/data-user/{id}', [DataUserController::class, 'destroy'])->name('data-user.destroy');
});

// Rute untuk user dashboard
Route::middleware(['auth', user::class . ':user'])->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::get('/dashboard', [UserDashboardCOntroller::class, 'index'])->name('dashboard');

    Route::get('/status-pendaftaran', [PendaftaranController::class, 'index'])->name('status-pendaftaran');
    Route::get('/status-pendaftaran-show/{id}', [PendaftaranController::class, 'show'])->name('status-pendaftaran-show');

    Route::get('/pendaftaran-create', [PendaftaranController::class, 'create'])->name('pendaftaran-create');
    Route::post('/pendaftaran-store', [PendaftaranController::class, 'store'])->name('pendaftaran-store');

    Route::get('/pendaftaran-edit/{id}', [PendaftaranController::class, 'edit'])->name('pendaftaran-edit');
    Route::put('/pendaftaran-update/{id}', [PendaftaranController::class, 'update'])->name('pendaftaran-update');

    Route::delete('/pendaftaran-delete/{id}', [PendaftaranController::class, 'destroy'])->name('pendaftaran-delete');

    Route::get('/pendaftaran-pdf/{id}', [PendaftaranController::class, 'generatePDF'])->name('pendaftaran-pdf');
});
