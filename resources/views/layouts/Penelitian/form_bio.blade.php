<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulir Pendaftaran - SINTA Pertamina</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

    <style>
        body {
            background-color: #f8f9fa;
        }
        /* Styling untuk Tab Navigasi agar mirip gambar */
        .step-indicator {
            margin-bottom: 30px;
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
            gap: 10px;
        }
        .step-indicator .nav-link {
            border-radius: 50px; /* Bentuk Oval/Pill */
            padding: 8px 20px;
            color: #6c757d;
            background-color: #fff;
            border: 1px solid #dee2e6;
            font-weight: 500;
            font-size: 0.9rem;
            transition: all 0.3s;
        }
        .step-indicator .nav-link:hover {
            background-color: #e9ecef;
        }
        .step-indicator .nav-link.active {
            background-color: #343a40; /* Warna Gelap sesuai gambar */
            color: #fff !important;
            border-color: #343a40;
        }
        /* Icon Check untuk tab yang sudah selesai (Opsional logic) */
        .step-indicator .nav-link.completed {
            border-color: #198754;
            color: #198754;
        }
        
        .card-form {
            border: none;
            border-radius: 12px;
            box-shadow: 0 4px 20px rgba(0,0,0,0.05);
            background: white;
        }
        .form-section-title {
            font-size: 1.25rem;
            font-weight: 600;
            margin-bottom: 20px;
            padding-bottom: 10px;
            border-bottom: 1px solid #eee;
            color: #333;
        }
        .required-star {
            color: #dc3545;
        }
    </style>
