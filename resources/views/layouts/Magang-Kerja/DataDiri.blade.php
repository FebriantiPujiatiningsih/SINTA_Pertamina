@include('layouts.header')

<style>
    .step-wrapper {
        background: #f9fafb;
        padding: 25px 0;
        border-bottom: 1px solid #eee;
    }

    .step {
        position: relative;
        display: flex;
        justify-content: space-between;
        max-width: 700px;
        margin: auto;
    }

    .step::before {
        content: "";
        position: absolute;
        top: 17px;
        left: 0;
        right: 0;
        height: 2px;
        background: #ddd;
    }

    .step-item {
        text-align: center;
        font-size: 13px;
        color: #999;
        width: 25%;
        position: relative;
        z-index: 1;
    }

    .step-circle {
        width: 34px;
        height: 34px;
        border-radius: 50%;
        border: 2px solid #ddd;
        background: #fff;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: auto;
        font-weight: 600;
    }

    .step-active {
        color: #e74c3c;
    }

    .step-active .step-circle {
        background: #e74c3c;
        color: #fff;
        border-color: #e74c3c;
    }

    .upload-box {
        border: 2px dashed #d0d5dd;
        border-radius: 12px;
        width: 200px;
        height: 260px;
        margin: auto;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        background: #fafafa;
        overflow: hidden;
    }

    .upload-box img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        display: none;
    }

    .upload-placeholder {
        text-align: center;
        color: #98a2b3;
        font-size: 13px;
    }

    .form-label {
        font-weight: 600;
    }

    .btn-next {
        background: #e74c3c;
        color: white;
        padding: 10px 30px;
        border-radius: 8px;
        border: none;
    }

    .is-invalid {
        border-color: #dc3545;
    }

    .error-text {
        color: #dc3545;
        font-size: 12px;
        margin-top: 4px;
    }
</style>

<!-- STEP -->
<div class="step-wrapper">
    <div class="step">
        <div class="step-item step-active">
            <div class="step-circle">1</div>
            Data Diri
        </div>
        <div class="step-item">
            <div class="step-circle">2</div>
            Data Kampus
        </div>
        <div class="step-item">
            <div class="step-circle">3</div>
            Data Magang
        </div>
        <div class="step-item">
            <div class="step-circle">4</div>
            File Pendukung
        </div>
    </div>
</div>

<!-- CONTENT -->
<div class="container my-5">
    <div class="card border-0 shadow-sm">
        <div class="card-body p-4">

            <h5 class="fw-bold mb-4">Data Diri</h5>

            <!-- FOTO -->
            <div class="mb-4 text-center">
                <input type="file" id="foto" name="foto" hidden accept="image/*">

                <div class="upload-box" onclick="aksiFoto()">
                    <img id="preview">
                    <div class="upload-placeholder" id="placeholder">
                        <i class="bi bi-camera fs-2"></i><br>
                        <strong>Upload Foto</strong><br>
                        <small>Pas Foto Berwarna</small>
                    </div>
                </div>
            </div>

            <!-- FORM -->
            <form id="formData">

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label class="form-label">Nama Lengkap *</label>
                        <input type="text" class="form-control wajib">
                        <div class="error-text d-none">Harap isi terlebih dahulu</div>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Email *</label>
                        <input type="email" class="form-control wajib">
                        <div class="error-text d-none">Harap isi terlebih dahulu</div>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label class="form-label">Tempat Lahir *</label>
                        <input type="text" class="form-control wajib">
                        <div class="error-text d-none">Harap isi terlebih dahulu</div>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Tanggal Lahir *</label>
                        <input type="date" class="form-control wajib">
                        <div class="error-text d-none">Harap isi terlebih dahulu</div>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label class="form-label">No HP *</label>
                        <input type="text" class="form-control wajib">
                        <div class="error-text d-none">Harap isi terlebih dahulu</div>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Instagram</label>
                        <input type="text" class="form-control">
                    </div>
                </div>

                <div class="mb-4">
                    <label class="form-label">Alamat Lengkap *</label>
                    <textarea class="form-control wajib" rows="3"></textarea>
                    <div class="error-text d-none">Harap isi terlebih dahulu</div>
                </div>

                <div class="d-flex justify-content-between">
                    <button type="button" class="btn-next" onclick="kembaliKeDashboard()">
                        ← Kembali
                    </button>
                    <button type="button" class="btn-next" onclick="lanjutKeStep2()">
                        Selanjutnya →
                    </button>
                </div>

            </form>

        </div>
    </div>
</div>

<!-- MODAL FOTO -->
<div class="modal fade" id="fotoModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content text-center">
            <div class="modal-header">
                <h5 class="modal-title">Foto</h5>
                <button class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <img id="modalFoto" class="img-fluid rounded mb-3">
                <div class="d-grid gap-2">
                    <button class="btn btn-outline-primary" onclick="lihatFoto()">Lihat Foto</button>
                    <button class="btn btn-outline-danger" onclick="gantiFoto()">Ganti Foto</button>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
let fotoTerisi = false;
const foto = document.getElementById('foto');
const preview = document.getElementById('preview');
const placeholder = document.getElementById('placeholder');

function aksiFoto() {
    if (!fotoTerisi) {
        foto.click();
    } else {
        new bootstrap.Modal(document.getElementById('fotoModal')).show();
    }
}

foto.addEventListener('change', function () {
    const file = this.files[0];
    if (file) {
        const reader = new FileReader();
        reader.onload = e => {
            preview.src = e.target.result;
            preview.style.display = 'block';
            placeholder.style.display = 'none';
            document.getElementById('modalFoto').src = e.target.result;
            fotoTerisi = true;
        };
        reader.readAsDataURL(file);
    }
});

function gantiFoto() {
    foto.click();
}

function lihatFoto() {
    document.getElementById('modalFoto').classList.toggle('w-100');
}

function validasiForm() {
    let valid = true;

    document.querySelectorAll('.wajib').forEach(input => {
        const error = input.nextElementSibling;
        if (!input.value.trim()) {
            input.classList.add('is-invalid');
            error.classList.remove('d-none');
            valid = false;
        } else {
            input.classList.remove('is-invalid');
            error.classList.add('d-none');
        }
    });

    if (!fotoTerisi) {
        alert('Harap upload foto terlebih dahulu');
        valid = false;
    }

    return valid;
}

function kembaliKeDashboard() {
    window.location.href = "{{ route('dashboard') }}";
}

function lanjutKeStep2() {
    if (validasiForm()) {
        window.location.href = "{{ route('magang.data-kampus') }}";
    }
}
</script>

@include('layouts.footer')