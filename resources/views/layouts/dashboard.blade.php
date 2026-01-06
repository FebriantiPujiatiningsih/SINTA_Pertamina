<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>SINTA Pertamina</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        body {
            background-color: #f8f9fa;
        }
        .top-bar {
            border-bottom: 5px solid #e74c3c;
            padding: 15px 30px;
            background: white;
        }
        .menu-card {
            padding: 30px;
            border-radius: 6px;
        }
        
        /* Live Counter Stats */
        .stats-container {
            margin-top: 30px;
            margin-bottom: 40px;
        }
        .stat-card {
            background: white;
            border-radius: 12px;
            padding: 25px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.08);
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
            margin-bottom: 20px;
        }
        .stat-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 20px rgba(0,0,0,0.12);
        }
        .stat-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 4px;
            height: 100%;
        }
        .stat-card.blue::before { background: #0d6efd; }
        .stat-card.green::before { background: #198754; }
        .stat-card.orange::before { background: #fd7e14; }
        .stat-card.purple::before { background: #6f42c1; }
        
        .stat-icon {
            width: 50px;
            height: 50px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 24px;
            margin-bottom: 15px;
        }
        .stat-card.blue .stat-icon { background: #cfe2ff; color: #0d6efd; }
        .stat-card.green .stat-icon { background: #d1e7dd; color: #198754; }
        .stat-card.orange .stat-icon { background: #ffe5d0; color: #fd7e14; }
        .stat-card.purple .stat-icon { background: #e2d9f3; color: #6f42c1; }
        
        .stat-value {
            font-size: 36px;
            font-weight: bold;
            color: #2c2c2c;
            margin-bottom: 5px;
        }
        .stat-label {
            font-size: 14px;
            color: #666;
            font-weight: 500;
        }
        .stat-trend {
            font-size: 12px;
            margin-top: 8px;
        }
        .stat-trend.up { color: #198754; }
        .stat-trend.down { color: #dc3545; }
        
        /* Charts */
        .chart-card {
            background: white;
            border-radius: 12px;
            padding: 25px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.08);
            margin-bottom: 30px;
        }
        .chart-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }
        .chart-title {
            font-size: 18px;
            font-weight: 600;
            color: #2c2c2c;
        }
        
        footer {
            border-top: 1px solid #ddd;
            margin-top: 80px;
            padding: 15px;
            font-size: 14px;
            text-align: center;
            color: #555;
            background: white;
        }
    </style>
</head>
<body>

    <!-- HEADER -->
    <div class="top-bar d-flex justify-content-between align-items-center">
        <div>
            <img src="{{ asset('img/logo-pertamina.png') }}" height="70" alt="Pertamina Logo">
            <div class="small text-danger fw-semibold">Semangat Terbarukan</div>
        </div>
        <div class="fw-bold fs-4 text-primary">
            SINTA
            <div class="small text-dark">Student Internship in Pertamina</div>
        </div>
    </div>

    <!-- CONTENT -->
    <div class="container">
        
        <!-- LIVE COUNTER STATS -->
        <div class="stats-container">
            <div class="row">
                <div class="col-md-3">
                    <div class="stat-card blue">
                        <div class="stat-icon">👥</div>
                        <div class="stat-value" id="totalApplicants">0</div>
                        <div class="stat-label">Total Pendaftar</div>
                        <div class="stat-trend up">↑ 12% dari bulan lalu</div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="stat-card green">
                        <div class="stat-icon">✓</div>
                        <div class="stat-value" id="approvedApplicants">0</div>
                        <div class="stat-label">Diterima</div>
                        <div class="stat-trend up">↑ 8% dari bulan lalu</div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="stat-card orange">
                        <div class="stat-icon">⏳</div>
                        <div class="stat-value" id="pendingApplicants">0</div>
                        <div class="stat-label">Menunggu Review</div>
                        <div class="stat-trend down">↓ 5% dari bulan lalu</div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="stat-card purple">
                        <div class="stat-icon">📊</div>
                        <div class="stat-value" id="successRate">0</div>
                        <div class="stat-label">Tingkat Keberhasilan</div>
                        <div class="stat-trend up">↑ 3% dari bulan lalu</div>
                    </div>
                </div>
            </div>
        </div>

        <!-- CHARTS SECTION -->
        <div class="row">
            <div class="col-md-8">
                <div class="chart-card">
                    <div class="chart-header">
                        <h5 class="chart-title">Grafik Pendaftaran Bulanan</h5>
                        <select class="form-select form-select-sm" style="width: 120px;" id="yearFilter">
                            <option value="2026">2026</option>
                            <option value="2025">2025</option>
                        </select>
                    </div>
                    <canvas id="applicantsChart" height="80"></canvas>
                </div>
            </div>
            <div class="col-md-4">
                <div class="chart-card">
                    <div class="chart-header">
                        <h5 class="chart-title">Status Pendaftaran</h5>
                    </div>
                    <canvas id="statusChart"></canvas>
                </div>
            </div>
        </div>

        <!-- MENU CARDS -->
        <div class="row text-center mt-4">
            <!-- MAGANG -->
            <div class="col-md-4">
                <div class="card shadow-sm h-100">
                    <div class="card-body">
                        <h4>Magang Kerja</h4>
                        <p>
                            Mau merasakan magang di PT. Pertamina (Persero)?
                            Silakan daftarkan dirimu sekarang juga.
                        </p>
                        <a href="#" class="btn btn-primary w-100">
                            Daftar Magang Kerja
                        </a>
                    </div>
                </div>
            </div>

            <!-- PENELITIAN -->
            <div class="col-md-4">
                <div class="card shadow-sm h-100">
                    <div class="card-body">
                        <h4>Penelitian</h4>
                        <p>
                            Penelitianmu berkaitan dengan Pertamina?
                            Silakan daftarkan dirimu untuk melakukan penelitian.
                        </p>
                        <a href="{{ route('penelitian.data-diri') }}" class="btn btn-info text-white w-100">
                            Daftar Penelitian
                        </a>
                    </div>
                </div>
            </div>

            <!-- HASIL -->
            <div class="col-md-4">
                <div class="card shadow-sm h-100">
                    <div class="card-body">
                        <h4>Hasil Pendaftaran</h4>
                        <p>
                            Penasaran apakah pendaftaranmu diterima atau tidak?
                            Silakan cek hasil pendaftaran.
                        </p>
                        <a href="#" class="btn btn-success w-100">
                            Periksa Hasil Pendaftaran
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- FOOTER -->
    <footer>
        © 2026 PT. Pertamina (Persero) | All Rights Reserved | Contact Us : 135
    </footer>

    <script>
        // Live Counter Animation
        function animateCounter(elementId, target, suffix = '') {
            let current = 0;
            const increment = target / 50;
            const element = document.getElementById(elementId);
            
            const timer = setInterval(() => {
                current += increment;
                if (current >= target) {
                    element.textContent = target + suffix;
                    clearInterval(timer);
                } else {
                    element.textContent = Math.floor(current) + suffix;
                }
            }, 30);
        }

        // Fetch live stats from API (atau gunakan data dummy)
        async function updateLiveCounters() {
            try {
                // Jika API sudah siap, uncomment ini:
                // const response = await fetch('/api/analytics/live-stats');
                // const data = await response.json();
                
                // Dummy data untuk testing
                const data = {
                    total: 1247,
                    approved: 456,
                    pending: 189,
                    successRate: 68
                };
                
                animateCounter('totalApplicants', data.total);
                animateCounter('approvedApplicants', data.approved);
                animateCounter('pendingApplicants', data.pending);
                animateCounter('successRate', data.successRate, '%');
            } catch (error) {
                console.error('Error fetching stats:', error);
            }
        }

        // Line Chart - Pendaftaran Bulanan
        const ctx1 = document.getElementById('applicantsChart').getContext('2d');
        const applicantsChart = new Chart(ctx1, {
            type: 'line',
            data: {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des'],
                datasets: [{
                    label: 'Magang',
                    data: [65, 78, 90, 125, 142, 156, 178, 195, 210, 225, 245, 267],
                    borderColor: '#0d6efd',
                    backgroundColor: 'rgba(13, 110, 253, 0.1)',
                    tension: 0.4,
                    fill: true
                }, {
                    label: 'Penelitian',
                    data: [28, 35, 42, 55, 68, 72, 85, 92, 105, 118, 132, 145],
                    borderColor: '#0dcaf0',
                    backgroundColor: 'rgba(13, 202, 240, 0.1)',
                    tension: 0.4,
                    fill: true
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: true,
                plugins: {
                    legend: {
                        position: 'top',
                    },
                    tooltip: {
                        mode: 'index',
                        intersect: false,
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        grid: {
                            color: 'rgba(0, 0, 0, 0.05)'
                        }
                    },
                    x: {
                        grid: {
                            display: false
                        }
                    }
                }
            }
        });

        // Doughnut Chart - Status Pendaftaran
        const ctx2 = document.getElementById('statusChart').getContext('2d');
        const statusChart = new Chart(ctx2, {
            type: 'doughnut',
            data: {
                labels: ['Diterima', 'Menunggu', 'Ditolak'],
                datasets: [{
                    data: [456, 189, 102],
                    backgroundColor: [
                        '#198754',
                        '#fd7e14',
                        '#dc3545'
                    ],
                    borderWidth: 0
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: true,
                plugins: {
                    legend: {
                        position: 'bottom',
                    }
                }
            }
        });

        // Year filter change handler
        document.getElementById('yearFilter').addEventListener('change', async (e) => {
            const year = e.target.value;
            // Fetch data berdasarkan tahun (jika API sudah siap)
            // const response = await fetch(`/api/analytics/monthly-data?year=${year}`);
            // const data = await response.json();
            // applicantsChart.data.datasets[0].data = data.magang;
            // applicantsChart.data.datasets[1].data = data.penelitian;
            // applicantsChart.update();
        });

        // Initialize on page load
        window.addEventListener('load', () => {
            updateLiveCounters();
        });

        // Auto-refresh every 30 seconds
        setInterval(() => {
            updateLiveCounters();
        }, 30000);
    </script>

</body>
</html>