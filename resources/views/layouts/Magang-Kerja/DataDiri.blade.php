@include('layouts.header')

<style>
    :root {
        --pertamina-blue: #005EB8;
        --pertamina-green: #00A859;
        --pertamina-red: #E30613;
        --pertamina-dark: #003B76;
        --background-light: #F4F6F8;
        --text-dark: #333333;
        --text-light: #666666;
        --border-color: #D1D5DB;
        --shadow-light: rgba(0, 94, 184, 0.08);
        --shadow-medium: rgba(0, 94, 184, 0.15);
    }

    body {
        background: linear-gradient(135deg, #f8fbff 0%, #eef5ff 100%);
        position: relative;
        overflow-x: hidden;
    }

    body::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-image: 
            radial-gradient(circle at 15% 50%, rgba(0, 94, 184, 0.03) 0%, transparent 20%),
            radial-gradient(circle at 85% 30%, rgba(0, 168, 89, 0.03) 0%, transparent 20%),
            radial-gradient(circle at 50% 80%, rgba(227, 6, 19, 0.02) 0%, transparent 20%);
        z-index: -1;
    }

    .step-wrapper {
        background: white;
        padding: 30px 0;
        box-shadow: 0 2px 10px var(--shadow-light);
        margin-bottom: 40px;
    }

    .step {
        position: relative;
        display: flex;
        justify-content: space-between;
        max-width: 800px;
        margin: auto;
        padding: 0 20px;
    }

    .step::before {
        content: "";
        position: absolute;
        top: 22px;
        left: 15%;
        right: 15%;
        height: 3px;
        background: linear-gradient(to right, var(--pertamina-green), var(--border-color));
        z-index: 0;
    }

    .step-item {
        text-align: center;
        font-size: 14px;
        color: var(--text-light);
        width: 25%;
        position: relative;
        z-index: 1;
        transition: all 0.3s ease;
    }

    .step-circle {
        width: 45px;
        height: 45px;
        border-radius: 50%;
        border: 3px solid var(--border-color);
        background: #fff;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 12px;
        font-weight: 700;
        font-size: 18px;
        transition: all 0.4s ease;
        box-shadow: 0 3px 10px var(--shadow-light);
    }

    .step-active {
        color: var(--pertamina-red);
        font-weight: 600;
    }

    .step-active .step-circle {
        background: linear-gradient(135deg, var(--pertamina-red), #c82333);
        color: #fff;
        border-color: var(--pertamina-red);
        transform: scale(1.15);
        box-shadow: 0 6px 20px rgba(227, 6, 19, 0.4);
    }

    .container {
        max-width: 900px;
    }

    .card {
        border: none;
        border-radius: 20px;
        box-shadow: 0 12px 35px var(--shadow-medium);
        background: white;
        overflow: hidden;
        position: relative;
    }

    .card::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 5px;
        background: linear-gradient(90deg, var(--pertamina-blue), var(--pertamina-green), var(--pertamina-red));
    }

    .card-body {
        padding: 40px;
    }

    h5 {
        color: var(--pertamina-blue);
        font-weight: 700;
        margin-bottom: 30px;
        font-size: 24px;
    }

    .upload-box {
        border: 3px dashed var(--pertamina-blue);
        border-radius: 16px;
        width: 220px;
        height: 280px;
        margin: 0 auto 30px;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        background: #f9fbfd;
        overflow: hidden;
        transition: all 0.3s ease;
        position: relative;
    }

    .upload-box:hover {
        border-color: var(--pertamina-green);
        background: #f0f9ff;
        transform: translateY(-5px);
        box-shadow: 0 10px 30px var(--shadow-medium);
    }

    .upload-box img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        display: none;
    }

    .upload-placeholder {
        text-align: center;
        color: var(--pertamina-blue);
        font-size: 14px;
        padding: 20px;
    }

    .upload-placeholder i {
        font-size: 48px;
        margin-bottom: 15px;
        color: var(--pertamina-blue);
    }

    .form-label {
        font-weight: 600;
        color: var(--text-dark);
        margin-bottom: 10px;
        font-size: 14px;
    }

    .form-label .text-danger {
        color: var(--pertamina-red) !important;
    }

    .form-control, .form-select {
        padding: 14px 18px;
        border: 2px solid var(--border-color);
        border-radius: 10px;
        font-size: 15px;
        transition: all 0.3s ease;
        background-color: #f9fbfd;
    }

    .form-control:focus, .form-select:focus {
        outline: none;
        border-color: var(--pertamina-green);
        box-shadow: 0 0 0 4px rgba(0, 168, 89, 0.15);
        background-color: white;
    }

    .form-control.is-invalid {
        border-color: var(--pertamina-red);
        background-color: rgba(227, 6, 19, 0.05);
    }

    .error-text {
        color: var(--pertamina-red);
        font-size: 13px;
        margin-top: 6px;
        font-weight: 500;
        display: flex;
        align-items: center;
    }

    .error-text i {
        margin-right: 5px;
    }

    textarea.form-control {
        resize: vertical;
        min-height: 100px;
    }

    .btn-custom {
        padding: 14px 35px;
        border-radius: 10px;
        border: none;
        font-weight: 700;
        font-size: 15px;
        cursor: pointer;
        transition: all 0.4s ease;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        letter-spacing: 0.3px;
        position: relative;
        overflow: hidden;
    }

    .btn-custom i {
        margin-right: 8px;
        font-size: 16px;
    }

    .btn-back {
        background: linear-gradient(to right, #6c757d, #5a6268);
        color: white;
    }

    .btn-back::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(to right, #5a6268, #495057);
        transition: left 0.4s ease;
        z-index: -1;
    }

    .btn-back:hover::before {
        left: 0;
    }

    .btn-next {
        background: linear-gradient(to right, var(--pertamina-blue), var(--pertamina-dark));
        color: white;
    }

    .btn-next::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(to right, var(--pertamina-green), var(--pertamina-blue));
        transition: left 0.4s ease;
        z-index: -1;
    }

    .btn-next:hover::before {
        left: 0;
    }

    .btn-custom:hover {
        transform: translateY(-3px);
        box-shadow: 0 8px 20px rgba(0, 94, 184, 0.25);
    }

    .btn-custom:active {
        transform: translateY(0);
    }

    .btn-custom:disabled {
        opacity: 0.6;
        cursor: not-allowed;
        transform: none !important;
    }

    .alert-validation {
        background: rgba(227, 6, 19, 0.1);
        border-left: 5px solid var(--pertamina-red);
        color: var(--pertamina-red);
        padding: 15px 20px;
        border-radius: 10px;
        margin-bottom: 25px;
        display: none;
        align-items: center;
        animation: shake 0.5s ease-in-out;
    }

    .alert-validation i {
        margin-right: 12px;
        font-size: 20px;
    }

    .alert-validation.show {
        display: flex;
    }

    @keyframes shake {
        0%, 100% { transform: translateX(0); }
        10%, 30%, 50%, 70%, 90% { transform: translateX(-8px); }
        20%, 40%, 60%, 80% { transform: translateX(8px); }
    }

    @keyframes fadeIn {
        from { opacity: 0; transform: translateY(20px); }
        to { opacity: 1; transform: translateY(0); }
    }

    .card {
        animation: fadeIn 0.6s ease-out;
    }

    .modal-content {
        border-radius: 16px;
        border: none;
        overflow: hidden;
    }

    .modal-header {
        background: linear-gradient(to right, var(--pertamina-blue), var(--pertamina-green));
        color: white;
        border: none;
        padding: 20px 25px;
    }

    .modal-title {
        font-weight: 700;
    }

    .modal-body {
        padding: 30px;
    }

    .btn-outline-primary {
        border: 2px solid var(--pertamina-blue);
        color: var(--pertamina-blue);
        font-weight: 600;
        transition: all 0.3s ease;
    }

    .btn-outline-primary:hover {
        background: var(--pertamina-blue);
        color: white;
        transform: translateY(-2px);
    }

    .btn-outline-danger {
        border: 2px solid var(--pertamina-red);
        color: var(--pertamina-red);
        font-weight: 600;
        transition: all 0.3s ease;
    }

    .btn-outline-danger:hover {
        background: var(--pertamina-red);
        color: white;
        transform: translateY(-2px);
    }

    @media (max-width: 768px) {
        .step {
            padding: 0 10px;
        }

        .step-circle {
            width: 38px;
            height: 38px;
            font-size: 16px;
        }

        .step-item {
            font-size: 12px;
        }

        .card-body {
            padding: 25px 20px;
        }

        .upload-box {
            width: 180px;
            height: 240px;
        }
    }
