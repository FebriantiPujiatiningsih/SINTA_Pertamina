<?php

namespace App\Http\Controllers;

use App\Models\Magang;
use App\Models\Penelitian;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HasilController extends Controller
{
    public function cek()
    {
        $magang = Magang::where('user_id', Auth::id())->latest()->get();
        $penelitian = Penelitian::where('user_id', Auth::id())->latest()->get();

        return view('hasil.cek', compact('magang', 'penelitian'));
    }
}