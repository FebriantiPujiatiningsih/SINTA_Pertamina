@extends('layouts.dashboard')

@section('title', 'Data Kampus - Pendaftaran Magang')

@section('content')
<div class="container py-4">
    <div class="card shadow-lg border-0">
        <div class="card-header bg-danger text-white">
            <h4 class="mb-0">🎓 Pendaftaran Magang Kerja - Data Kampus</h4>
        </div>

        <!-- Progress Bar -->
        <div class="card-body p-0">
            <div class="progress" style="height: 8px; border-radius: 0;">
                <div class="progress-bar bg-danger" role="progressbar" style="width: 50%"></div>
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
                    <div class="step-indicator active">
                        <div class="step-circle">2</div>
                        <small class="d-block mt-2">Data Kampus</small>
                    </div>
                </div>
                <div class="col text-center">
                    <div class="step-indicator">
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

            <form action="{{ route('magang.store-data-kampus') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label class="form-label fw-bold">Universitas <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="universitas" list="universitasList" required>
                    <datalist id="universitasList">
                        <option value="Universitas Indonesia">
                        <option value="Institut Teknologi Bandung">
                        <option value="Universitas Gadjah Mada">
                        <option value="Universitas Diponegoro">
                        <option value="Institut Teknologi Sepuluh Nopember">
                    </datalist>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-bold">Program Studi <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="prodi" required placeholder="Contoh: Teknik Informatika">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-bold">Semester <span class="text-danger">*</span></label>
                        <select class="form-select" name="semester" required>
                            <option value="">Pilih Semester</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                        </select>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-bold">IPK <span class="text-danger">*</span></label>
                        <input type="number" class="form-control" name="ipk" min="0" max="4" step="0.01" required placeholder="3.50">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-bold">NIM <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" name="nim" required placeholder="Masukkan NIM">
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-bold">Keahlian/Skills <span class="text-danger">*</span></label>
                    <p class="text-muted small">Pilih minimal 3 keahlian yang Anda kuasai</p>
                    <div class="skill-container">
                        <div class="skill-tag" data-skill="Microsoft Office">Microsoft Office</div>
                        <div class="skill-tag" data-skill="Python">Python</div>
                        <div class="skill-tag" data-skill="Data Analysis">Data Analysis</div>
                        <div class="skill-tag" data-skill="SAP">SAP</div>
                        <div class="skill-tag" data-skill="AutoCAD">AutoCAD</div>
                        <div class="skill-tag" data-skill="Bahasa Inggris">Bahasa Inggris</div>
                        <div class="skill-tag" data-skill="Project Management">Project Management</div>
                        <div class="skill-tag" data-skill="Programming">Programming</div>
                    </div>
                    <input type="hidden" name="skills" id="selectedSkills" required>
                </div>

                <div class="d-flex justify-content-between mt-4">
                    <a href="{{ route('magang.data-diri') }}" class="btn btn-secondary">
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

    .skill-container {
        display: flex;
        flex-wrap: wrap;
        gap: 10px;
    }

    .skill-tag {
        padding: 10px 20px;
        background: #e9ecef;
        border: 2px solid transparent;
        border-radius: 25px;
        cursor: pointer;
        transition: all 0.3s;
        font-size: 14px;
        font-weight: 500;
    }

    .skill-tag:hover {
        background: #dee2e6;
        transform: translateY(-2px);
    }

    .skill-tag.selected {
        background: #dc3545;
        color: white;
        border-color: #c82333;
        transform: scale(1.05);
    }
</style>

<script>
    const skillTags = document.querySelectorAll('.skill-tag');
    const selectedSkillsInput = document.getElementById('selectedSkills');
    let selectedSkills = [];

    skillTags.forEach(tag => {
        tag.addEventListener('click', function() {
            const skill = this.dataset.skill;
            
            if (this.classList.contains('selected')) {
                this.classList.remove('selected');
                selectedSkills = selectedSkills.filter(s => s !== skill);
            } else {
                this.classList.add('selected');
                selectedSkills.push(skill);
            }
            
            selectedSkillsInput.value = selectedSkills.join(', ');
        });
    });

    // Validate form
    document.querySelector('form').addEventListener('submit', function(e) {
        if (selectedSkills.length < 3) {
            e.preventDefault();
            alert('Pilih minimal 3 keahlian!');
        }
    });
</script>
@endsection