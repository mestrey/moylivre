<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::get('/', fn () => view('pages.home'))->name('home');

Route::get('/login', fn () => view('pages.login'))->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
// Route::get('/register', fn () => view('pages.register'))->name('register');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
});
