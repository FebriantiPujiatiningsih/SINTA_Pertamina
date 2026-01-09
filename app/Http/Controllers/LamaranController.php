<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LamaranController extends Controller
{
    public function tampilkanForm(Request $request)
    {
        // 1. Tangkap data yang dikirim dari link (Judul & Lokasi)
        // Kalau tidak ada data (kosong), kita kasih default strip '-'
        $judul_lowongan = $request->query('posisi', '-'); 
        $lokasi = $request->query('region', '-');

        // 2. Kirim data tersebut ke View (Halaman Form)
        // Pastikan nama file view-nya sesuai (misal: 'form-biodata')
        return view('form-biodata', [
            'judul' => $judul_lowongan,
            'lokasi' => $lokasi
        ]);
    }
}