<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>File Pendukung</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>
<body>

<div class="container mt-5">
    <div class="card p-4">
        <h4 class="text-center mb-4">Pendaftaran <b>Magang Kerja</b></h4>

        <div class="d-flex mb-4 text-center">
            <div class="flex-fill p-2 bg-secondary text-white">DATA DIRI</div>
            <div class="flex-fill p-2 bg-secondary text-white">DATA KAMPUS</div>
            <div class="flex-fill p-2 bg-secondary text-white">DATA MAGANG</div>
            <div class="flex-fill p-2 bg-danger text-white">FILE PENDUKUNG</div>
        </div>

        <form class="row g-3">
            <div class="col-md-6">
                <label>Surat Pengantar*</label>
                <input type="file" class="form-control">
            </div>
            <div class="col-md-6">
                <label>CV*</label>
                <input type="file" class="form-control">
            </div>
            <div class="col-md-6">
                <label>Transkrip Nilai*</label>
                <input type="file" class="form-control">
            </div>
            <div class="col-md-6">
                <label>KTP*</label>
                <input type="file" class="form-control">
            </div>

            <div class="d-flex justify-content-between mt-4">
                <a href="{{ route('magang.data-magang') }}" class="btn btn-outline-secondary">BACK</a>
                <button class="btn btn-danger px-4">SUBMIT</button>
            </div>
        </form>
    </div>
</div>

</body>
</html>