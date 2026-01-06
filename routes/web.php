<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;

Route::get('/', function () {
    return redirect()->route('login.form');
});

Route::get('/login', [AdminController::class, 'loginForm'])->name('login.form');
Route::post('/login', [AdminController::class, 'login'])->name('login.submit');

Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
Route::get('/admin/logout', [AdminController::class, 'logout'])->name('admin.logout');
