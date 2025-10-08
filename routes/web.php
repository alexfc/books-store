<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\AdminLoginController;
use App\Http\Controllers\Auth\BuyerLoginController;
use App\Http\Controllers\Auth\BuyerRegisterController;
use App\Http\Controllers\Admin\BookController;

/*
|--------------------------------------------------------------------------
| Public Routes
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('public')->group(function () {
    Route::get('/login', [BuyerLoginController::class, 'showLoginForm'])->name('public.login');
    Route::post('/login', [BuyerLoginController::class, 'login'])->name('public.login.submit');
    Route::post('/logout', [BuyerLoginController::class, 'logout'])->name('public.logout');

    Route::get('/register', [BuyerRegisterController::class, 'showRegistrationForm'])->name('public.register');
    Route::post('/register', [BuyerRegisterController::class, 'register'])->name('public.register.submit');

    Route::middleware('auth:buyer')->group(function () {
        Route::get('/dashboard', function () {
            return 'Welcome to the public dashboard, ' . Auth::guard('buyer')->user()->name;
        })->name('public.dashboard');
    });
});

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/

Route::prefix('admin')->group(function () {
    Route::get('/login', [AdminLoginController::class, 'showLoginForm'])->name('admin.login');
    Route::post('/login', [AdminLoginController::class, 'login'])->name('admin.login.submit');
    Route::post('/logout', [AdminLoginController::class, 'logout'])->name('admin.logout');

    Route::middleware('auth:web')->group(function () {
        Route::get('/dashboard', function () {
            return 'Welcome to the admin dashboard, ' . Auth::guard('web')->user()->name;
        })->name('admin.dashboard');

        Route::get('/books', [BookController::class, 'index'])->name('admin.books.index');
    });
});
