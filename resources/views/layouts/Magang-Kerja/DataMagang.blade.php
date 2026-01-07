@extends('layouts.dashboard')

@section('title', 'Data Magang - Pendaftaran Magang')

@section('content')
<div class="container py-4">
    <div class="card shadow-lg border-0">
        <div class="card-header bg-danger text-white">
            <h4 class="mb-0">💼 Pendaftaran Magang Kerja - Data Magang</h4>
        </div>

        <!-- Progress Bar -->
        <div class="card-body p-0">
            <div class="progress" style="height: 8px; border-radius: 0;">
                <div class="progress-bar bg-danger" role="progressbar" style="width: 75%"></div>
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
                    <div class="step-indicator active">
                        <div class="step-circle">3</div>
                        <small class="d-block mt-2">Data Magang</small>
                    </div>
                </div>
                <div class="col text-center">
                    <div class="step-indicator">
                        <div class="step-circle">4</div>
                        <small class="d-block mt-2">File Pendukung</small>
                    </div>
                </div>
            </div>

            <form action="{{ route('magang.store-data-magang') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label class="form-label fw-bold">Divisi yang Diminati <span class="text-danger">*</span></label>
                    <select class="form-select" name="divisi" required>
                        <option value="">Pilih Divisi</option>
                        <option value="IT">IT Division</option>
                        <option value="Finance">Finance</option>
                        <option value="HR">Human Resources</option>
                        <option value="Operations">Operations</option>
                        <option value="HSE">Health, Safety & Environment</option>
                        <option value="Marketing">Marketing</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-bold">Posisi yang Diinginkan <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="posisi" required placeholder="Contoh: Data Analyst Intern">
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-bold">Tanggal Mulai <span class="text-danger">*</span></label>
                        <input type="date" class="form-control" name="tanggal_mulai" id="tanggalMulai" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-bold">Tanggal Selesai <span class="text-danger">*</span></label>
                        <input type="date" class="form-control" name="tanggal_selesai" id="tanggalSelesai" required>
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-bold">Motivasi & Alasan <span class="text-danger">*</span></label>
                    <textarea class="form-control" name="motivasi" rows="5" maxlength="1000" required placeholder="Ceritakan mengapa Anda tertarik magang di Pertamina..."></textarea>
                    <small class="text-muted">Maksimal 1000 karakter</small>
                </div>

                <div class="d-flex justify-content-between mt-4">
                    <a href="{{ route('magang.data-kampus') }}" class="btn btn-secondary">
                        <i class="bi bi-arrow-left"></i> Kembali
                    </a>
                    <button type="submit" class="btn btn-danger">
                        Selanjutnya <i class="bi bi-arrow-right"></i>
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
    // Date validation
    document.getElementById('tanggalSelesai').addEventListener('change', function() {
        const startDate = new Date(document.getElementById('tanggalMulai').value);
        const endDate = new Date(this.value);
        
        if (endDate <= startDate) {
            alert('Tanggal selesai harus lebih besar dari tanggal mulai!');
            this.value = '';
        }
    });
</script>
@endsection