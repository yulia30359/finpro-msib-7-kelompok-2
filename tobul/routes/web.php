<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookController;

// Route Register
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

// Route Login
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

// Route Logout
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Route Dashboard
Route::middleware('auth')->group(function () {
    Route::get('/home', function () {
        return view('auth.home');
    })->name('auth.home');

    Route::get('/admin/dashboard', [BookController::class, 'index'])->name('auth.dashboard')->middleware('admin');
});

// Route Admin
Route::middleware(['auth', 'admin'])->group(function () {
    Route::resource('admin/books', BookController::class)->names([
        'index' => 'admin.books.index',
        'create' => 'admin.books.create',
        'store' => 'admin.books.store',
        'edit' => 'admin.books.edit',
        'update' => 'admin.books.update',
        'destroy' => 'admin.books.destroy',
    ]);
});