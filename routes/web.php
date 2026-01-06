<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MagangController;
use App\Http\Controllers\PenelitianController;
use App\Http\Controllers\HasilController;
use Illuminate\Support\Facades\Route;

Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

// Magang routes
Route::prefix('magang')->group(function () {
    Route::get('/daftar', [MagangController::class, 'daftar'])->name('magang.daftar');
    Route::post('/store', [MagangController::class, 'store'])->name('magang.store');
    Route::get('/list', [MagangController::class, 'index'])->name('magang.index');
});

// Penelitian routes
Route::prefix('penelitian')->group(function () {
    Route::get('/daftar', [PenelitianController::class, 'daftar'])->name('penelitian.daftar');
    Route::post('/store', [PenelitianController::class, 'store'])->name('penelitian.store');
    Route::get('/list', [PenelitianController::class, 'index'])->name('penelitian.index');
});

// Hasil routes
Route::get('/hasil/cek', [HasilController::class, 'cek'])->name('hasil.cek');

Route::get('/data-diri', function () {
    // layouts (folder) . penelitian (folder) . DataDiri (nama file)
    return view('layouts.penelitian.DataDiri');
});