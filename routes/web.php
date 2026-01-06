<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/data-diri', function () {
    // layouts (folder) . penelitian (folder) . DataDiri (nama file)
    return view('layouts.penelitian.DataDiri');
});