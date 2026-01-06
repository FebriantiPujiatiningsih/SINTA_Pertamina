<?php

use Illuminate\Support\Facades\Route;
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
})->name('penelitian.data-diri');


// ADMIN
Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', [AdminController::class, 'loginForm'])->name('login.form');
Route::post('/login', [AdminController::class, 'login'])->name('login.submit');

Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
Route::get('/admin/logout', [AdminController::class, 'logout'])->name('admin.logout');
