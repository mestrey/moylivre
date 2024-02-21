<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::get('/', fn () => view('pages.home'));

Route::get('/login', fn () => view('pages.login'))->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
// Route::get('/register', fn () => view('pages.register'))->name('register');
