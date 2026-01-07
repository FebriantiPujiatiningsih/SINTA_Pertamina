<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Pendaftaran Magang Kerja</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{-- Bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    {{-- Icon --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        body { background: #f8f9fa; }
        .step-circle {
            width: 35px;
            height: 35px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
        }
        .step-active { background: #e74c3c; color: #fff; }
        .step-inactive { border: 2px solid #ddd; color: #aaa; }
        .upload-box {
            border: 2px dashed #ccc;
            border-radius: 8px;
            height: 180px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #aaa;
            cursor: pointer;
        }
    </style>
</head>
<body>

{{-- HEADER --}}
<header class="bg-danger text-white text-center py-4">
    <h4 class="fw-bold">📌 Pendaftaran Magang Kerja</h4>
    <p class="mb-0">
        Bergabunglah dengan tim Pertamina untuk pengalaman karir yang luar biasa!
    </p>
</header>

{{-- CONTENT --}}
<main class="py-5">
    @yield('content')
</main>

{{-- FOOTER --}}
<footer class="text-center py-3 text-muted">
    © {{ date('Y') }} PT Pertamina (Persero)
</footer>

</body>
</html>