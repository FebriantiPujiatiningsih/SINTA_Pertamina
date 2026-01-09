<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MagangController;
use App\Http\Controllers\PenelitianController;
use App\Http\Controllers\HasilController;
use Illuminate\Support\Facades\Route;

Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

/*
|--------------------------------------------------------------------------
| MAGANG KERJA (TANPA LOGIN, PAKAI SESSION)
|--------------------------------------------------------------------------
*/
Route::prefix('magang')->group(function () {

    Route::get('/data-diri', function () {
        return view('layouts.Magang-Kerja.DataDiri');
    })->name('magang.data-diri');

    Route::get('/data-kampus', function () {
        return view('layouts.Magang-Kerja.DataKampus');
    })->name('magang.data-kampus');

    Route::get('/data-magang', function () {
        return view('layouts.Magang-Kerja.DataMagang');
    })->name('magang.data-magang');

    Route::get('/file-pendukung', function () {
        return view('layouts.Magang-Kerja.FilePendukung');
    })->name('magang.file-pendukung');

    // TAMBAHKAN INI:
    Route::post('/store', [MagangController::class, 'store'])->name('magang.store');
});


/*
|--------------------------------------------------------------------------
| PENELITIAN
|--------------------------------------------------------------------------
*/
Route::prefix('penelitian')->group(function () {

    Route::get('/data-diri', function () {
        return view('layouts.penelitian.DataDiri');
    })->name('penelitian.data-diri');

    Route::get('/daftar', [PenelitianController::class, 'daftar'])
        ->name('penelitian.daftar');

    Route::post('/store', [PenelitianController::class, 'store'])
        ->name('penelitian.store');

    Route::get('/list', [PenelitianController::class, 'index'])
        ->name('penelitian.index');
});

/*
|--------------------------------------------------------------------------
| HASIL
|--------------------------------------------------------------------------
*/
Route::get('/hasil/cek', [HasilController::class, 'cek'])->name('hasil.cek');
