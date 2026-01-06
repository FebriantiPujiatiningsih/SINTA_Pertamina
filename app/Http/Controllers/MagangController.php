<?php

namespace App\Http\Controllers;

use App\Models\Magang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class MagangController extends Controller
{
    public function daftar()
    {
        return view('magang.daftar');
    }

    public function store(Request $request)
    {
        $request->validate([
            'division' => 'required|string|max:255',
            'position' => 'required|string|max:255',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
            'cv' => 'required|file|mimes:pdf|max:5120',
            'motivation_letter' => 'required|string'
        ]);

        $cvPath = null;
        if ($request->hasFile('cv')) {
            $cvPath = $request->file('cv')->store('cv', 'public');
        }

        Magang::create([
            'user_id' => Auth::id(),
            'division' => $request->division,
            'position' => $request->position,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'cv_path' => $cvPath,
            'motivation_letter' => $request->motivation_letter,
            'status' => 'pending'
        ]);

        return redirect()->route('hasil.cek')->with('success', 'Pendaftaran magang berhasil diajukan!');
    }

    public function index()
    {
        $magang = Magang::with('user')->where('user_id', Auth::id())->get();
        return view('magang.index', compact('magang'));
    }
}