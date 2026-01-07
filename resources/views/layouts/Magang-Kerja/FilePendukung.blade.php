@extends('layouts.dashboard')

@section('title', 'File Pendukung - Pendaftaran Magang')

@section('content')
<div class="container py-4">
    <div class="card shadow-lg border-0">
        <div class="card-header bg-danger text-white">
            <h4 class="mb-0">📎 Pendaftaran Magang Kerja - File Pendukung</h4>
        </div>

        <!-- Progress Bar -->
        <div class="card-body p-0">
            <div class="progress" style="height: 8px; border-radius: 0;">
                <div class="progress-bar bg-danger" role="progressbar" style="width: 100%"></div>
            </div>
        </div>

        <div class="card-body p-4">
            <!-- Step Indicators -->
            <div class="row mb-4">
                <div class="col text-center">
                    <div class="step-indicator completed">
                        <div class="step-circle">✓</div>
                        <small class="d-block mt-2">Data Diri</small>
                    </div>
                </div>
                <div class="col text-center">
                    <div class="step-indicator completed">
                        <div class="step-circle">✓</div>
                        <small class="d-block mt-2">Data Kampus</small>
                    </div>
                </div>
                <div class="col text-center">
                    <div class="step-indicator completed">
                        <div class="step-circle">✓</div>
                        <small class="d-block mt-2">Data Magang</small>
                    </div>
                </div>
                <div class="col text-center">
                    <div class="step-indicator active">
                        <div class="step-circle">4</div>
                        <small class="d-block mt-2">File Pendukung</small>
                    </div>
                </div>
            </div>

            <div class="alert alert-info">
                <i class="bi bi-info-circle"></i> Upload file dalam format PDF dengan ukuran maksimal 5MB
            </div>

            <form action="{{ route('magang.submit') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="mb-3">
                    <label class="form-label fw-bold">CV/Resume <span class="text-danger">*</span></label>
                    <input type="file" class="form-control" name="cv" accept=".pdf" required>
                    <small class="text-muted">Format: PDF, Max: 5MB</small>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-bold">Transkrip Nilai <span class="text-danger">*</span></label>
                    <input type="file" class="form-control" name="transkrip" accept=".pdf" required>
                    <small class="text-muted">Format: PDF, Max: 5MB</small>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-bold">Surat Pengantar dari Kampus</label>
                    <input type="file" class="form-control" name="surat_pengantar" accept=".pdf">
                    <small class="text-muted">Format: PDF, Max: 5MB (Opsional)</small>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-bold">Portfolio/Sertifikat</label>
                    <input type="file" class="form-control" name="portfolio" accept=".pdf">
                    <small class="text-muted">Format: PDF, Max: 5MB (Opsional)</small>
                </div>

                <div class="form-check mb-4">
                    <input class="form-check-input" type="checkbox" id="agreement" required>
                    <label class="form-check-label" for="agreement">
                        Saya menyatakan bahwa data yang saya berikan adalah <strong>benar dan dapat dipertanggungjawabkan</strong>
                    </label>
                </div>

                <div class="d-flex justify-content-between mt-4">
                    <a href="{{ route('magang.data-magang') }}" class="btn btn-secondary">
                        <i class="bi bi-arrow-left"></i> Kembali
                    </a>
                    <button type="submit" class="btn btn-success btn-lg">
                        <i class="bi bi-check-circle"></i> Submit Pendaftaran
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<style>
    .step-indicator .step-circle {
        width: 50px;
        height: 50px;
        border-radius: 50%;
        background: #e9ecef;
        color: #6c757d;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        font-weight: bold;
        font-size: 20px;
        transition: all 0.3s;
    }

    .step-indicator.active .step-circle {
        background: #dc3545;
        color: white;
        box-shadow: 0 4px 15px rgba(220, 53, 69, 0.4);
    }

    .step-indicator.completed .step-circle {
        background: #28a745;
        color: white;
    }
</style>

<script>
    // File size validation
    document.querySelectorAll('input[type="file"]').forEach(input => {
        input.addEventListener('change', function() {
            const file = this.files[0];
            if (file && file.size > 5 * 1024 * 1024) {
                alert('Ukuran file terlalu besar! Max 5MB');
                this.value = '';
            }
        });
    });
</script>
@endsection