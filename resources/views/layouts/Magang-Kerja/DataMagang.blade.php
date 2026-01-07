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
        background: linear-gradient(to right, var(--pertamina-green), var(--pertamina-green) 75%, var(--border-color) 75%);
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

    .step-completed {
        color: var(--pertamina-green);
        font-weight: 600;
    }

    .step-completed .step-circle {
        background: linear-gradient(135deg, var(--pertamina-green), #008f4a);
        color: #fff;
        border-color: var(--pertamina-green);
        box-shadow: 0 4px 15px rgba(0, 168, 89, 0.4);
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
        animation: fadeIn 0.6s ease-out;
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

    .form-control.is-invalid, .form-select.is-invalid {
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
        min-height: 120px;
    }

    .char-counter {
        text-align: right;
        font-size: 12px;
        color: var(--text-light);
        margin-top: 5px;
        font-weight: 500;
    }

    .char-counter.warning {
        color: var(--pertamina-red);
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
    }
</style>

<!-- STEP -->
<div class="step-wrapper">
    <div class="step">
        <div class="step-item step-completed">
            <div class="step-circle"><i class="fas fa-check"></i></div>
            <div>Data Diri</div>
        </div>
        <div class="step-item step-completed">
            <div class="step-circle"><i class="fas fa-check"></i></div>
            <div>Data Kampus</div>
        </div>
        <div class="step-item step-active">
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

            <h5><i class="fas fa-briefcase"></i> Data Magang</h5>

            <!-- Alert Validation -->
            <div class="alert-validation" id="alertValidation">
                <i class="fas fa-exclamation-triangle"></i>
                <span id="alertMessage"></span>
            </div>

            <form id="formData">

                <div class="mb-3">
                    <label class="form-label">Divisi yang Diminati <span class="text-danger">*</span></label>
                    <select class="form-select wajib" id="divisi" name="divisi" required>
                        <option value="">Pilih Divisi</option>
                        <option value="IT">IT Division</option>
                        <option value="Finance">Finance</option>
                        <option value="HR">Human Resources</option>
                        <option value="Operations">Operations</option>
                        <option value="HSE">Health, Safety & Environment</option>
                        <option value="Marketing">Marketing</option>
                        <option value="Supply Chain">Supply Chain</option>
                        <option value="Legal">Legal & Compliance</option>
                    </select>
                    <div class="error-text d-none"><i class="fas fa-exclamation-circle"></i> Harap pilih divisi</div>
                </div>

                <div class="mb-3">
                    <label class="form-label">Posisi yang Diinginkan <span class="text-danger">*</span></label>
                    <input type="text" class="form-control wajib" id="posisi" name="posisi" required placeholder="Contoh: Data Analyst Intern">
                    <div class="error-text d-none"><i class="fas fa-exclamation-circle"></i> Harap isi posisi yang diinginkan</div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6 mb-3 mb-md-0">
                        <label class="form-label">Tanggal Mulai <span class="text-danger">*</span></label>
                        <input type="date" class="form-control wajib" id="tanggal_mulai" name="tanggal_mulai" required>
                        <div class="error-text d-none"><i class="fas fa-exclamation-circle"></i> Harap pilih tanggal mulai</div>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Tanggal Selesai <span class="text-danger">*</span></label>
                        <input type="date" class="form-control wajib" id="tanggal_selesai" name="tanggal_selesai" required>
                        <div class="error-text d-none"><i class="fas fa-exclamation-circle"></i> Tanggal selesai harus lebih besar</div>
                    </div>
                </div>

                <div class="mb-4">
                    <label class="form-label">Motivasi & Alasan <span class="text-danger">*</span></label>
                    <textarea class="form-control wajib" id="motivasi" name="motivasi" rows="5" maxlength="1000" required placeholder="Ceritakan mengapa Anda tertarik magang di Pertamina..."></textarea>
                    <div class="char-counter" id="charCounter">0 / 1000 karakter</div>
                    <div class="error-text d-none"><i class="fas fa-exclamation-circle"></i> Harap isi motivasi dan alasan (minimal 50 karakter)</div>
                </div>

                <div class="d-flex justify-content-between mt-4">
                    <button type="button" class="btn-custom btn-back" onclick="kembaliKeStep2()">
                        <i class="fas fa-arrow-left"></i> Kembali
                    </button>
                    <button type="button" class="btn-custom btn-next" id="btnNext" onclick="lanjutKeStep4()">
                        Selanjutnya <i class="fas fa-arrow-right"></i>
                    </button>
                </div>

            </form>

        </div>
    </div>
</div>

<script>
const alertValidation = document.getElementById('alertValidation');
const alertMessage = document.getElementById('alertMessage');
const motivasiTextarea = document.getElementById('motivasi');
const charCounter = document.getElementById('charCounter');

// Character counter
motivasiTextarea.addEventListener('input', function() {
    const length = this.value.length;
    charCounter.textContent = `${length} / 1000 karakter`;
    
    if (length > 900) {
        charCounter.classList.add('warning');
    } else {
        charCounter.classList.remove('warning');
    }
});

// Date validation
document.getElementById('tanggal_mulai').addEventListener('change', function() {
    const today = new Date();
    today.setHours(0, 0, 0, 0);
    const selectedDate = new Date(this.value);
    
    if (selectedDate < today) {
        showAlert('Tanggal mulai tidak boleh kurang dari hari ini!');
        this.value = '';
    }
});

document.getElementById('tanggal_selesai').addEventListener('change', function() {
    const startDate = new Date(document.getElementById('tanggal_mulai').value);
    const endDate = new Date(this.value);
    
    if (endDate <= startDate) {
        showAlert('Tanggal selesai harus lebih besar dari tanggal mulai!');
        this.value = '';
    }
    
    // Check duration (minimum 1 month)
    const diffTime = Math.abs(endDate - startDate);
    const diffDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24));
    
    if (diffDays < 30) {
        showAlert('Durasi magang minimal 1 bulan!');
        this.value = '';
    }
});