</style>

<!-- STEP -->
<div class="step-wrapper">
    <div class="step">
        <div class="step-item step-active">
            <div class="step-circle">1</div>
            <div>Data Diri</div>
        </div>
        <div class="step-item">
            <div class="step-circle">2</div>
            <div>Data Kampus</div>
        </div>
        <div class="step-item">
            <div class="step-circle">3</div>
            <div>Data Magang</div>
        </div>
        <div class="step-item">
            <div class="step-circle">4</div>
            <div>File Pendukung</div>
        </div>
    </div>
</div>

<!-- CONTENT -->
<div class="container my-5">
    <div class="card">
        <div class="card-body">

            <h5><i class="fas fa-user-circle"></i> Data Diri Peserta</h5>

            <!-- Alert Validation -->
            <div class="alert-validation" id="alertValidation">
                <i class="fas fa-exclamation-triangle"></i>
                <span id="alertMessage"></span>
            </div>

            <!-- FOTO -->
            <div class="mb-4 text-center">
                <input type="file" id="foto" name="foto" hidden accept="image/*">

                <div class="upload-box" onclick="aksiFoto()">
                    <img id="preview">
                    <div class="upload-placeholder" id="placeholder">
                        <i class="fas fa-camera"></i><br>
                        <strong>Upload Foto</strong><br>
                        <small>Pas Foto Berwarna<br>(Max 2MB)</small>
                    </div>
                </div>
            </div>

            <!-- FORM -->
            <form id="formData">

                <div class="row mb-3">
                    <div class="col-md-6 mb-3 mb-md-0">
                        <label class="form-label">Nama Lengkap <span class="text-danger">*</span></label>
                        <input type="text" class="form-control wajib" id="nama" name="nama" placeholder="Masukkan nama lengkap">
                        <div class="error-text d-none"><i class="fas fa-exclamation-circle"></i> Harap isi terlebih dahulu</div>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Email <span class="text-danger">*</span></label>
                        <input type="email" class="form-control wajib" id="email" name="email" placeholder="contoh@email.com">
                        <div class="error-text d-none"><i class="fas fa-exclamation-circle"></i> Harap isi email yang valid</div>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6 mb-3 mb-md-0">
                        <label class="form-label">Tempat Lahir <span class="text-danger">*</span></label>
                        <input type="text" class="form-control wajib" id="tempat_lahir" name="tempat_lahir" placeholder="Kota tempat lahir">
                        <div class="error-text d-none"><i class="fas fa-exclamation-circle"></i> Harap isi terlebih dahulu</div>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Tanggal Lahir <span class="text-danger">*</span></label>
                        <input type="date" class="form-control wajib" id="tanggal_lahir" name="tanggal_lahir">
                        <div class="error-text d-none"><i class="fas fa-exclamation-circle"></i> Harap pilih tanggal lahir</div>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6 mb-3 mb-md-0">
                        <label class="form-label">No HP <span class="text-danger">*</span></label>
                        <input type="tel" class="form-control wajib" id="no_hp" name="no_hp" placeholder="08xxxxxxxxxx">
                        <div class="error-text d-none"><i class="fas fa-exclamation-circle"></i> Format nomor tidak valid</div>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Instagram</label>
                        <input type="text" class="form-control" id="instagram" name="instagram" placeholder="@username">
                    </div>
                </div>

                <div class="mb-4">
                    <label class="form-label">Alamat Lengkap <span class="text-danger">*</span></label>
                    <textarea class="form-control wajib" id="alamat" name="alamat" rows="3" placeholder="Masukkan alamat lengkap Anda"></textarea>
                    <div class="error-text d-none"><i class="fas fa-exclamation-circle"></i> Harap isi alamat lengkap</div>
                </div>

                <div class="d-flex justify-content-between">
                    <button type="button" class="btn-custom btn-back" onclick="kembaliKeDashboard()">
                        <i class="fas fa-arrow-left"></i> Kembali
                    </button>
                    <button type="button" class="btn-custom btn-next" id="btnNext" onclick="lanjutKeStep2()">
                        Selanjutnya <i class="fas fa-arrow-right"></i>
                    </button>
                </div>

            </form>

        </div>
    </div>
