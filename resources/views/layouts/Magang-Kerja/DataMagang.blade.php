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

<div class="container my-5">
    <div class="card">
        <div class="card-body">
            <h5><i class="fas fa-briefcase"></i> Data Magang</h5>

            <div class="alert-validation" id="alertValidation">
                <i class="fas fa-exclamation-triangle"></i>
                <span id="alertMessage"></span>
            </div>

            <form id="formData">

                <!-- COMPANY -->
                <div class="mb-3">
                    <label class="form-label">Company <span class="text-danger">*</span></label>
                    <select class="form-select wajib" id="company">
                        <option value="">Pilih Company</option>
                        <option value="KPI">PT Kilang Pertamina Internasional (KPI)</option>
                        <option value="PPN">PT Pertamina Patra Niaga (C&T)</option>
                    </select>
                </div>

                <!-- REGION -->
                <div class="mb-3">
                    <label class="form-label">Region <span class="text-danger">*</span></label>
                    <select class="form-select wajib" id="region">
                        <option value="">Pilih Region</option>
                    </select>
                </div>

                <!-- LOKASI -->
                <div class="mb-3">
                    <label class="form-label">Lokasi <span class="text-danger">*</span></label>
                    <select class="form-select wajib" id="lokasi">
                        <option value="">Pilih Lokasi</option>
                    </select>
                </div>

                <!-- REKOMENDASI -->
                <div class="mb-3">
                    <label class="form-label">Rekomendasi</label>
                    <input type="text" class="form-control" id="rekomendasi" name="rekomendasi" placeholder="Nama Pegawai (Fungsi)">
                </div>

                <!-- TANGGAL -->
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label class="form-label">Mulai Magang <span class="text-danger">*</span></label>
                        <input type="date" class="form-control wajib" id="tanggal_mulai">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Selesai Magang <span class="text-danger">*</span></label>
                        <input type="date" class="form-control wajib" id="tanggal_selesai">
                    </div>
                </div>

                <div class="d-flex justify-content-between mt-4">
                    <button type="button" class="btn-custom btn-back"
                        onclick="window.location.href='{{ route('magang.data-kampus') }}'">
                        <i class="fas fa-arrow-left"></i> Kembali
                    </button>
                    <button type="button" class="btn-custom btn-next" onclick="lanjut()">
                        Selanjutnya <i class="fas fa-arrow-right"></i>
                    </button>
                </div>

            </form>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {

    // =============================
    // AMBIL ELEMENT
    // =============================
    const company = document.getElementById('company');
    const region = document.getElementById('region');
    const lokasi = document.getElementById('lokasi');
    const rekomendasi = document.getElementById('rekomendasi');
    const tanggal_mulai = document.getElementById('tanggal_mulai');
    const tanggal_selesai = document.getElementById('tanggal_selesai');
    const alertValidation = document.getElementById('alertValidation');
    const alertMessage = document.getElementById('alertMessage');

    // =============================
    // ALERT
    // =============================
    function showAlert(msg) {
        alertMessage.innerText = msg;
        alertValidation.classList.add('show');
        setTimeout(() => alertValidation.classList.remove('show'), 4000);
    }

    const dataKPI = {
        "Refinery Unit VI Balongan": [
            "Akuntansi / Ekonomi & Bisnis",
            "Elektro (Arus Kuat)",
            "Elektro (Arus Lemah)",
            "Emergency & Insurance",
            "Health",
            "Hukum",
            "Ilmu Komunikasi / FISIP / Administrasi Publik",
            "Internal Audit",
            "Kelautan / Perkapalan",
            "Kimia Murni / MIPA",
            "Konversi Energi / Migas / Kimia Air Bersih / Blanding / Loading",
            "Logistik / Pergudangan / Procurement",
            "Manajemen / SDM / Psikologi",
            "Metalurgi / Material / Dirgantara",
            "Safety (K3) / SMK3",
            "Teknik Fisika",
            "Teknik Industri",
            "Teknik Informatika",
            "Teknik Kimia",
            "Teknik Lingkungan",
            "Teknik Mesin",
            "Teknik Mesin (Rotating)",
            "Teknik Sipil"
        ]
    };

    // =============================
    // DATA PPN (FULL)
    // =============================
    const dataPPN = {
        "Regional Jatimbalinus": [
            "Asset Operation MOR V","Bitumen Plant Gresik","C&T IA Jatimbalinus","Comm, Rel, & CSR MOR V",
            "Corporate Operation & Service Region V","Corporate Sales Region V","DPPU BIL","DPPU Eltari Group",
            "DPPU Iswahyudi","DPPU Juanda","DPPU Ngurah Rai","Finance MOR V","Fuel Terminal Atapupu",
            "Fuel Terminal Badas","Fuel Terminal Bima","Fuel Terminal Camplong","Fuel Terminal Ende",
            "Fuel Terminal Kalabahi","Fuel Terminal Madiun","Fuel Terminal Malang","Fuel Terminal Maumere",
            "Fuel Terminal Reo","Fuel Terminal Sanggaran","Fuel Terminal Tenau","Fuel Terminal Tuban",
            "Fuel Terminal Waingapu","HC Jatimbalinus","HSSE Region V","Integrated Terminal Ampenan",
            "Integrated Terminal Manggis","Integrated Terminal Surabaya","Integrated Terminal T. Wangi",
            "Legal Counsel Regional Jatimbalinus","Marine Region V","Medical Jatimbalinus",
            "Procurement MOR V","Rel & Project Dev Region V","Retail Bali","Retail Kediri",
            "Retail Malang","Retail NTB","Retail NTT","Retail Sales Region V","Retail Surabaya",
            "S&D Region V","SSC ICT VI Jatimbalinus","XXX"
        ],
        "Regional Jawa Bagian Barat": [
            "Asset Operation JBB","Corp. Opt & Serv JBB","Corporate Sales JBB","DPPU Halim PK Group",
            "DPPU Husein Sastranegara","DPPU Kertajati","Finance JBB","Fuel Terminal Bandung Group",
            "Fuel Terminal Cikampek","Fuel Terminal Tasikmalaya","Fuel Terminal Tg Gerem","HSSE JBB",
            "Human Capital","Integrated Terminal Balongan","Integrated Terminal Jakarta","Legal Counsel JBB",
            "Medical JBB","MWH & LPG Cylinder","Procurement JBB","Reliability & Project Dev JBB",
            "SA Retail Bandung","SA Retail Cirebon","SA Retail Karawang","SA Retail Sukabumi",
            "SAM Retail Banten","SAM Retail Jabode","SHAFTHI","SHIPS","SCC ICT JBB",
            "Supply & Distribution JBB","Unit Comm, Rel & CSR JBB"
        ],
        "Regional Jawa Bagian Tengah": [
            "AFT Adi Sumarmo","AFT Adi Sucipto","AFT Ahmad Yani","AFT YIA",
            "Fuel Terminal Boyolali","Fuel Terminal Lomanis","Fuel Terminal Maos",
            "Fuel Terminal Rewulu","Fuel Terminal Tegal","Integrated Terminal Cilacap",
            "Integrated Terminal Semarang","Kantor Branch Marketing DIY & Surakarta",
            "Kantor Unit Asset Operation JBT","Kantor Unit Comm, Rel & CSR JBT",
            "Kantor Unit Corp Operation & Serv JBT","Kantor Unit Corporate Sales JBT",
            "Kantor Unit Finance JBT","Kantor Unit HC JBT","Kantor Unit HSSE JBT",
            "Kantor Unit Internal Audit","Kantor Unit Legal Counsel JBT",
            "Kantor Unit Medical JBT","Kantor Unit Operational Risk JBT",
            "Kantor Unit Procurement JBT","Kantor Unit Rel & Project Dev JBT",
            "Kantor Unit Retail Sales JBT","Kantor Unit SSC ICT V JBT",
            "Kantor Unit Supply & Distribution JBT"
        ],
        "Regional Kalimantan": [
            "DPPU APT Pranoto","DPPU H. Asan","DPPU Iskandar","DPPU Juwata",
            "DPPU Kalimaru","DPPU Sepinggan","DPPU Supadio","DPPU Syamsudin Noor",
            "DPPU Tjilik Riwut","Fuel Terminal Pulang Pisau","Fuel Terminal Kotabaru",
            "Fuel Terminal Pangkalan Bun","Fuel Terminal Samarinda","Fuel Terminal Sampit",
            "Fuel Terminal Sintang","Fuel Terminal Tarakan","Integrated Terminal Balikpapan",
            "Integrated Terminal Banjarmasin","Integrated Terminal Pontianak",
            "Kantor Patra Niaga Region Kalimantan","SAM Retail Kalbar","SAM Retail Kalselteng",
            "SAM Retail Kaltimut"
        ],
        "Regional Maluku Papua": [
            "Aviation FT Babullah","Aviation FT Deo","Aviation FT Depati Mopah",
            "Aviation FT Depati Rendani","Aviation FT Dumatubun","Aviation FT Frans Kaisiepo",
            "Aviation FT Mathilda","Aviation FT Mozes Kilangin","Aviation FT Paniai",
            "Aviation FT Pattimura","Aviation FT Sentani","Aviation FT Utarom",
            "FT Biak","FT Bula","FT Dobo","FT Fak-Fak","FT Kaimana","FT Labuha",
            "FT Manokwari","FT Masohi","FT Merauke","FT Nabire","FT Namlea",
            "FT Sanana","FT Saumlaki","FT Serui","FT Sorong","FT Ternate",
            "FT Tobelo","FT Tual","IT Jayapura","IT Wayame",
            "Kantor Region Asset Operation Papua-Maluku",
            "Kantor Region Comm, Rel & CSR Papua-Maluku",
            "Kantor Region Corp Operation & Serv Papua-Maluku",
            "Kantor Region Corporate Sales Papua-Maluku",
            "Kantor Region Finance Papua-Maluku",
            "Kantor Region HC Papua-Maluku",
            "Kantor Region HSSE Papua-Maluku",
            "Kantor Region Legal Counsel Papua-Maluku",
            "Kantor Region Medical Papua-Maluku",
            "Kantor Region Procurement Papua-Maluku",
            "Kantor Region Rel & Project Dev Papua-Maluku",
            "Kantor Region Retail Sales Papua-Maluku",
            "Kantor Region Supply & Dist Papua-Maluku",
            "Sales Area Ambon"
        ],
        "Regional Sumbagut": [
            "Asset Operation Region Sumbagut","Branch Marketing Aceh",
            "Branch Marketing Kepulauan Riau","Branch Marketing Sibolga",
            "Branch Marketing Sumbar","Communication & CSR Region Sumbagut",
            "Corp Operation & Serv Region Sumbagut","Corporate Sales Region Sumbagut",
            "DPPU Hang Nadim Group","DPPU Kualanamu Group","DPPU Minangkabau",
            "DPPU SIM","DPPU SSK II","Finance Region Sumbagut",
            "Fuel Terminal Batam","Fuel Terminal Gunung Sitoli",
            "Fuel Terminal Kijang Group","Fuel Terminal Kisaran",
            "Fuel Terminal Krueng Raya","Fuel Terminal Medan Group",
            "Fuel Terminal Meulaboh","Fuel Terminal Natuna Group",
            "Fuel Terminal Pematang Siantar","Fuel Terminal Sabang",
            "Fuel Terminal Sei Siak","Fuel Terminal Sibolga",
            "Fuel Terminal Simeulue","Fuel Terminal Tembilahan",
            "HC Region Sumbagut","HSSE Region Sumbagut",
            "IA Region I","Integrated Terminal Dumai",
            "Integrated Terminal Lhokseumawe","Integrated Terminal Tanjung Uban",
            "Integrated Terminal Teluk Kabung","Legal Counsel Region Sumbagut",
            "Medical Region Sumbagut","Procurement Region Sumbagut",
            "Rel & Project Dev Region Sumbagut",
            "Retail Sales Region Sumbagut",
            "SSC ICT I Region Sumbagut",
            "Supply & Distribution Region Sumbagut"
        ]
    };

   // =============================
// COMPANY → REGION
// =============================
company.addEventListener('change', function () {
    region.innerHTML = '<option value="">Pilih Region</option>';
    lokasi.innerHTML = '<option value="">Pilih Lokasi</option>';

    if (this.value === 'PPN') {
        // Jika pilih PPN, ambil key dari dataPPN
        Object.keys(dataPPN).forEach(function (r) {
            const opt = document.createElement('option');
            opt.value = r;
            opt.textContent = r;
            region.appendChild(opt);
        });
    } else if (this.value === 'KPI') {
        // PERBAIKAN: Jika pilih KPI, ambil key dari dataKPI
        Object.keys(dataKPI).forEach(function (r) {
            const opt = document.createElement('option');
            opt.value = r;
            opt.textContent = r;
            region.appendChild(opt);
        });
    }
});

// =============================
// REGION → LOKASI
// =============================
region.addEventListener('change', function () {
    lokasi.innerHTML = '<option value="">Pilih Lokasi</option>';

    // PERBAIKAN: Cek di kedua objek data
    let selectedData = null;
    if (company.value === 'PPN') {
        selectedData = dataPPN[this.value];
    } else if (company.value === 'KPI') {
        selectedData = dataKPI[this.value];
    }

    if (selectedData) {
        selectedData.forEach(function (l) {
            const opt = document.createElement('option');
            opt.value = l;
            opt.textContent = l;
            lokasi.appendChild(opt);
        });
    }
});

    // =============================
    // SUBMIT
    // =============================
    window.lanjut = function () {
        let valid = true;
        document.querySelectorAll('.wajib').forEach(el => {
            el.classList.remove('is-invalid');
            if (!el.value) {
                el.classList.add('is-invalid');
                valid = false;
            }
        });

        if (!valid) {
            showAlert('Lengkapi semua data wajib');
            return;
        }

        sessionStorage.setItem('dataMagang', JSON.stringify({
            company: company.value,
            region: region.value,
            lokasi: lokasi.value,
            rekomendasi: rekomendasi.value,
            mulai: tanggal_mulai.value,
            selesai: tanggal_selesai.value
        }));

        window.location.href = "{{ route('magang.file-pendukung') }}";
    };

});
</script>

@include('layouts.footer')