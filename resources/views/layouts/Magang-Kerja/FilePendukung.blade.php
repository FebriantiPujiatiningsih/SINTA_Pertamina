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
        background: var(--pertamina-green);
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
        margin-bottom: 20px;
        font-size: 24px;
    }

    .alert-info {
        background: rgba(0, 168, 89, 0.08);
        border-left: 5px solid var(--pertamina-green);
        border-radius: 10px;
        padding: 15px 20px;
        margin-bottom: 30px;
        color: var(--text-dark);
        display: flex;
        align-items: center;
    }

    .alert-info i {
        color: var(--pertamina-green);
        margin-right: 12px;
        font-size: 20px;
    }

    .form-label {
        font-weight: 600;
        color: var(--text-dark);
        margin-bottom: 10px;
        font-size: 14px;
        display: flex;
        align-items: center;
    }

    .form-label i {
        margin-right: 8px;
        color: var(--pertamina-blue);
    }

    .form-label .text-danger {
        color: var(--pertamina-red) !important;
    }

    .file-upload-wrapper {
        position: relative;
        margin-bottom: 25px;
    }

    .file-upload-input {
        width: 100%;
        padding: 16px;
        border: 2px dashed var(--border-color);
        border-radius: 12px;
        background: #f9fbfd;
        cursor: pointer;
        transition: all 0.3s ease;
        text-align: center;
        position: relative;
    }

    .file-upload-input:hover {
        border-color: var(--pertamina-blue);
        background: #f0f9ff;
        transform: translateY(-2px);
    }

    .file-upload-input.has-file {
        border-color: var(--pertamina-green);
        background: rgba(0, 168, 89, 0.05);
    }

    .file-upload-label {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 10px;
        color: var(--text-light);
        font-size: 14px;
        cursor: pointer;
    }

    .file-upload-label i {
        font-size: 24px;
        color: var(--pertamina-blue);
    }

    .file-upload-label.has-file {
        color: var(--pertamina-green);
    }

    .file-upload-label.has-file i {
        color: var(--pertamina-green);
    }

    .file-name {
        margin-top: 8px;
        font-size: 13px;
        color: var(--text-dark);
        font-weight: 600;
    }

    .file-size {
        font-size: 12px;
        color: var(--text-light);
    }

    .remove-file {
        position: absolute;
        top: 8px;
        right: 8px;
        background: var(--pertamina-red);
        color: white;
        border: none;
        border-radius: 50%;
        width: 28px;
        height: 28px;
        cursor: pointer;
        display: none;
        align-items: center;
        justify-content: center;
        transition: all 0.3s ease;
    }

    .remove-file:hover {
        background: #c82333;
        transform: scale(1.1);
    }

    .file-upload-input.has-file .remove-file {
        display: flex;
    }

    input[type="file"] {
        display: none;
    }

    .form-check {
    background: #f9fbfd;
    padding: 18px 20px;
    border-radius: 10px;
    border: 2px solid var(--border-color);
    margin-bottom: 30px;
    transition: all 0.3s ease;
    /* Tambahkan ini agar sejajar */
    display: flex;
    align-items: flex-start; /* Checklist sejajar dengan baris pertama teks */
    gap: 12px; 
    }

    .form-check-input {
        width: 20px;
        height: 20px;
        cursor: pointer;
        border: 2px solid var(--border-color);
        /* Hapus margin manual agar tidak konflik dengan flex gap */
        margin: 0 !important; 
        flex-shrink: 0; /* Agar checkbox tidak gepeng saat teks panjang */
    }

    .form-check-label {
        cursor: pointer;
        font-size: 14px;
        color: var(--text-dark);
        line-height: 1.5;
        margin: 0; /* Hapus margin bawaan label */
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

    .btn-submit {
        background: linear-gradient(to right, var(--pertamina-green), #008f4a);
        color: white;
        font-size: 16px;
        padding: 16px 40px;
    }

    .btn-submit::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: linear-gradient(to right, var(--pertamina-blue), var(--pertamina-green));
        transition: left 0.4s ease;
        z-index: -1;
    }

    .btn-submit:hover::before {
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

    .progress-upload {
        display: none;
        margin-top: 10px;
    }

    .progress {
        height: 8px;
        border-radius: 10px;
        overflow: hidden;
    }

    .progress-bar {
        background: linear-gradient(to right, var(--pertamina-blue), var(--pertamina-green));
        transition: width 0.3s ease;
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
        <div class="step-item step-completed">
            <div class="step-circle"><i class="fas fa-check"></i></div>
            <div>Data Magang</div>
        </div>
        <div class="step-item step-active">
            <div class="step-circle">4</div>
            <div>File Pendukung</div>
        </div>
    </div>
</div>

<!-- CONTENT -->
<div class="container my-5">
    <div class="card">
        <div class="card-body">

            <h5><i class="fas fa-file-upload"></i> File Pendukung</h5>

            <!-- Alert Validation -->
            <div class="alert-validation" id="alertValidation">
                <i class="fas fa-exclamation-triangle"></i>
                <span id="alertMessage"></span>
            </div>

            <form id="formData" enctype="multipart/form-data">

                <!-- CV -->
                <div class="file-upload-wrapper">
                    <label class="form-label">
                        <i class="fas fa-file-pdf"></i> CV/Resume <span class="text-danger">*</span>
                    </label>
                    <div class="file-upload-input" id="cvWrapper">
                        <input type="file" id="cv" name="cv" accept=".pdf" onchange="handleFileSelect(this, 'cv')">
                        <label for="cv" class="file-upload-label" id="cvLabel">
                            <i class="fas fa-cloud-upload-alt"></i>
                            <div>
                                <strong>Klik untuk upload CV</strong>
                                <div class="text-muted small">PDF, Max 5MB</div>
                            </div>
                        </label>
                        <button type="button" class="remove-file" onclick="removeFile('cv')">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                </div>

                <!-- Transkrip -->
                <div class="file-upload-wrapper">
                    <label class="form-label">
                        <i class="fas fa-file-pdf"></i> Transkrip Nilai <span class="text-danger">*</span>
                    </label>
                    <div class="file-upload-input" id="transkripWrapper">
                        <input type="file" id="transkrip" name="transkrip" accept=".pdf" onchange="handleFileSelect(this, 'transkrip')">
                        <label for="transkrip" class="file-upload-label" id="transkripLabel">
                            <i class="fas fa-cloud-upload-alt"></i>
                            <div>
                                <strong>Klik untuk upload Transkrip</strong>
                                <div class="text-muted small">PDF, Max 5MB</div>
                            </div>
                        </label>
                        <button type="button" class="remove-file" onclick="removeFile('transkrip')">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                </div>

                <!-- Surat Pengantar -->
                <div class="file-upload-wrapper">
                    <label class="form-label">
                        <i class="fas fa-file-pdf"></i> Surat Pengantar dari Kampus <span class="text-danger">*</span>
                    </label>
                    <div class="file-upload-input" id="surat_pengantarWrapper">
                        <input type="file" id="surat_pengantar" name="surat_pengantar" accept=".pdf" onchange="handleFileSelect(this, 'surat_pengantar')">
                        <label for="surat_pengantar" class="file-upload-label" id="surat_pengantarLabel">
                            <i class="fas fa-cloud-upload-alt"></i>
                            <div>
                                <strong>Klik untuk upload Surat Pengantar</strong>
                                <div class="text-muted small">PDF, Max 5MB</div>
                            </div>
                        </label>
                        <button type="button" class="remove-file" onclick="removeFile('surat_pengantar')">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                </div>

                <!-- Proposal -->
                <div class="file-upload-wrapper">
                    <label class="form-label">
                        <i class="fas fa-file-pdf"></i> Proposal <span class="text-danger">*</span>
                    </label>
                    <div class="file-upload-input" id="proposalWrapper">
                        <input type="file" id="proposal" name="proposal" accept=".pdf" onchange="handleFileSelect(this, 'proposal')">
                        <label for="proposal" class="file-upload-label" id="proposalLabel">
                            <i class="fas fa-cloud-upload-alt"></i>
                            <div>
                                <strong>Klik untuk upload Proposal</strong>
                                <div class="text-muted small">PDF, Max 5MB</div>
                            </div>
                        </label>
                        <button type="button" class="remove-file" onclick="removeFile('proposal')">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                </div>

                <!-- Portfolio -->
                <div class="file-upload-wrapper">
                    <label class="form-label">
                        <i class="fas fa-file-pdf"></i> Portfolio/Sertifikat
                    </label>
                    <div class="file-upload-input" id="portfolioWrapper">
                        <input type="file" id="portfolio" name="portfolio" accept=".pdf" onchange="handleFileSelect(this, 'portfolio')">
                        <label for="portfolio" class="file-upload-label" id="portfolioLabel">
                            <i class="fas fa-cloud-upload-alt"></i>
                            <div>
                                <strong>Klik untuk upload Portfolio</strong>
                                <div class="text-muted small">PDF, Max 5MB (Opsional)</div>
                            </div>
                        </label>
                        <button type="button" class="remove-file" onclick="removeFile('portfolio')">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                </div>

                <!-- Agreement -->
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="agreement" required>
                    <label class="form-check-label" for="agreement">
                        Saya menyatakan bahwa data yang saya berikan adalah <strong>benar dan dapat dipertanggungjawabkan</strong>. Saya siap menerima konsekuensi apabila data yang saya berikan tidak sesuai dengan fakta.
                    </label>
                </div>

                <div class="d-flex justify-content-between mt-4">
                    <button type="button" class="btn-custom btn-back" onclick="kembaliKeStep3()">
                        <i class="fas fa-arrow-left"></i> Kembali
                    </button>
                    <button type="button" class="btn-custom btn-submit" id="btnSubmit" onclick="submitForm()">
                        <i class="fas fa-paper-plane"></i> Submit Pendaftaran
                    </button>
                </div>

            </form>

        </div>
    </div>
</div>

<script>
const alertValidation = document.getElementById('alertValidation');
const alertMessage = document.getElementById('alertMessage');
const uploadedFiles = {
    cv: null,
    transkrip: null,
    surat_pengantar: null,
    proposal: null,
    portfolio: null
};

function handleFileSelect(input, type) {
    const file = input.files[0];
    if (!file) return;

    // Validasi format & ukuran tetap sama...

    // Update UI - Pastikan ID wrapper di HTML adalah [type]Wrapper
    const wrapper = document.getElementById(type + 'Wrapper');
    const label = document.getElementById(type + 'Label');
    
    if (wrapper && label) {
        wrapper.classList.add('has-file');
        label.classList.add('has-file');
        label.innerHTML = `
            <i class="fas fa-check-circle"></i>
            <div>
                <div class="file-name">${file.name}</div>
                <div class="file-size">${formatFileSize(file.size)}</div>
            </div>
        `;
        uploadedFiles[type] = file;
    }
}

function removeFile(type) {
    const input = document.getElementById(type);
    const wrapper = document.getElementById(type + 'Wrapper');
    const label = document.getElementById(type + 'Label');
    
    input.value = '';
    wrapper.classList.remove('has-file');
    label.classList.remove('has-file');
    
    const isOptional = type === 'portfolio';
    label.innerHTML = `
        <i class="fas fa-cloud-upload-alt"></i>
        <div>
            <strong>Klik untuk upload ${getFileTitle(type)}</strong>
            <div class="text-muted small">PDF, Max 5MB ${isOptional ? '(Opsional)' : ''}</div>
        </div>
    `;

    uploadedFiles[type] = null;
}

function getFileTitle(type) {
    const titles = {
        cv: 'CV',
        transkrip: 'Transkrip',
        surat_pengantar: 'Surat Pengantar',
        proposal: 'Proposal',
        portfolio: 'Portfolio'
    };
    return titles[type] || type;
}

function formatFileSize(bytes) {
    if (bytes === 0) return '0 Bytes';
    const k = 1024;
    const sizes = ['Bytes', 'KB', 'MB'];
    const i = Math.floor(Math.log(bytes) / Math.log(k));
    return Math.round(bytes / Math.pow(k, i) * 100) / 100 + ' ' + sizes[i];
}

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

    // 1. Validasi CV
    if (!uploadedFiles.cv) {
        showAlert('CV/Resume wajib diupload!');
        document.getElementById('cvWrapper').style.borderColor = 'var(--pertamina-red)';
        setTimeout(() => { document.getElementById('cvWrapper').style.borderColor = ''; }, 3000);
        valid = false;
    }

    // 2. Validasi Transkrip
    if (!uploadedFiles.transkrip) {
        showAlert('Transkrip Nilai wajib diupload!');
        document.getElementById('transkripWrapper').style.borderColor = 'var(--pertamina-red)';
        setTimeout(() => { document.getElementById('transkripWrapper').style.borderColor = ''; }, 3000);
        valid = false;
    }

    // 3. Validasi Surat Pengantar (Perbaikan Variabel & ID)
    if (!uploadedFiles.surat_pengantar) { // Gunakan object uploadedFiles
        showAlert('Surat Pengantar wajib diupload!');
        document.getElementById('surat_pengantarWrapper').style.borderColor = 'var(--pertamina-red)'; // ID disesuaikan dengan HTML
        setTimeout(() => { document.getElementById('surat_pengantarWrapper').style.borderColor = ''; }, 3000);
        valid = false;
    }

    // 4. Validasi Proposal
    if (!uploadedFiles.proposal) {
        showAlert('Proposal wajib diupload!');
        document.getElementById('proposalWrapper').style.borderColor = 'var(--pertamina-red)';
        setTimeout(() => { document.getElementById('proposalWrapper').style.borderColor = ''; }, 3000);
        valid = false;
    }

    // 5. Validasi Agreement
    if (!document.getElementById('agreement').checked) {
        showAlert('Anda harus menyetujui pernyataan terlebih dahulu!');
        valid = false;
    }

    return valid;
}

function kembaliKeStep3() {
    if (confirm('Apakah Anda yakin ingin kembali? Data yang belum disimpan akan hilang.')) {
        window.location.href = "{{ route('magang.data-magang') }}";
    }
}

// public function store(Request $request)
// {
//     try {
//         // Logika simpan data ke DB (sama seperti sebelumnya)
//         $id = DB::table('pendaftaran_magang')->insertGetId([
//             'nama_lengkap' => $request->nama_lengkap,
//             'email_pribadi' => $request->email_pribadi,
//             // ... masukkan semua field lainnya sesuai $request
//             'created_at' => now()
//         ]);

//         return response()->json([
//             'success' => true,
//             'message' => 'Data berhasil disimpan dengan ID: ' . $id
//         ]);

//     } catch (\Exception $e) {
//         return response()->json([
//             'success' => false,
//             'message' => $e->getMessage()
//         ], 500);
//     }
// }

function submitForm() {
    if (!validasiForm()) {
        return;
    }

    // Confirm before submit
    if (!confirm('Apakah Anda yakin semua data sudah benar dan siap untuk disubmit?')) {
        return;
    }

    // Get all data from sessionStorage
    const dataDiri = JSON.parse(sessionStorage.getItem('dataDiri') || '{}');
    const dataKampus = JSON.parse(sessionStorage.getItem('dataKampus') || '{}');
    const dataMagang = JSON.parse(sessionStorage.getItem('dataMagang') || '{}');

    // Show loading state
    const btnSubmit = document.getElementById('btnSubmit');
    btnSubmit.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Mengirim Data...';
    btnSubmit.disabled = true;

    // Simulate form submission
    setTimeout(() => {
        // Here you would normally send data to server using FormData
        console.log('Data Diri:', dataDiri);
        console.log('Data Kampus:', dataKampus);
        console.log('Data Magang:', dataMagang);
        console.log('Files:', uploadedFiles);

        // Clear sessionStorage
        sessionStorage.removeItem('dataDiri');
        sessionStorage.removeItem('dataKampus');
        sessionStorage.removeItem('dataMagang');

        // Show success message
        alert('Pendaftaran berhasil disubmit! Terima kasih telah mendaftar.');
        
        // Redirect to dashboard
        window.location.href = "{{ route('dashboard') }}";
    }, 2000);
}

// Prevent form submission on Enter key
document.getElementById('formData').addEventListener('keydown', function(e) {
    if (e.key === 'Enter') {
        e.preventDefault();
    }
});
</script>

@include('layouts.footer')