</div>

<!-- MODAL FOTO -->
<div class="modal fade" id="fotoModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title"><i class="fas fa-image"></i> Preview Foto</h5>
                <button class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body text-center">
                <img id="modalFoto" class="img-fluid rounded mb-3" style="max-height: 400px;">
                <div class="d-grid gap-2">
                    <button class="btn btn-outline-primary" onclick="lihatFoto()">
                        <i class="fas fa-expand"></i> Lihat Foto
                    </button>
                    <button class="btn btn-outline-danger" onclick="gantiFoto()">
                        <i class="fas fa-sync-alt"></i> Ganti Foto
                    </button>
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
const alertValidation = document.getElementById('alertValidation');
const alertMessage = document.getElementById('alertMessage');

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
        // Validasi ukuran file (max 2MB)
        if (file.size > 2 * 1024 * 1024) {
            showAlert('Ukuran foto maksimal 2MB!');
            this.value = '';
            return;
        }

        // Validasi tipe file
        if (!file.type.startsWith('image/')) {
            showAlert('File harus berupa gambar!');
            this.value = '';
            return;
        }

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
    bootstrap.Modal.getInstance(document.getElementById('fotoModal')).hide();
}

function lihatFoto() {
    const modalFoto = document.getElementById('modalFoto');
    if (modalFoto.style.transform === 'scale(1.5)') {
        modalFoto.style.transform = 'scale(1)';
    } else {
        modalFoto.style.transform = 'scale(1.5)';
    }
}

