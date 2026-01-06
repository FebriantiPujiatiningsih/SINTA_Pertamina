@extends('layouts.app')

@section('content')

    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            Form Data Diri Peneliti
        </div>
        <div class="card-body">
            <form>
                <div class="mb-3">
                    <label class="form-label">Nama Peneliti:</label>
                    <input type="text" name="nama" class="form-control" placeholder="Masukkan nama kamu">
                </div>
                
                <div class="mb-3">
                    <label class="form-label">Judul Penelitian:</label>
                    <textarea name="judul" class="form-control" rows="3" placeholder="Masukkan judul penelitian"></textarea>
                </div>
                
                <button type="submit" class="btn btn-success">Simpan</button>
            </form>
        </div>
    </div>
    @endsection