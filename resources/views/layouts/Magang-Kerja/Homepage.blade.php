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

    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
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

    /* HERO SECTION */
    .hero-section {
        background: linear-gradient(135deg, var(--pertamina-blue) 0%, var(--pertamina-dark) 100%);
        color: white;
        padding: 80px 0;
        position: relative;
        overflow: hidden;
    }

    .hero-section::before {
        content: '';
        position: absolute;
        top: 0;
        right: -10%;
        width: 600px;
        height: 600px;
        background: radial-gradient(circle, rgba(255,255,255,0.1) 0%, transparent 70%);
        border-radius: 50%;
    }

    .hero-section::after {
        content: '';
        position: absolute;
        bottom: -10%;
        left: -10%;
        width: 500px;
        height: 500px;
        background: radial-gradient(circle, rgba(0, 168, 89, 0.2) 0%, transparent 70%);
        border-radius: 50%;
    }

    .hero-content {
        position: relative;
        z-index: 2;
    }

    .hero-title {
        font-size: 48px;
        font-weight: 800;
        margin-bottom: 20px;
        line-height: 1.2;
        text-shadow: 2px 2px 4px rgba(0,0,0,0.2);
    }

    .hero-subtitle {
        font-size: 20px;
        margin-bottom: 35px;
        opacity: 0.95;
        line-height: 1.6;
    }

    .btn-daftar {
        background: linear-gradient(135deg, var(--pertamina-red), #c82333);
        color: white;
        padding: 18px 45px;
        border-radius: 50px;
        border: none;
        font-weight: 700;
        font-size: 18px;
        cursor: pointer;
        transition: all 0.4s ease;
        display: inline-flex;
        align-items: center;
        gap: 12px;
        box-shadow: 0 8px 25px rgba(227, 6, 19, 0.3);
        text-decoration: none;
    }

    .btn-daftar:hover {
        background: linear-gradient(135deg, #c82333, var(--pertamina-red));
        transform: translateY(-5px);
        box-shadow: 0 12px 35px rgba(227, 6, 19, 0.5);
        color: white;
    }

    .btn-daftar i {
        font-size: 20px;
        transition: transform 0.3s ease;
    }

    .btn-daftar:hover i {
        transform: translateX(5px);
    }

    /* INFO CARDS */
    .info-section {
        padding: 80px 0;
    }

    .section-title {
        text-align: center;
        font-size: 36px;
        font-weight: 700;
        color: var(--pertamina-blue);
        margin-bottom: 15px;
    }

    .section-subtitle {
        text-align: center;
        color: var(--text-light);
        font-size: 18px;
        margin-bottom: 50px;
    }

    .info-card {
        background: white;
        border-radius: 20px;
        padding: 35px;
        box-shadow: 0 10px 30px var(--shadow-medium);
        transition: all 0.4s ease;
        height: 100%;
        border-top: 4px solid var(--pertamina-blue);
    }

    .info-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 15px 45px var(--shadow-medium);
    }

    .info-card-icon {
        width: 70px;
        height: 70px;
        background: linear-gradient(135deg, var(--pertamina-blue), var(--pertamina-dark));
        border-radius: 15px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 32px;
        color: white;
        margin-bottom: 25px;
        box-shadow: 0 6px 20px rgba(0, 94, 184, 0.3);
    }

    .info-card h4 {
        font-size: 22px;
        font-weight: 700;
        color: var(--pertamina-blue);
        margin-bottom: 15px;
    }

    .info-card p {
        color: var(--text-light);
        line-height: 1.7;
        font-size: 15px;
    }

    /* STATISTICS */
    .stats-section {
        background: linear-gradient(135deg, var(--pertamina-green) 0%, #007a48 100%);
        color: white;
        padding: 60px 0;
        margin: 60px 0;
    }

    .stat-item {
        text-align: center;
        padding: 20px;
    }

    .stat-number {
        font-size: 52px;
        font-weight: 800;
        margin-bottom: 10px;
        text-shadow: 2px 2px 4px rgba(0,0,0,0.2);
    }

    .stat-label {
        font-size: 18px;
        opacity: 0.95;
        font-weight: 500;
    }

    /* TIMELINE */
    .timeline-section {
        padding: 80px 0;
        background: white;
    }

    .timeline {
        position: relative;
        max-width: 900px;
        margin: 0 auto;
        padding: 40px 0;
    }

    .timeline::before {
        content: '';
        position: absolute;
        left: 50%;
        transform: translateX(-50%);
        width: 4px;
        height: 100%;
        background: linear-gradient(to bottom, var(--pertamina-blue), var(--pertamina-green));
    }

    .timeline-item {
        position: relative;
        margin-bottom: 50px;
        display: flex;
        align-items: center;
    }

    .timeline-item:nth-child(odd) {
        flex-direction: row;
    }

    .timeline-item:nth-child(even) {
        flex-direction: row-reverse;
    }

    .timeline-content {
        background: #f9fbfd;
        border-radius: 15px;
        padding: 25px;
        width: 45%;
        box-shadow: 0 8px 25px var(--shadow-light);
        border-left: 4px solid var(--pertamina-blue);
    }

    .timeline-item:nth-child(even) .timeline-content {
        border-left: none;
        border-right: 4px solid var(--pertamina-green);
    }

    .timeline-dot {
        position: absolute;
        left: 50%;
        transform: translateX(-50%);
        width: 30px;
        height: 30px;
        background: white;
        border: 5px solid var(--pertamina-blue);
        border-radius: 50%;
        z-index: 2;
    }

    .timeline-content h5 {
        color: var(--pertamina-blue);
        font-weight: 700;
        margin-bottom: 10px;
        font-size: 18px;
    }

    .timeline-content p {
        color: var(--text-light);
        margin: 0;
        line-height: 1.6;
    }

    /* BENEFITS */
    .benefits-section {
        padding: 80px 0;
        background: linear-gradient(135deg, #f8fbff 0%, #eef5ff 100%);
    }

    .benefit-card {
        background: white;
        border-radius: 15px;
        padding: 30px;
        margin-bottom: 25px;
        box-shadow: 0 6px 20px var(--shadow-light);
        display: flex;
        align-items: flex-start;
        gap: 20px;
        transition: all 0.3s ease;
    }

    .benefit-card:hover {
        transform: translateX(10px);
        box-shadow: 0 8px 30px var(--shadow-medium);
    }

    .benefit-icon {
        width: 55px;
        height: 55px;
        background: linear-gradient(135deg, var(--pertamina-green), #007a48);
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 26px;
        color: white;
        flex-shrink: 0;
    }

    .benefit-content h5 {
        color: var(--pertamina-dark);
        font-weight: 700;
        margin-bottom: 8px;
        font-size: 18px;
    }

    .benefit-content p {
        color: var(--text-light);
        margin: 0;
        line-height: 1.6;
    }

    /* CTA SECTION */
    .cta-section {
        background: linear-gradient(135deg, var(--pertamina-dark) 0%, var(--pertamina-blue) 100%);
        color: white;
        padding: 80px 0;
        text-align: center;
        position: relative;
        overflow: hidden;
    }

    .cta-section::before {
        content: '';
        position: absolute;
        top: -50%;
        right: -10%;
        width: 500px;
        height: 500px;
        background: radial-gradient(circle, rgba(255,255,255,0.1) 0%, transparent 70%);
        border-radius: 50%;
    }

    .cta-title {
        font-size: 42px;
        font-weight: 800;
        margin-bottom: 20px;
        position: relative;
        z-index: 2;
    }

    .cta-text {
        font-size: 20px;
        margin-bottom: 40px;
        opacity: 0.95;
        position: relative;
        z-index: 2;
    }

    /* RESPONSIVE */
    @media (max-width: 768px) {
        .hero-title {
            font-size: 32px;
        }

        .hero-subtitle {
            font-size: 16px;
        }

        .section-title {
            font-size: 28px;
        }

        .stat-number {
            font-size: 38px;
        }

        .timeline::before {
            left: 30px;
        }

        .timeline-content {
            width: calc(100% - 80px);
            margin-left: 80px;
        }

        .timeline-item:nth-child(even) .timeline-content {
            margin-left: 80px;
        }

        .timeline-dot {
            left: 30px;
        }

        .cta-title {
            font-size: 28px;
        }

        .cta-text {
            font-size: 16px;
        }
    }
</style>

<!-- HERO SECTION -->
<section class="hero-section">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-7 hero-content">
                <h1 class="hero-title">
                    <i class="fas fa-briefcase"></i> Program Magang Pertamina
                </h1>
                <p class="hero-subtitle">
                    Bergabunglah dalam Program Magang Kerja di PT. Pertamina (Persero) Regional Jawa Bagian Tengah. 
                    Kembangkan potensi diri Anda bersama perusahaan energi terbesar di Indonesia dan raih pengalaman berharga untuk masa depan karir Anda.
                </p>
                <a href="{{ route('magang.data-diri') }}" class="btn-daftar">
                    <i class="fas fa-rocket"></i> Daftar Sekarang
                </a>
            </div>
            <div class="col-lg-5 text-center d-none d-lg-block">
                <i class="fas fa-users" style="font-size: 280px; opacity: 0.15;"></i>
            </div>
        </div>
    </div>
</section>

<!-- INFO CARDS -->
<section class="info-section">
    <div class="container">
        <h2 class="section-title">Mengapa Magang di Pertamina?</h2>
        <p class="section-subtitle">Berbagai keuntungan dan pengalaman berharga menanti Anda</p>
        
        <div class="row">
            <div class="col-md-4 mb-4">
                <div class="info-card">
                    <div class="info-card-icon">
                        <i class="fas fa-university"></i>
                    </div>
                    <h4>Perusahaan Terpercaya</h4>
                    <p>Pertamina adalah BUMN energi terbesar di Indonesia dengan pengalaman lebih dari 65 tahun dalam industri minyak dan gas.</p>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="info-card">
                    <div class="info-card-icon">
                        <i class="fas fa-graduation-cap"></i>
                    </div>
                    <h4>Pembelajaran Praktis</h4>
                    <p>Dapatkan pengalaman kerja nyata dengan bimbingan dari profesional berpengalaman di berbagai bidang industri energi.</p>
                </div>
            </div>
            <!-- <div class="col-md-4 mb-4">
                <div class="info-card">
                    <div class="info-card-icon">
                        <i class="fas fa-certificate"></i>
                    </div>
                    <h4>Sertifikat Resmi</h4>
                    <p>Peserta yang menyelesaikan program magang akan mendapatkan sertifikat resmi dari PT. Pertamina (Persero).</p>
                </div>
            </div> -->
        </div>
    </div>
</section>

<!-- STATISTICS
<section class="stats-section">
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-6">
                <div class="stat-item">
                    <div class="stat-number" data-target="1500">0+</div>
                    <div class="stat-label">Peserta Magang</div>
                </div>
            </div>
            <div class="col-md-3 col-6">
                <div class="stat-item">
                    <div class="stat-number" data-target="50">0+</div>
                    <div class="stat-label">Universitas Mitra</div>
                </div>
            </div>
            <div class="col-md-3 col-6">
                <div class="stat-item">
                    <div class="stat-number" data-target="15">0+</div>
                    <div class="stat-label">Bidang Pekerjaan</div>
                </div>
            </div>
            <div class="col-md-3 col-6">
                <div class="stat-item">
                    <div class="stat-number" data-target="95">0%</div>
                    <div class="stat-label">Tingkat Kepuasan</div>
                </div>
            </div>
        </div>
    </div>
</section> -->

<!-- TIMELINE -->
<section class="timeline-section">
    <div class="container">
        <h2 class="section-title">Alur Pendaftaran Magang</h2>
        <p class="section-subtitle">Proses pendaftaran yang mudah dan transparan</p>
        
        <div class="timeline">
            <div class="timeline-item">
                <div class="timeline-dot"></div>
                <div class="timeline-content">
                    <h5><i class="fas fa-edit"></i> 1. Registrasi Online</h5>
                    <p>Lengkapi formulir pendaftaran melalui sistem SINTA dengan data diri, data kampus, dan informasi magang.</p>
                </div>
            </div>
            
            <div class="timeline-item">
                <div class="timeline-dot"></div>
                <div class="timeline-content">
                    <h5><i class="fas fa-file-upload"></i> 2. Upload Dokumen</h5>
                    <p>Unggah dokumen pendukung seperti CV, transkrip nilai, surat pengantar, dan proposal magang.</p>
                </div>
            </div>
            
            <div class="timeline-item">
                <div class="timeline-dot"></div>
                <div class="timeline-content">
                    <h5><i class="fas fa-search"></i> 3. Seleksi Administrasi</h5>
                    <p>Tim HR akan melakukan verifikasi dan seleksi berkas yang telah Anda kirimkan.</p>
                </div>
            </div>
            
            <div class="timeline-item">
                <div class="timeline-dot"></div>
                <div class="timeline-content">
                    <h5><i class="fas fa-comments"></i> 4. Wawancara</h5>
                    <p>Kandidat yang lolos seleksi administrasi akan diundang untuk mengikuti sesi wawancara.</p>
                </div>
            </div>
            
            <div class="timeline-item">
                <div class="timeline-dot"></div>
                <div class="timeline-content">
                    <h5><i class="fas fa-check-circle"></i> 5. Pengumuman & Penempatan</h5>
                    <p>Peserta yang diterima akan mendapat pemberitahuan resmi dan informasi penempatan divisi.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- BENEFITS -->
<section class="benefits-section">
    <div class="container">
        <h2 class="section-title">Manfaat Program Magang</h2>
        <p class="section-subtitle">Yang akan Anda dapatkan selama mengikuti program</p>
        
        <div class="row">
            <div class="col-lg-6">
                <div class="benefit-card">
                    <div class="benefit-icon">
                        <i class="fas fa-laptop-code"></i>
                    </div>
                    <div class="benefit-content">
                        <h5>Pengalaman Industri</h5>
                        <p>Terlibat langsung dalam proyek-proyek nyata di industri energi nasional</p>
                    </div>
                </div>
                
                <div class="benefit-card">
                    <div class="benefit-icon">
                        <i class="fas fa-user-tie"></i>
                    </div>
                    <div class="benefit-content">
                        <h5>Mentoring Profesional</h5>
                        <p>Bimbingan dari para ahli dan profesional berpengalaman di bidangnya</p>
                    </div>
                </div>
                
                <div class="benefit-card">
                    <div class="benefit-icon">
                        <i class="fas fa-network-wired"></i>
                    </div>
                    <div class="benefit-content">
                        <h5>Networking Luas</h5>
                        <p>Membangun koneksi profesional dengan rekan dan mentor di Pertamina</p>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-6">
                <div class="benefit-card">
                    <div class="benefit-icon">
                        <i class="fas fa-tools"></i>
                    </div>
                    <div class="benefit-content">
                        <h5>Skill Development</h5>
                        <p>Mengasah kemampuan teknis dan soft skill untuk pengembangan karir</p>
                    </div>
                </div>
                
                <div class="benefit-card">
                    <div class="benefit-icon">
                        <i class="fas fa-award"></i>
                    </div>
                    <div class="benefit-content">
                        <h5>Sertifikat & Rekomendasi</h5>
                        <p>Sertifikat resmi dan surat rekomendasi untuk melanjutkan karir</p>
                    </div>
                </div>
                
                <div class="benefit-card">
                    <div class="benefit-icon">
                        <i class="fas fa-door-open"></i>
                    </div>
                    <div class="benefit-content">
                        <h5>Peluang Karir</h5>
                        <p>Kesempatan untuk bergabung sebagai karyawan tetap bagi peserta terbaik</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- CTA SECTION -->
<section class="cta-section">
    <div class="container">
        <h2 class="cta-title">Siap Memulai Perjalanan Karirmu?</h2>
        <p class="cta-text">Daftarkan diri Anda sekarang dan jadilah bagian dari keluarga besar Pertamina!</p>
        <a href="{{ route('magang.data-diri') }}" class="btn-daftar">
            <i class="fas fa-user-plus"></i> Mulai Pendaftaran
        </a>
    </div>
</section>

<script>
// Counter Animation
function animateCounter() {
    const counters = document.querySelectorAll('.stat-number');
    
    counters.forEach(counter => {
        const target = parseInt(counter.getAttribute('data-target'));
        const duration = 2000;
        const increment = target / (duration / 16);
        let current = 0;
        
        const updateCounter = () => {
            current += increment;
            if (current < target) {
                counter.textContent = Math.floor(current) + (counter.textContent.includes('%') ? '%' : '+');
                requestAnimationFrame(updateCounter);
            } else {
                counter.textContent = target + (counter.textContent.includes('%') ? '%' : '+');
            }
        };
        
        // Intersection Observer for trigger
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    updateCounter();
                    observer.unobserve(entry.target);
                }
            });
        }, { threshold: 0.5 });
        
        observer.observe(counter);
    });
}

// Initialize on page load
document.addEventListener('DOMContentLoaded', function() {
    animateCounter();
    
    // Smooth scroll for anchor links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                target.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            }
        });
    });
});
</script>

@include('layouts.footer')