function showAlert(message) {
    alertMessage.textContent = message;
    alertValidation.classList.add('show');
    
    setTimeout(() => {
        alertValidation.classList.remove('show');
    }, 5000);

    // Scroll to alert
    alertValidation.scrollIntoView({ behavior: 'smooth', block: 'center' });
}

function validasiForm() {
    let valid = true;
    let firstInvalidField = null;

    // Hapus semua error sebelumnya
    document.querySelectorAll('.wajib').forEach(input => {
        input.classList.remove('is-invalid');
        const error = input.nextElementSibling;
        if (error && error.classList.contains('error-text')) {
            error.classList.add('d-none');
        }
    });

    // Validasi foto
    if (!fotoTerisi) {
        showAlert('Harap upload foto terlebih dahulu!');
        document.querySelector('.upload-box').style.borderColor = 'var(--pertamina-red)';
        setTimeout(() => {
            document.querySelector('.upload-box').style.borderColor = '';
        }, 3000);
        return false;
    }

    // Validasi setiap field
    document.querySelectorAll('.wajib').forEach(input => {
        const error = input.nextElementSibling;
        const value = input.value.trim();

        if (!value) {
            input.classList.add('is-invalid');
            if (error && error.classList.contains('error-text')) {
                error.classList.remove('d-none');
            }
            valid = false;
            if (!firstInvalidField) firstInvalidField = input;
        } else {
            // Validasi khusus untuk email
            if (input.type === 'email' && !isValidEmail(value)) {
                input.classList.add('is-invalid');
                if (error && error.classList.contains('error-text')) {
                    error.classList.remove('d-none');
                }
                valid = false;
                if (!firstInvalidField) firstInvalidField = input;
            }

            // Validasi khusus untuk no HP
            if (input.id === 'no_hp' && !isValidPhone(value)) {
                input.classList.add('is-invalid');
                if (error && error.classList.contains('error-text')) {
                    error.classList.remove('d-none');
                }
                valid = false;
                if (!firstInvalidField) firstInvalidField = input;
            }
        }
    });

    if (!valid) {
        showAlert('Mohon lengkapi semua data yang wajib diisi!');
        if (firstInvalidField) {
            firstInvalidField.focus();
            firstInvalidField.scrollIntoView({ behavior: 'smooth', block: 'center' });
        }
    }

    return valid;
}

