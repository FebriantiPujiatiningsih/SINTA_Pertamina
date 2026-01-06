<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data Kampus</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>
<body>

<div class="container mt-5">
    <div class="card p-4">
        <h4 class="text-center mb-4">Pendaftaran <b>Magang Kerja</b></h4>

        <div class="d-flex mb-4 text-center">
            <div class="flex-fill p-2 bg-secondary text-white">DATA DIRI</div>
            <div class="flex-fill p-2 bg-danger text-white">DATA KAMPUS</div>
            <div class="flex-fill p-2 bg-secondary text-white">DATA MAGANG</div>
            <div class="flex-fill p-2 bg-secondary text-white">FILE PENDUKUNG</div>
        </div>

        <form class="row g-3">
            <div class="col-md-6">
                <label>Nama Kampus*</label>
                <input type="text" class="form-control">
            </div>
            <div class="col-md-6">
                <label>Fakultas*</label>
                <input type="text" class="form-control">
            </div>
            <div class="col-md-6">
                <label>Program Studi*</label>
                <input type="text" class="form-control">
            </div>
            <div class="col-md-6">
                <label>NIM*</label>
                <input type="text" class="form-control">
            </div>

            <div class="d-flex justify-content-between mt-4">
                <a href="{{ route('magang.data-diri') }}" class="btn btn-outline-secondary">BACK</a>
                <a href="{{ url('magang/data-magang') }}" class="btn btn-danger px-4">NEXT</a>
            </div>
        </form>
    </div>
</div>

</body>
</html>