</head>
<body>

    <nav class="navbar navbar-light bg-white border-bottom sticky-top">
        <div class="container">
            <a class="navbar-brand fw-bold text-primary" href="{{ url('/') }}">
                <img src="{{ asset('img/logo-pertamina.png') }}" alt="Logo" height="35" class="me-2">
                SINTA
            </a>
            <a href="{{ url('/penelitian/dashboard') }}" class="btn btn-outline-secondary btn-sm rounded-pill">
                Keluar / Batal
            </a>
        </div>
    </nav>

    <div class="container mt-5 mb-5">
        
        <div class="text-center mb-4">
            <h3 class="fw-bold">Aplikasi Pendaftaran Penelitian</h3>
            <p class="text-muted">Lengkapi data di bawah ini secara bertahap.</p>
        </div>

        <div class="row justify-content-center">
            <div class="col-lg-10">

                <form action="#" method="POST" enctype="multipart/form-data">
                    @csrf 

                    <ul class="nav nav-pills step-indicator" id="pills-tab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="pills-bio-tab" data-bs-toggle="pill" data-bs-target="#pills-bio" type="button" role="tab">
                                <i class="bi bi-person me-1"></i> Biographical
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="pills-contact-tab" data-bs-toggle="pill" data-bs-target="#pills-contact" type="button" role="tab">
                                <i class="bi bi-telephone me-1"></i> Contact
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="pills-edu-tab" data-bs-toggle="pill" data-bs-target="#pills-edu" type="button" role="tab">
                                <i class="bi bi-mortarboard me-1"></i> Education
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="pills-info-tab" data-bs-toggle="pill" data-bs-target="#pills-info" type="button" role="tab">
                                <i class="bi bi-file-earmark-text me-1"></i> My Information
                            </button>
                        </li>
                    </ul>

                    <div class="card card-form">
                        <div class="card-body p-4 p-md-5">
                            
                            <div class="tab-content" id="pills-tabContent">
                                
                                <div class="tab-pane fade show active" id="pills-bio" role="tabpanel">
                                    <div class="form-section-title">Biographical Information</div>
                                    <div class="alert alert-info small py-2"><i class="bi bi-info-circle me-1"></i> Isi identitas sesuai KTP.</div>
                                    
                                    <div class="row g-3">
                                        <div class="col-md-12">
                                            <label class="form-label">Nama Lengkap <span class="required-star">*</span></label>
                                            <input type="text" class="form-control" name="nama" required>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label">NIK (Nomor Induk Kependudukan) <span class="required-star">*</span></label>
                                            <input type="number" class="form-control" name="nik" required>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label">Jenis Kelamin</label>
                                            <select class="form-select" name="gender">
                                                <option value="L">Laki-laki</option>
                                                <option value="P">Perempuan</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label">Tempat Lahir</label>
                                            <input type="text" class="form-control" name="tempat_lahir">
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label">Tanggal Lahir</label>
                                            <input type="date" class="form-control" name="tgl_lahir">
                                        </div>
                                    </div>
                                    
                                    <div class="mt-4 text-end">
                                        <button type="button" class="btn btn-primary rounded-pill px-4 btn-next" onclick="nextTab('pills-contact-tab')">Next Step <i class="bi bi-arrow-right"></i></button>
                                    </div>
                                </div>

                                <div class="tab-pane fade" id="pills-contact" role="tabpanel">
                                    <div class="form-section-title">Contact Details</div>
                                    
                                    <div class="row g-3">
                                        <div class="col-md-6">
                                            <label class="form-label">Email Address <span class="required-star">*</span></label>
                                            <input type="email" class="form-control" name="email" required>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label">Nomor WhatsApp / HP <span class="required-star">*</span></label>
                                            <input type="text" class="form-control" name="no_hp" required>
                                        </div>
                                        <div class="col-md-12">
                                            <label class="form-label">Alamat Domisili Lengkap</label>
                                            <textarea class="form-control" name="alamat" rows="3"></textarea>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label">Kota / Kabupaten</label>
                                            <input type="text" class="form-control" name="kota">
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label">Kode Pos</label>
                                            <input type="number" class="form-control" name="kode_pos">
                                        </div>
                                    </div>

                                    <div class="mt-4 d-flex justify-content-between">
                                        <button type="button" class="btn btn-outline-secondary rounded-pill px-4" onclick="nextTab('pills-bio-tab')"><i class="bi bi-arrow-left"></i> Back</button>
                                        <button type="button" class="btn btn-primary rounded-pill px-4" onclick="nextTab('pills-edu-tab')">Next Step <i class="bi bi-arrow-right"></i></button>
                                    </div>
                                </div>

                                <div class="tab-pane fade" id="pills-edu" role="tabpanel">
                                    <div class="form-section-title">Education Background</div>
                                    
                                    <div class="row g-3">
                                        <div class="col-md-12">
                                            <label class="form-label">Asal Universitas / Kampus <span class="required-star">*</span></label>
                                            <input type="text" class="form-control" name="universitas" placeholder="Contoh: Universitas Diponegoro" required>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label">Jenjang Pendidikan</label>
                                            <select class="form-select" name="jenjang">
                                                <option selected>S1</option>
                                                <option>D3</option>
                                                <option>D4</option>
                                                <option>S2</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label">Jurusan / Program Studi <span class="required-star">*</span></label>
                                            <input type="text" class="form-control" name="jurusan" required>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label">NIM (Nomor Induk Mahasiswa) <span class="required-star">*</span></label>
                                            <input type="text" class="form-control" name="nim" required>
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label">Semester Saat Ini</label>
                                            <input type="number" class="form-control" name="semester">
                                        </div>
                                        <div class="col-md-6">
                                            <label class="form-label">IPK Terakhir</label>
                                            <input type="text" class="form-control" name="ipk" placeholder="Contoh: 3.75">
                                        </div>
                                    </div>

                                    <div class="mt-4 d-flex justify-content-between">
                                        <button type="button" class="btn btn-outline-secondary rounded-pill px-4" onclick="nextTab('pills-contact-tab')"><i class="bi bi-arrow-left"></i> Back</button>
                                        <button type="button" class="btn btn-primary rounded-pill px-4" onclick="nextTab('pills-info-tab')">Next Step <i class="bi bi-arrow-right"></i></button>
                                    </div>
                                </div>

                                <div class="tab-pane fade" id="pills-info" role="tabpanel">
                                    <div class="form-section-title">My Information (Data Penelitian)</div>
                                    
                                    <div class="alert alert-warning small"><i class="bi bi-exclamation-triangle me-1"></i> Pastikan dokumen format PDF max 2MB.</div>

                                    <div class="row g-3">
                                        <div class="col-md-12">
                                            <label class="form-label">Judul Penelitian / Skripsi <span class="required-star">*</span></label>
                                            <input type="text" class="form-control" name="judul" required>
                                        </div>
                                        
                                        <div class="col-md-12">
                                            <label class="form-label fw-semibold">Upload Proposal Penelitian</label>
                                            <div class="input-group mb-3">
                                                <input type="file" class="form-control" name="file_proposal" accept=".pdf">
                                                <label class="input-group-text" for="file_proposal"><i class="bi bi-cloud-upload"></i></label>
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <label class="form-label fw-semibold">Upload Surat Pengantar Kampus</label>
                                            <div class="input-group mb-3">
                                                <input type="file" class="form-control" name="file_surat" accept=".pdf">
                                                <label class="input-group-text" for="file_surat"><i class="bi bi-cloud-upload"></i></label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="mt-5 d-flex justify-content-between align-items-center">
                                        <button type="button" class="btn btn-outline-secondary rounded-pill px-4" onclick="nextTab('pills-edu-tab')"><i class="bi bi-arrow-left"></i> Back</button>
                                        
                                        <button type="submit" class="btn btn-success btn-lg rounded-pill px-5 shadow">
                                            Submit Application <i class="bi bi-check-circle-fill ms-2"></i>
                                        </button>
                                    </div>
                                </div>

                            </div> </div>
                    </div>
                </form>

            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        function nextTab(tabId) {
            // Cari tombol tab berdasarkan ID-nya dan klik secara otomatis
            const triggerEl = document.querySelector('#' + tabId);
            const tab = new bootstrap.Tab(triggerEl);
            tab.show();
            
            // Scroll ke atas sedikit biar enak dilihat
            window.scrollTo({ top: 0, behavior: 'smooth' });
        }
    </script>
</body>
</html>