function isValidEmail(email) {
    const re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return re.test(email);
}

function isValidPhone(phone) {
    const re = /^[0-9]{10,13}$/;
    return re.test(phone.replace(/[\s-]/g, ''));
}

function kembaliKeDashboard() {
    if (confirm('Apakah Anda yakin ingin kembali? Data yang belum disimpan akan hilang.')) {
        window.location.href = "{{ route('dashboard') }}";
    }
}

function lanjutKeStep2() {
    if (validasiForm()) {
        // Simpan data ke sessionStorage
        const formData = {
            nama: document.getElementById('nama').value,
            email: document.getElementById('email').value,
            tempat_lahir: document.getElementById('tempat_lahir').value,
            tanggal_lahir: document.getElementById('tanggal_lahir').value,
            no_hp: document.getElementById('no_hp').value,
            instagram: document.getElementById('instagram').value,
            alamat: document.getElementById('alamat').value,
            foto: preview.src
        };
        
        sessionStorage.setItem('dataDiri', JSON.stringify(formData));
        
        // Show loading state
        const btnNext = document.getElementById('btnNext');
        const originalText = btnNext.innerHTML;
        btnNext.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Memproses...';
        btnNext.disabled = true;

        // Redirect after brief delay
        setTimeout(() => {
            window.location.href = "{{ route('magang.data-kampus') }}";
        }, 500);
    }
}

// Real-time validation
document.querySelectorAll('.wajib').forEach(input => {
    input.addEventListener('input', function() {
        if (this.value.trim()) {
            this.classList.remove('is-invalid');
            const error = this.nextElementSibling;
            if (error && error.classList.contains('error-text')) {
                error.classList.add('d-none');
            }
        }
    });

    input.addEventListener('focus', function() {
        this.style.transform = 'scale(1.01)';
    });

    input.addEventListener('blur', function() {
        this.style.transform = 'scale(1)';
    });
});

// Load saved data if exists
window.addEventListener('DOMContentLoaded', function() {
    const savedData = sessionStorage.getItem('dataDiri');
    if (savedData) {
        const data = JSON.parse(savedData);
        document.getElementById('nama').value = data.nama || '';
        document.getElementById('email').value = data.email || '';
        document.getElementById('tempat_lahir').value = data.tempat_lahir || '';
        document.getElementById('tanggal_lahir').value = data.tanggal_lahir || '';
        document.getElementById('no_hp').value = data.no_hp || '';
        document.getElementById('instagram').value = data.instagram || '';
        document.getElementById('alamat').value = data.alamat || '';
        
        if (data.foto) {
            preview.src = data.foto;
            preview.style.display = 'block';
            placeholder.style.display = 'none';
            document.getElementById('modalFoto').src = data.foto;
            fotoTerisi = true;
        }
    }
});
</script>

@include('layouts.footer')