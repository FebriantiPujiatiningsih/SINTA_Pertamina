<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Pendaftaran Magang Kerja</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <style>
        body { background: #f5f5f5; }
        .card { border-radius: 8px; }
        .step-active { background: #ff3b30; color: #fff; }
        .step { background: #9e9e9e; color: #fff; }
        .photo-box {
            width: 140px;
            height: 180px;
            border: 2px solid #ccc;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 10px;
        }
        .btn-next { background: #ff3b30; color: white; }
    </style>
</head>
<body>

<div class="container mt-5">
    <div class="card p-4">
        <h4 class="text-center mb-4">Pendaftaran <b>Magang Kerja</b></h4>

        {{-- Step --}}
        <div class="d-flex mb-4 text-center">
            <div class="flex-fill p-2 step-active">DATA DIRI</div>
            <div class="flex-fill p-2 step">DATA KAMPUS</div>
            <div class="flex-fill p-2 step">DATA MAGANG</div>
            <div class="flex-fill p-2 step">FILE PENDUKUNG</div>
        </div>

        <form>
            <div class="row">
                <div class="col-md-4 text-center">
                    <div class="photo-box mx-auto">
                        <span>FOTO</span>
                    </div>
                    <small><b>PAS FOTO BERWARNA</b></small>
                </div>

                <div class="col-md-8">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label>Nama Lengkap*</label>
                            <input type="text" class="form-control">
                        </div>
                        <div class="col-md-6">
                            <label>Email Pribadi*</label>
                            <input type="email" class="form-control">
                        </div>
                        <div class="col-md-6">
                            <label>Tempat Lahir*</label>
                            <input type="text" class="form-control">
                        </div>
                        <div class="col-md-6">
                            <label>Tanggal Lahir*</label>
                            <input type="date" class="form-control">
                        </div>
                        <div class="col-md-6">
                            <label>No HP*</label>
                            <input type="text" class="form-control">
                        </div>
                        <div class="col-md-6">
                            <label>Instagram*</label>
                            <input type="text" class="form-control" placeholder="@username">
                        </div>
                    </div>
                </div>
            </div>

            <div class="text-end mt-4">
                <a href="{{ url('magang/data-kampus') }}" class="btn btn-next px-4">NEXT</a>
            </div>
        </form>
    </div>
</div>

</body>
</html>