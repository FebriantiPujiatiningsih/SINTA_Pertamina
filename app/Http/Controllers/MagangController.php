<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MagangController extends Controller
{
    public function store(Request $request)
    {
        // 1. Validasi Data (Opsional tapi penting)
        $request->validate([
            'nama_lengkap' => 'required',
            'email_pribadi' => 'required|email|unique:pendaftaran_magang',
        ]);

        // 2. Proses Upload Foto (Tahap 1)
        $namaFoto = null;
        if ($request->hasFile('foto_profil')) {
            $namaFoto = time() . '.' . $request->foto_profil->extension();
            $request->foto_profil->move(public_path('uploads/foto'), $namaFoto);
        }

        // 3. Simpan ke Tabel pendaftaran_magang
        $id_pendaftar = DB::table('pendaftaran_magang')->insertGetId([
            'foto_profil'    => $namaFoto,
            'nama_lengkap'   => $request->nama_lengkap,
            'email_pribadi'  => $request->email_pribadi,
            'tempat_lahir'   => $request->tempat_lahir,
            'tanggal_lahir'  => $request->tanggal_lahir,
            'no_hp'          => $request->no_hp,
            'instagram'      => $request->instagram,
            'alamat_lengkap' => $request->alamat_lengkap,
            
            'nama_perguruan_tinggi' => $request->nama_perguruan_tinggi,
            'fakultas'              => $request->fakultas,
            'program_studi'         => $request->program_studi,
            'semester'              => $request->semester,
            'ipk'                   => $request->ipk,
            'nim'                   => $request->nim,
            
            'company'               => $request->company,
            'region'                => $request->region,
            'lokasi'                => $request->lokasi,
            'rekomendasi_pegawai'   => $request->rekomendasi_pegawai,
            'mulai_magang'          => $request->mulai_magang,
            'selesai_magang'        => $request->selesai_magang,
            'created_at'            => now()
        ]);

        // 4. Jika ada file pendukung (Tahap 4), simpan ke tabel dokumen_pendaftar
        // Anda bisa menambahkan logika upload PDF di sini mirip dengan upload foto

        return redirect()->back()->with('success', 'Pendaftaran berhasil disimpan!');
    }
}