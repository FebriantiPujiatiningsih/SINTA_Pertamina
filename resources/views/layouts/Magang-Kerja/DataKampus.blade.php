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
        background: linear-gradient(to right, var(--pertamina-green), var(--pertamina-green) 50%, var(--border-color) 50%);
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

    .skill-container {
        display: flex;
        flex-wrap: wrap;
        gap: 12px;
        margin-top: 15px;
    }

    .skill-tag {
        padding: 12px 22px;
        background: #f0f4f8;
        border: 2px solid var(--border-color);
        border-radius: 25px;
        cursor: pointer;
        transition: all 0.3s ease;
        font-size: 14px;
        font-weight: 500;
        color: var(--text-dark);
        position: relative;
        overflow: hidden;
    }

    .skill-tag::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(to right, var(--pertamina-blue), var(--pertamina-green));
        transition: left 0.3s ease;
        z-index: -1;
    }

    .skill-tag:hover {
        transform: translateY(-3px);
        box-shadow: 0 5px 15px var(--shadow-light);
    }

    .skill-tag.selected {
        background: linear-gradient(135deg, var(--pertamina-blue), var(--pertamina-green));
        color: white;
        border-color: var(--pertamina-blue);
        transform: scale(1.05);
        box-shadow: 0 5px 20px rgba(0, 94, 184, 0.3);
    }

    .skill-tag.selected::after {
        content: '✓';
        position: absolute;
        top: -5px;
        right: -5px;
        background: var(--pertamina-red);
        color: white;
        width: 22px;
        height: 22px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 12px;
        font-weight: 700;
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

    .skill-info {
        background: rgba(0, 168, 89, 0.08);
        border-left: 4px solid var(--pertamina-green);
        padding: 12px 18px;
        border-radius: 8px;
        margin-bottom: 15px;
        font-size: 13px;
        color: var(--text-dark);
    }

    .skill-info i {
        color: var(--pertamina-green);
        margin-right: 8px;
    }

    .skill-counter {
        display: inline-block;
        padding: 8px 16px;
        background: linear-gradient(135deg, var(--pertamina-blue), var(--pertamina-green));
        color: white;
        border-radius: 20px;
        font-size: 13px;
        font-weight: 700;
        margin-top: 10px;
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

        .skill-tag {
            padding: 10px 18px;
            font-size: 13px;
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
        <div class="step-item step-active">
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

            <h5><i class="fas fa-university"></i> Data Kampus</h5>

            <div class="alert-validation" id="alertValidation">
                <i class="fas fa-exclamation-triangle"></i>
                <span id="alertMessage"></span>
            </div>

            <form id="formData">

                <div class="row mb-3">
                    <div class="col-md-6 mb-3 mb-md-0">
                        <label class="form-label">Nama Perguruan Tinggi <span class="text-danger">*</span></label>
                        <input type="text" class="form-control wajib"
                               id="perguruan_tinggi" name="perguruan_tinggi"
                               placeholder="Ketik nama perguruan tinggi">
                        <div class="error-text d-none"><i class="fas fa-exclamation-circle"></i> Harap isi perguruan tinggi</div>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Fakultas <span class="text-danger">*</span></label>
                        <input type="text" class="form-control wajib"
                               id="fakultas" name="fakultas"
                               placeholder="Contoh: Fakultas Teknik">
                        <div class="error-text d-none"><i class="fas fa-exclamation-circle"></i> Harap isi fakultas</div>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6 mb-3 mb-md-0">
                        <label class="form-label">Program Studi <span class="text-danger">*</span></label>
                        <input type="text" class="form-control wajib"
                               id="prodi" name="prodi"
                               placeholder="Contoh: Teknik Informatika">
                        <div class="error-text d-none"><i class="fas fa-exclamation-circle"></i> Harap isi program studi</div>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Semester <span class="text-danger">*</span></label>
                        <input type="text" class="form-control wajib"
                               id="semester" name="semester"
                               placeholder="Contoh: 5">
                        <div class="error-text d-none"><i class="fas fa-exclamation-circle"></i> Harap isi semester</div>
                    </div>
                </div>

                <div class="row mb-4">
                    <div class="col-md-6 mb-3 mb-md-0">
                        <label class="form-label">IPK <span class="text-danger">*</span></label>
                        <input type="text" class="form-control wajib"
                               id="ipk" name="ipk"
                               placeholder="Contoh: 3.50">
                        <div class="error-text d-none"><i class="fas fa-exclamation-circle"></i> Harap isi IPK</div>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">NIM <span class="text-danger">*</span></label>
                        <input type="text" class="form-control wajib"
                               id="nim" name="nim"
                               placeholder="Masukkan NIM">
                        <div class="error-text d-none"><i class="fas fa-exclamation-circle"></i> Harap isi NIM</div>
                    </div>
                </div>

                <div class="d-flex justify-content-between mt-4">
                    <button type="button" class="btn-custom btn-back" onclick="kembaliKeStep1()">
                        <i class="fas fa-arrow-left"></i> Kembali
                    </button>

                    <button type="button" class="btn-custom btn-next" id="btnNext" onclick="lanjutKeStep3()">
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

function showAlert(message) {
    alertMessage.textContent = message;
    alertValidation.classList.add('show');
    setTimeout(() => alertValidation.classList.remove('show'), 4000);
}

function validasiForm() {
    let valid = true;
    let firstInvalid = null;

    document.querySelectorAll('.wajib').forEach(input => {
        input.classList.remove('is-invalid');
        const error = input.nextElementSibling;
        if (error) error.classList.add('d-none');

        if (!input.value.trim()) {
            input.classList.add('is-invalid');
            if (error) error.classList.remove('d-none');
            valid = false;
            if (!firstInvalid) firstInvalid = input;
        }
    });

    if (!valid) {
        showAlert('Mohon lengkapi semua data yang wajib diisi!');
        firstInvalid.scrollIntoView({ behavior: 'smooth', block: 'center' });
    }

    return valid;
}

function kembaliKeStep1() {
    window.location.href = "{{ route('magang.data-diri') }}";
}

function lanjutKeStep3() {
    if (validasiForm()) {
        const data = {
            perguruan_tinggi: document.getElementById('perguruan_tinggi').value,
            fakultas: document.getElementById('fakultas').value,
            prodi: document.getElementById('prodi').value,
            semester: document.getElementById('semester').value,
            ipk: document.getElementById('ipk').value,
            nim: document.getElementById('nim').value,
        };

        sessionStorage.setItem('dataKampus', JSON.stringify(data));

        const btn = document.getElementById('btnNext');
        btn.disabled = true;
        btn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Memproses...';

        setTimeout(() => {
            window.location.href = "{{ route('magang.data-magang') }}";
        }, 500);
    }
}

window.addEventListener('DOMContentLoaded', () => {
    const saved = sessionStorage.getItem('dataKampus');
    if (saved) {
        const d = JSON.parse(saved);
        document.getElementById('perguruan_tinggi').value = d.perguruan_tinggi || '';
        document.getElementById('fakultas').value = d.fakultas || '';
        document.getElementById('prodi').value = d.prodi || '';
        document.getElementById('semester').value = d.semester || '';
        document.getElementById('ipk').value = d.ipk || '';
        document.getElementById('nim').value = d.nim || '';
    }
});
</script>

@include('layouts.footer')