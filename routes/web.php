<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MagangController;
use App\Http\Controllers\PenelitianController;
use App\Http\Controllers\HasilController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;

Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

/*
|--------------------------------------------------------------------------
| Pendaftaran Magang Kerja
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

});

// Magang routes
// Route::prefix('magang')->group(function () {
//     Route::get('/daftar', [MagangController::class, 'daftar'])->name('magang.daftar');
//     Route::post('/store', [MagangController::class, 'store'])->name('magang.store');
//     Route::get('/list', [MagangController::class, 'index'])->name('magang.index');
// });

// Hasil routes
Route::get('/hasil/cek', [HasilController::class, 'cek'])->name('hasil.cek');

Route::get('/data-diri', function () {
    // layouts (folder) . penelitian (folder) . DataDiri (nama file)
    return view('layouts.Penelitian.DashPeneliti');
})->name('penelitian.data-diri');


// Ganti baris yang error tadi jadi ini:
Route::view('/penelitian/formulir-biodata', 'layouts.Penelitian.form_bio')->name('penelitian.form_bio');