<?php

namespace App\Http\Controllers;

use App\Models\Penelitian;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PenelitianController extends Controller
{
    public function daftar()
    {
        return view('penelitian.daftar');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'research_field' => 'required|string|max:255',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
            'proposal' => 'required|file|mimes:pdf|max:10240'
        ]);

        $proposalPath = null;
        if ($request->hasFile('proposal')) {
            $proposalPath = $request->file('proposal')->store('proposals', 'public');
        }

        Penelitian::create([
            'user_id' => Auth::id(),
            'title' => $request->title,
            'description' => $request->description,
            'research_field' => $request->research_field,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'proposal_path' => $proposalPath,
            'status' => 'pending'
        ]);

        return redirect()->route('hasil.cek')->with('success', 'Pendaftaran penelitian berhasil diajukan!');
    }

    public function index()
    {
        $penelitian = Penelitian::with('user')->where('user_id', Auth::id())->get();
        return view('penelitian.index', compact('penelitian'));
    }
}