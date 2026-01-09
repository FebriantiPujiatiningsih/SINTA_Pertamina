<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pendaftaran_magang', function (Blueprint $table) {
            $table->id();
            
            // Tahap 1: Data Diri
            $table->string('foto_profil')->nullable();
            $table->string('nama_lengkap');
            $table->string('email_pribadi')->unique();
            $table->string('tempat_lahir')->nullable();
            $table->date('tanggal_lahir')->nullable();
            $table->string('no_hp')->nullable();
            $table->string('instagram')->nullable();
            $table->text('alamat_lengkap')->nullable();
            
            // Tahap 2: Data Kampus
            $table->string('nama_perguruan_tinggi')->nullable();
            $table->string('fakultas')->nullable();
            $table->string('program_studi')->nullable();
            $table->integer('semester')->nullable();
            $table->decimal('ipk', 3, 2)->nullable();
            $table->string('nim')->nullable();
            
            // Tahap 3: Data Magang
            $table->string('company')->nullable();
            $table->string('region')->nullable();
            $table->string('lokasi')->nullable();
            $table->string('rekomendasi_pegawai')->nullable();
            $table->date('mulai_magang')->nullable();
            $table->date('selesai_magang')->nullable();
            
            // Tahap 4: File Pendukung (Simpan Nama File)
            $table->string('cv')->nullable();
            $table->string('transkrip')->nullable();
            $table->string('surat_pengantar')->nullable();
            $table->string('proposal')->nullable();
            $table->string('portfolio')->nullable();
            
            // Status & Timestamps
            $table->enum('status_pendaftaran', ['pending', 'diterima', 'ditolak'])->default('pending');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pendaftaran_magang');
    }
};