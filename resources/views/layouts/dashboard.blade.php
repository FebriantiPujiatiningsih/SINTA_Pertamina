@include('layouts.header')

<div class="container mt-5">
    <div class="row text-center">

        <div class="col-md-4">
            <h4>Magang Kerja</h4>
            <p>Mau merasakan magang di PT. Pertamina (Persero)?</p>
            <a href="{{ route('magang.homepage') }}" class="btn btn-primary w-100">
                Daftar Magang Kerja
            </a>
        </div>

        <div class="col-md-4">
            <h4>Penelitian</h4>
            <p>Penelitianmu berkaitan dengan Pertamina?</p>
            <a href="{{ route('penelitian.data-diri') }}" class="btn btn-info text-white w-100">
                Daftar Penelitian
            </a>
        </div>

        <div class="col-md-4">
            <h4>Hasil Pendaftaran</h4>
            <p>Penasaran apakah pendaftaranmu diterima?</p>
            <a href="#" class="btn btn-success w-100">
                Periksa Hasil Pendaftaran
            </a>
        </div>

    </div>
</div>

@include('layouts.footer')