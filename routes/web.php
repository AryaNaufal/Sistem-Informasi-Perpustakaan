<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookController;
use Illuminate\Support\Facades\Route;

Route::prefix('auth')->group(function () {
    // Login
    Route::get('login', [AuthController::class, 'showLogin'])->name('auth.login');
    Route::post('login', [AuthController::class, 'login'])->name('auth.login.post');

    // Register
    Route::get('register', [AuthController::class, 'showRegister'])->name('auth.register');
    Route::post('register', [AuthController::class, 'register'])->name('auth.register.post');

    // Forgot password
    Route::get('forgot-password', [AuthController::class, 'showForgotPasswordForm'])->name('auth.forgot-password');
    Route::post('forgot-password', [AuthController::class, 'sendResetLink'])->name('password.reset');
    Route::get('reset-password/{token}', [AuthController::class, 'showResetPasswordForm'])->name('auth.reset-password');
    Route::post('reset-password', [AuthController::class, 'resetPassword'])->name('auth.reset-password.post');

    // Logout
    Route::post('logout', [AuthController::class, 'logout'])->name('auth.logout');
});

Route::prefix('admin')->middleware('admin')->group(function () {
    Route::get('/dashboard', fn() => view('index'))->name('home');
    Route::resource('books', BookController::class);
});

Route::middleware('user')->group(function () {
    Route::get('/', fn() => view('user.dashboard'))->name('user.dashboard');
});
