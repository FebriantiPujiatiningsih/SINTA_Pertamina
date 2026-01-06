<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin | SINTA Pertamina</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
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
            --sidebar-width: 260px;
        }
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', 'Arial', sans-serif;
        }
        
        body {
            background-color: var(--background-light);
            display: flex;
            min-height: 100vh;
            position: relative;
            overflow-x: hidden;
        }
        
        /* Background pattern */
        body::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image: 
                radial-gradient(circle at 10% 20%, rgba(0, 94, 184, 0.02) 0%, transparent 20%),
                radial-gradient(circle at 90% 80%, rgba(0, 168, 89, 0.02) 0%, transparent 20%);
            z-index: -1;
        }
        
        /* Sidebar */
        .sidebar {
            width: var(--sidebar-width);
            background: linear-gradient(180deg, var(--pertamina-dark) 0%, var(--pertamina-blue) 100%);
            color: white;
            height: 100vh;
            position: fixed;
            left: 0;
            top: 0;
            display: flex;
            flex-direction: column;
            box-shadow: 5px 0 25px rgba(0, 0, 0, 0.1);
            z-index: 100;
            transition: transform 0.3s ease;
        }
        
        .sidebar-header {
            padding: 25px 20px;
            text-align: center;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
            background: rgba(0, 0, 0, 0.1);
        }
        
        .logo-dashboard {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 15px;
            margin-bottom: 10px;
        }
        
        .logo-dashboard img {
            height: 40px;
            width: auto;
            filter: brightness(0) invert(1);
        }
        
        .logo-dashboard h1 {
            font-size: 22px;
            font-weight: 700;
            letter-spacing: 0.5px;
        }
        
        .dashboard-title {
            font-size: 14px;
            opacity: 0.9;
            margin-top: 5px;
        }
        
        .sidebar-menu {
            padding: 20px 0;
            flex-grow: 1;
            overflow-y: auto;
        }
        
        .menu-item {
            display: flex;
            align-items: center;
            padding: 16px 25px;
            color: rgba(255, 255, 255, 0.9);
            text-decoration: none;
            transition: all 0.3s;
            border-left: 4px solid transparent;
            margin-bottom: 5px;
        }
        
        .menu-item:hover {
            background: rgba(255, 255, 255, 0.1);
            color: white;
            border-left: 4px solid var(--pertamina-green);
        }
        
        .menu-item.active {
            background: rgba(255, 255, 255, 0.15);
            color: white;
            border-left: 4px solid var(--pertamina-green);
            font-weight: 600;
        }
        
        .menu-item i {
            font-size: 18px;
            margin-right: 15px;
            width: 24px;
            text-align: center;
        }
        
        .menu-item span {
            font-size: 15px;
        }
        
        .menu-divider {
            height: 1px;
            background: rgba(255, 255, 255, 0.1);
            margin: 15px 25px;
        }
        
        .sidebar-footer {
            padding: 20px;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            background: rgba(0, 0, 0, 0.1);
        }
        
        .user-info {
            display: flex;
            align-items: center;
            gap: 12px;
        }
        
        .user-avatar {
            width: 45px;
            height: 45px;
            background: linear-gradient(135deg, var(--pertamina-green), var(--pertamina-blue));
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 600;
            font-size: 18px;
        }
        
        .user-details h4 {
            font-size: 14px;
            margin-bottom: 3px;
        }
        
        .user-details p {
            font-size: 12px;
            opacity: 0.8;
        }
        
        /* Main Content */
        .main-content {
            flex: 1;
            margin-left: var(--sidebar-width);
            padding: 20px;
            min-height: 100vh;
        }
        
        .top-bar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 15px 25px;
            background: white;
            border-radius: 12px;
            margin-bottom: 25px;
            box-shadow: 0 4px 15px var(--shadow-light);
        }
        
        .page-title h2 {
            color: var(--pertamina-blue);
            font-size: 24px;
            font-weight: 700;
        }
        
        .page-title p {
            color: var(--text-light);
            font-size: 14px;
            margin-top: 5px;
        }
        
        .top-bar-actions {
            display: flex;
            align-items: center;
            gap: 15px;
        }
        
        .search-box {
            position: relative;
        }
        
        .search-box input {
            padding: 12px 20px;
            padding-left: 45px;
            border-radius: 8px;
            border: 1px solid var(--border-color);
            width: 250px;
            font-size: 14px;
            transition: all 0.3s;
        }
        
        .search-box input:focus {
            outline: none;
            border-color: var(--pertamina-blue);
            box-shadow: 0 0 0 3px rgba(0, 94, 184, 0.1);
        }
        
        .search-box i {
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: var(--pertamina-blue);
        }
        
        .notification-btn {
            position: relative;
            background: none;
            border: none;
            font-size: 20px;
            color: var(--text-light);
            cursor: pointer;
            padding: 8px;
            border-radius: 8px;
            transition: all 0.3s;
        }
        
        .notification-btn:hover {
            color: var(--pertamina-blue);
            background: rgba(0, 94, 184, 0.05);
        }
        
        .notification-badge {
            position: absolute;
            top: 0;
            right: 0;
            background: var(--pertamina-red);
            color: white;
            font-size: 10px;
            width: 18px;
            height: 18px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 600;
        }
        
        .logout-btn {
            display: flex;
            align-items: center;
            gap: 8px;
            padding: 10px 20px;
            background: linear-gradient(to right, var(--pertamina-red), #C62828);
            color: white;
            border: none;
            border-radius: 8px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s;
        }
        
        .logout-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(227, 6, 19, 0.2);
        }
        
        /* Content Cards */
        .content-area {
            padding: 0 10px;
        }
        
        .welcome-card {
            background: linear-gradient(135deg, var(--pertamina-blue) 0%, var(--pertamina-dark) 100%);
            color: white;
            padding: 30px;
            border-radius: 16px;
            margin-bottom: 30px;
            box-shadow: 0 10px 30px rgba(0, 94, 184, 0.2);
        }
        
        .welcome-card h3 {
            font-size: 28px;
            margin-bottom: 10px;
        }
        
        .welcome-card p {
            opacity: 0.9;
            font-size: 16px;
            max-width: 600px;
        }
        
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 25px;
            margin-bottom: 30px;
        }
        
        .stat-card {
            background: white;
            padding: 25px;
            border-radius: 12px;
            box-shadow: 0 5px 20px var(--shadow-light);
            border-top: 4px solid var(--pertamina-blue);
            transition: transform 0.3s, box-shadow 0.3s;
        }
        
        .stat-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px var(--shadow-medium);
        }
        
        .stat-card.green {
            border-top-color: var(--pertamina-green);
        }
        
        .stat-card.red {
            border-top-color: var(--pertamina-red);
        }
        
        .stat-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 15px;
        }
        
        .stat-header h4 {
            color: var(--text-dark);
            font-size: 16px;
            font-weight: 600;
        }
        
        .stat-icon {
            width: 50px;
            height: 50px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 22px;
            color: white;
        }
        
        .stat-card .stat-icon {
            background: var(--pertamina-blue);
        }
        
        .stat-card.green .stat-icon {
            background: var(--pertamina-green);
        }
        
        .stat-card.red .stat-icon {
            background: var(--pertamina-red);
        }
        
        .stat-value {
            font-size: 32px;
            font-weight: 700;
            color: var(--pertamina-blue);
            margin-bottom: 5px;
        }
        
        .stat-card.green .stat-value {
            color: var(--pertamina-green);
        }
        
        .stat-card.red .stat-value {
            color: var(--pertamina-red);
        }
        
        .stat-desc {
            color: var(--text-light);
            font-size: 14px;
            margin-top: 8px;
        }
        
        /* Recent Activity */
        .section-title {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin: 40px 0 20px;
        }
        
        .section-title h3 {
            color: var(--pertamina-blue);
            font-size: 20px;
            font-weight: 600;
        }
        
        .view-all {
            color: var(--pertamina-blue);
            text-decoration: none;
            font-weight: 600;
            font-size: 14px;
            transition: all 0.3s;
        }
        
        .view-all:hover {
            color: var(--pertamina-dark);
            text-decoration: underline;
        }
        
        .activity-card {
            background: white;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 5px 20px var(--shadow-light);
            margin-bottom: 30px;
        }
        
        .activity-list {
            padding: 20px;
        }
        
        .activity-item {
            display: flex;
            align-items: center;
            padding: 15px;
            border-bottom: 1px solid var(--border-color);
            transition: background 0.3s;
        }
        
        .activity-item:hover {
            background: rgba(0, 94, 184, 0.03);
        }
        
        .activity-item:last-child {
            border-bottom: none;
        }
        
        .activity-icon {
            width: 40px;
            height: 40px;
            border-radius: 8px;
            background: rgba(0, 94, 184, 0.1);
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 15px;
            color: var(--pertamina-blue);
        }
        
        .activity-details h5 {
            color: var(--text-dark);
            font-size: 15px;
            margin-bottom: 5px;
        }
        
        .activity-details p {
            color: var(--text-light);
            font-size: 13px;
        }
        
        .activity-time {
            margin-left: auto;
            color: var(--text-light);
            font-size: 12px;
        }
        
        /* Quick Actions */
        .quick-actions {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 20px;
            margin-top: 30px;
        }
        
        .action-btn {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 25px 20px;
            background: white;
            border-radius: 12px;
            text-decoration: none;
            color: var(--text-dark);
            box-shadow: 0 5px 15px var(--shadow-light);
            transition: all 0.3s;
            text-align: center;
        }
        
        .action-btn:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px var(--shadow-medium);
            color: var(--pertamina-blue);
        }
        
        .action-icon {
            width: 60px;
            height: 60px;
            border-radius: 12px;
            background: linear-gradient(135deg, var(--pertamina-blue), var(--pertamina-green));
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 15px;
            color: white;
            font-size: 24px;
        }
        
        .action-btn h4 {
            font-size: 16px;
            margin-bottom: 8px;
        }
        
        .action-btn p {
            font-size: 13px;
            color: var(--text-light);
        }
        
        /* Mobile Menu Toggle */
        .mobile-menu-toggle {
            display: none;
            position: fixed;
            top: 20px;
            left: 20px;
            z-index: 101;
            background: var(--pertamina-blue);
            color: white;
            width: 45px;
            height: 45px;
            border-radius: 8px;
            border: none;
            font-size: 20px;
            cursor: pointer;
            align-items: center;
            justify-content: center;
        }
        
        /* Responsive */
        @media (max-width: 1024px) {
            .sidebar {
                transform: translateX(-100%);
            }
            
            .sidebar.active {
                transform: translateX(0);
            }
            
            .main-content {
                margin-left: 0;
            }
            
            .mobile-menu-toggle {
                display: flex;
            }
            
            .search-box input {
                width: 200px;
            }
        }
        
        @media (max-width: 768px) {
            .top-bar {
                flex-direction: column;
                align-items: flex-start;
                gap: 15px;
            }
            
            .top-bar-actions {
                width: 100%;
                justify-content: space-between;
            }
            
            .search-box input {
                width: 180px;
            }
            
            .stats-grid {
                grid-template-columns: 1fr;
            }
            
            .welcome-card h3 {
                font-size: 24px;
            }
            
            .quick-actions {
                grid-template-columns: 1fr;
            }
        }
        
        @media (max-width: 480px) {
            .main-content {
                padding: 15px;
            }
            
            .search-box input {
                width: 150px;
            }
            
            .logout-btn span {
                display: none;
            }
            
            .logout-btn i {
                margin-right: 0;
            }
            
            .welcome-card {
                padding: 20px;
            }
        }
    </style>
