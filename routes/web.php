<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => 'guest'], function () {
    Route::get('/', fn () => view('pages.home'))->name('home');

    Route::get('/login', fn () => view('pages.login'))->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.post');

    Route::get('/register', fn () => view('pages.register'))->name('register');
    Route::post('/register', [AuthController::class, 'register'])->name('register.post');
});

Route::group(['middleware' => 'auth'], function () {
    Route::get('/profile', fn () => view('pages.profile'))->name('profile');

    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
});