function showAlert(message) {
    alertMessage.textContent = message;
    alertValidation.classList.add('show');
    
    setTimeout(() => {
        alertValidation.classList.remove('show');
    }, 5000);

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

    // Validasi setiap field
    document.querySelectorAll('.wajib').forEach(input => {
        const error = input.classList.contains('form-control') || input.classList.contains('form-select') 
            ? input.nextElementSibling 
            : null;
        const value = input.value.trim();

        if (!value) {
            input.classList.add('is-invalid');
            if (error && error.classList.contains('error-text')) {
                error.classList.remove('d-none');
            }
            valid = false;
            if (!firstInvalidField) firstInvalidField = input;
        } else {
            // Validasi motivasi (minimal 50 karakter)
            if (input.id === 'motivasi' && value.length < 50) {
                input.classList.add('is-invalid');
                if (error && error.classList.contains('error-text')) {
                    error.classList.remove('d-none');
                }
                valid = false;
                if (!firstInvalidField) firstInvalidField = input;
            }
        }
    });

    // Validasi tanggal
    const startDate = new Date(document.getElementById('tanggal_mulai').value);
    const endDate = new Date(document.getElementById('tanggal_selesai').value);
    
    if (endDate <= startDate) {
        document.getElementById('tanggal_selesai').classList.add('is-invalid');
        valid = false;
    }

    if (!valid) {
        showAlert('Mohon lengkapi semua data yang wajib diisi dengan benar!');
        if (firstInvalidField) {
            firstInvalidField.focus();
            firstInvalidField.scrollIntoView({ behavior: 'smooth', block: 'center' });
        }
    }

    return valid;
}

function kembaliKeStep2() {
    if (confirm('Apakah Anda yakin ingin kembali? Data yang belum disimpan akan hilang.')) {
        window.location.href = "{{ route('magang.data-kampus') }}";
    }
}

function lanjutKeStep4() {
    if (validasiForm()) {
        // Simpan data ke sessionStorage
        const formData = {
            divisi: document.getElementById('divisi').value,
            posisi: document.getElementById('posisi').value,
            tanggal_mulai: document.getElementById('tanggal_mulai').value,
            tanggal_selesai: document.getElementById('tanggal_selesai').value,
            motivasi: document.getElementById('motivasi').value
        };
        
        sessionStorage.setItem('dataMagang', JSON.stringify(formData));
        
        // Show loading state
        const btnNext = document.getElementById('btnNext');
        btnNext.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Memproses...';
        btnNext.disabled = true;

        setTimeout(() => {
            window.location.href = "{{ route('magang.file-pendukung') }}";
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
});

// Load saved data
window.addEventListener('DOMContentLoaded', function() {
    const savedData = sessionStorage.getItem('dataMagang');
    if (savedData) {
        const data = JSON.parse(savedData);
        document.getElementById('divisi').value = data.divisi || '';
        document.getElementById('posisi').value = data.posisi || '';
        document.getElementById('tanggal_mulai').value = data.tanggal_mulai || '';
        document.getElementById('tanggal_selesai').value = data.tanggal_selesai || '';
        document.getElementById('motivasi').value = data.motivasi || '';
        
        // Update character counter
        if (data.motivasi) {
            charCounter.textContent = `${data.motivasi.length} / 1000 karakter`;
        }
    }
    
    // Set minimum date to today
    const today = new Date().toISOString().split('T')[0];
    document.getElementById('tanggal_mulai').setAttribute('min', today);
});
</script>

@include('layouts.footer')