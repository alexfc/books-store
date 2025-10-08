<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\AdminLoginController;
use App\Http\Controllers\Auth\BuyerLoginController;
use App\Http\Controllers\Auth\BuyerRegisterController;
use App\Http\Controllers\Admin\BookController;
use App\Http\Controllers\Public\BookController as PublicBookController;

/*
|--------------------------------------------------------------------------
| Public Routes
|--------------------------------------------------------------------------
*/

Route::group([], function () {
    Route::get('/login', [BuyerLoginController::class, 'showLoginForm'])->name('public.login');
    Route::post('/login', [BuyerLoginController::class, 'login'])->name('public.login.submit');
    Route::post('/logout', [BuyerLoginController::class, 'logout'])->name('public.logout');

    Route::get('/register', [BuyerRegisterController::class, 'showRegistrationForm'])->name('public.register');
    Route::post('/register', [BuyerRegisterController::class, 'register'])->name('public.register.submit');

    Route::get('/', [PublicBookController::class, 'index'])->name('public.books.index');
    Route::get('/books/{book}', [PublicBookController::class, 'show'])->name('public.books.show');

    Route::middleware('auth:buyer')->group(function () {
        Route::post('/books/{book}/rent', [PublicBookController::class, 'rent'])->name('public.books.rent');
        Route::post('/books/{book}/buy', [PublicBookController::class, 'buy'])->name('public.books.buy');
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
        Route::get('/books', [BookController::class, 'index'])->name('admin.books.index');
        Route::get('/books/create', [BookController::class, 'create'])->name('admin.books.create');
        Route::post('/books', [BookController::class, 'store'])->name('admin.books.store');
        Route::get('/books/{book}/edit', [BookController::class, 'edit'])->name('admin.books.edit');
        Route::put('/books/{book}', [BookController::class, 'update'])->name('admin.books.update');
    });
});