</head>
<body>
    <!-- Mobile Menu Toggle -->
    <button class="mobile-menu-toggle" id="menuToggle">
        <i class="fas fa-bars"></i>
    </button>
    
    <!-- Sidebar -->
    <div class="sidebar" id="sidebar">
        <div class="sidebar-header">
            <div class="logo-dashboard">
                <i class="fas fa-bolt"></i>
                <h1>SINTA</h1>
            </div>
            <div class="dashboard-title">Sistem Magang Pertamina</div>
        </div>
        
        <div class="sidebar-menu">
            <a href="#" class="menu-item active">
                <i class="fas fa-home"></i>
                <span>Dashboard</span>
            </a>
            
            <a href="#" class="menu-item">
                <i class="fas fa-user-friends"></i>
                <span>Data Magang</span>
            </a>
            
            <a href="#" class="menu-item">
                <i class="fas fa-calendar-alt"></i>
                <span>Jadwal Kegiatan</span>
            </a>
            
            <a href="#" class="menu-item">
                <i class="fas fa-file-alt"></i>
                <span>Laporan</span>
            </a>
            
            <a href="#" class="menu-item">
                <i class="fas fa-chart-bar"></i>
                <span>Analytics</span>
            </a>
            
            <div class="menu-divider"></div>
            
            <a href="#" class="menu-item">
                <i class="fas fa-cog"></i>
                <span>Pengaturan</span>
            </a>
            
            <a href="#" class="menu-item">
                <i class="fas fa-question-circle"></i>
                <span>Bantuan</span>
            </a>
        </div>
        
        <div class="sidebar-footer">
            <div class="user-info">
                <div class="user-avatar">
                    {{ strtoupper(substr(session('user_name', 'Admin'), 0, 1)) }}
                </div>
                <div class="user-details">
                    <h4>{{ session('user_name', 'Administrator') }}</h4>
                    <p>Administrator</p>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Main Content -->
    <div class="main-content">
        <!-- Top Bar -->
        <div class="top-bar">
            <div class="page-title">
                <h2>Dashboard Admin</h2>
                <p>Selamat datang di Sistem Magang Pertamina</p>
            </div>
            
            <div class="top-bar-actions">
                <div class="search-box">
                    <i class="fas fa-search"></i>
                    <input type="text" placeholder="Cari data...">
                </div>
                
                <button class="notification-btn">
                    <i class="fas fa-bell"></i>
                    <span class="notification-badge">3</span>
                </button>
                
                <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                    @csrf
                    <button type="submit" class="logout-btn" id="logoutBtn">
                        <i class="fas fa-sign-out-alt"></i>
                        <span>Logout</span>
                    </button>
                </form>
            </div>
        </div>
        
        <!-- Content Area -->
        <div class="content-area">
            <!-- Welcome Card -->
            <div class="welcome-card">
                <h3>Selamat Datang, {{ session('user_name', 'Administrator') }}!</h3>
                <p>Anda login sebagai Administrator. Kelola data magang, jadwal kegiatan, dan laporan sistem SINTA Pertamina.</p>
            </div>
            
            <!-- Stats Cards -->
            <div class="stats-grid">
                <div class="stat-card">
                    <div class="stat-header">
                        <h4>Total Peserta Magang</h4>
                        <div class="stat-icon">
                            <i class="fas fa-users"></i>
                        </div>
                    </div>
                    <div class="stat-value">48</div>
                    <div class="stat-desc">+5 dari bulan lalu</div>
                </div>
                
                <div class="stat-card green">
                    <div class="stat-header">
                        <h4>Aktif Saat Ini</h4>
                        <div class="stat-icon">
                            <i class="fas fa-user-check"></i>
                        </div>
                    </div>
                    <div class="stat-value">32</div>
                    <div class="stat-desc">Sedang menjalani magang</div>
                </div>
                
                <div class="stat-card red">
                    <div class="stat-header">
                        <h4>Menunggu Review</h4>
                        <div class="stat-icon">
                            <i class="fas fa-tasks"></i>
                        </div>
                    </div>
                    <div class="stat-value">12</div>
                    <div class="stat-desc">Laporan perlu evaluasi</div>
                </div>
            </div>
            
            <!-- Recent Activity -->
            <div class="section-title">
                <h3>Aktivitas Terbaru</h3>
                <a href="#" class="view-all">Lihat Semua</a>
            </div>
            
            <div class="activity-card">
                <div class="activity-list">
                    <div class="activity-item">
                        <div class="activity-icon">
                            <i class="fas fa-user-plus"></i>
                        </div>
                        <div class="activity-details">
                            <h5>Peserta baru terdaftar</h5>
                            <p>Andi Pratama mendaftar program magang IT</p>
                        </div>
                        <div class="activity-time">10 menit lalu</div>
                    </div>
                    
                    <div class="activity-item">
                        <div class="activity-icon">
                            <i class="fas fa-file-upload"></i>
                        </div>
                        <div class="activity-details">
                            <h5>Laporan baru diunggah</h5>
                            <p>Siti Nurhaliza mengunggah laporan mingguan</p>
                        </div>
                        <div class="activity-time">1 jam lalu</div>
                    </div>
                    
                    <div class="activity-item">
                        <div class="activity-icon">
                            <i class="fas fa-check-circle"></i>
                        </div>
                        <div class="activity-details">
                            <h5>Magang disetujui</h5>
                            <p>Program magang Budi Santoso telah disetujui</p>
                        </div>
                        <div class="activity-time">3 jam lalu</div>
                    </div>
                    
                    <div class="activity-item">
                        <div class="activity-icon">
                            <i class="fas fa-calendar-check"></i>
                        </div>
                        <div class="activity-details">
                            <h5>Jadwal baru ditambahkan</h5>
                            <p>Workshop Technical Skill tanggal 15 Juni</p>
                        </div>
                        <div class="activity-time">5 jam lalu</div>
                    </div>
                </div>
            </div>
            
            <!-- Quick Actions -->
            <div class="section-title">
                <h3>Aksi Cepat</h3>
            </div>
            
            <div class="quick-actions">
                <a href="#" class="action-btn">
                    <div class="action-icon">
                        <i class="fas fa-user-plus"></i>
                    </div>
                    <h4>Tambah Peserta</h4>
                    <p>Tambahkan peserta magang baru</p>
                </a>
                
                <a href="#" class="action-btn">
                    <div class="action-icon">
                        <i class="fas fa-calendar-plus"></i>
                    </div>
                    <h4>Buat Jadwal</h4>
                    <p>Atur jadwal kegiatan magang</p>
                </a>
                
                <a href="#" class="action-btn">
                    <div class="action-icon">
                        <i class="fas fa-file-export"></i>
                    </div>
                    <h4>Ekspor Data</h4>
                    <p>Download laporan dalam format Excel</p>
                </a>
                
                <a href="#" class="action-btn">
                    <div class="action-icon">
                        <i class="fas fa-chart-pie"></i>
                    </div>
                    <h4>Analisis Data</h4>
                    <p>Lihat statistik dan analisis</p>
                </a>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Mobile menu toggle
            const menuToggle = document.getElementById('menuToggle');
            const sidebar = document.getElementById('sidebar');
            
            menuToggle.addEventListener('click', function() {
                sidebar.classList.toggle('active');
                this.innerHTML = sidebar.classList.contains('active') 
                    ? '<i class="fas fa-times"></i>' 
                    : '<i class="fas fa-bars"></i>';
            });
            
            // Notification button
            const notificationBtn = document.querySelector('.notification-btn');
            notificationBtn.addEventListener('click', function() {
                alert('Notifikasi: 3 item memerlukan perhatian Anda');
            });
            
            // Search functionality
            const searchInput = document.querySelector('.search-box input');
            searchInput.addEventListener('keypress', function(e) {
                if (e.key === 'Enter') {
                    alert('Mencari: ' + this.value);
                }
            });
            
            // Menu item active state
            const menuItems = document.querySelectorAll('.menu-item');
            menuItems.forEach(item => {
                item.addEventListener('click', function(e) {
                    e.preventDefault();
                    menuItems.forEach(i => i.classList.remove('active'));
                    this.classList.add('active');
                    
                    // Update page title based on selected menu
                    const menuText = this.querySelector('span').textContent;
                    document.querySelector('.page-title h2').textContent = menuText;
                });
            });
            
            // Close sidebar when clicking outside on mobile
            document.addEventListener('click', function(e) {
                if (window.innerWidth <= 1024) {
                    if (!sidebar.contains(e.target) && e.target !== menuToggle) {
                        sidebar.classList.remove('active');
                        menuToggle.innerHTML = '<i class="fas fa-bars"></i>';
                    }
                }
            });
            
            // Simulate dynamic data updates
            function updateStats() {
                const stats = [
                    { id: 'total', value: 48 + Math.floor(Math.random() * 3) },
                    { id: 'active', value: 32 + Math.floor(Math.random() * 2) },
                    { id: 'pending', value: 12 + Math.floor(Math.random() * 3) }
                ];
                
                // Update stat values with animation
                document.querySelectorAll('.stat-value').forEach((stat, index) => {
                    const current = parseInt(stat.textContent);
                    const target = stats[index].value;
                    
                    if (current !== target) {
                        stat.textContent = target;
                        stat.style.transform = 'scale(1.1)';
                        setTimeout(() => {
                            stat.style.transform = 'scale(1)';
                        }, 300);
                    }
                });
            }
            
            // Update stats every 30 seconds
            setInterval(updateStats, 30000);
        });
    </script>
</body>
</html>