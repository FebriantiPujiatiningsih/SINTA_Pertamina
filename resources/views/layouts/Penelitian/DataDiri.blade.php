<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SINTA - Pertamina Internship</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    
    <style>
        /* RESET & BASIC SETUP */
        * { margin: 0; padding: 0; box-sizing: border-box; font-family: 'Inter', sans-serif; }
        body { background-color: #f8f9fa; color: #333; }

        /* --- 1. HERO SECTION --- */
        .hero-section {
            position: relative;
            height: 450px;
            /* Pastikan file 'pekerja.jpg' ada di folder: project_laravel/public/img/pekerja.jpg */
            background-image: linear-gradient(rgba(0, 51, 153, 0.7), rgba(0, 0, 0, 0.5)), 
                              url('/img/pekerja.jpg');
            background-size: cover;
            background-position: center;
            display: flex;
            align-items: center;
            padding: 0 5%;
        }

        .top-nav {
            position: absolute;
            top: 30px;
            right: 5%;
            display: flex;
            align-items: center;
            gap: 25px;
            z-index: 10;
        }

        .nav-link {
            color: white;
            text-decoration: none;
            font-weight: 600;
            font-size: 1rem;
            text-shadow: 0 1px 3px rgba(0,0,0,0.5);
        }

        .join-badge {
            background-color: #0099ff;
            color: white;
            padding: 10px 20px;
            border-radius: 8px;
            font-weight: bold;
            text-decoration: none;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
            transition: background 0.3s;
        }
        .join-badge:hover { background-color: #0077cc; }

        .hero-content { max-width: 600px; color: white; }
        .hero-content h1 { font-size: 3rem; line-height: 1.2; margin-bottom: 20px; font-weight: 700; }

        /* --- 2. MAIN CONTENT & INTRO TEXT (Update Flexbox) --- */
        .container { max-width: 1200px; margin: 50px auto; padding: 0 20px; }
        
        .intro-text {
            margin-bottom: 40px;
            display: flex;               /* Mode baris */
            justify-content: space-between; /* Teks mentok kiri, Tombol mentok kanan */
            align-items: center;         /* Rata tengah vertikal */
            gap: 20px;
        }

        .text-wrapper { max-width: 65%; }

        .intro-text h2 {
            font-size: 1.8rem;
            margin-bottom: 10px;
            color: #222;
        }

        .intro-text p {
            color: #666;
            margin: 0; 
        }

        .cta-button {
            background-color: #005eb8;
            color: white;
            padding: 12px 24px;
            text-decoration: none;
            border-radius: 25px;
            font-weight: 600;
            transition: background 0.3s;
            white-space: nowrap; 
        }
        .cta-button:hover { background-color: #004494; }

        /* --- 3. LAYOUT GRID (YANG SEBELUMNYA HILANG) --- */
        .job-board-layout {
            display: grid;
            grid-template-columns: 280px 1fr; /* Sidebar 280px, sisanya Content */
            gap: 40px;
        }

        /* --- 4. SIDEBAR & FILTERS --- */
        .filters .filter-group { margin-bottom: 20px; }
        .filters label {
            font-size: 0.85rem;
            color: #888;
            margin-bottom: 8px;
            display: block;
            font-weight: 600;
        }

        .search-box { position: relative; }
        .search-box input {
            width: 100%;
            padding: 12px 40px 12px 15px;
            border: 1px solid #ddd;
            border-radius: 8px;
            outline: none;
        }
        .search-box i {
            position: absolute;
            right: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: #005eb8;
        }

        .styled-select {
            width: 100%;
            padding: 12px;
            border: 1px solid #ddd;
            border-radius: 8px;
            background-color: white;
            cursor: pointer;
            font-size: 0.95rem;
            color: #333;
            outline: none;
            appearance: none;
            background-image: url("data:image/svg+xml;charset=UTF-8,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='none' stroke='%23333' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'%3e%3cpolyline points='6 9 12 15 18 9'%3e%3c/polyline%3e%3c/svg%3e");
            background-repeat: no-repeat;
            background-position: right 15px center;
            background-size: 12px;
        }
        .styled-select option[disabled] { color: #999; }

        /* --- 5. JOB CARDS --- */
        .job-list { display: flex; flex-direction: column; gap: 15px; }
        
        .job-card {
            background-color: #e6f4ff;
            padding: 25px;
            border-radius: 12px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            transition: transform 0.2s, box-shadow 0.2s;
            cursor: pointer;
            border: 1px solid transparent;
        }
        .job-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0,0,0,0.05);
            border-color: #005eb8;
        }

        .job-info h3 { color: #005eb8; margin-bottom: 10px; font-size: 1.2rem; }
        .job-meta { display: flex; gap: 15px; font-size: 0.9rem; color: #555; flex-wrap: wrap; }
        .job-meta span { display: flex; align-items: center; gap: 6px; }

        .arrow-btn {
            background-color: #003366;
            color: white;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.2rem;
        }

        /* --- RESPONSIVE --- */
        @media (max-width: 768px) {
            .job-board-layout { grid-template-columns: 1fr; }
            .hero-content h1 { font-size: 2rem; }
            .top-nav { top: 20px; }
            .intro-text {
                flex-direction: column; 
                align-items: flex-start;
            }
            .text-wrapper { max-width: 100%; }
            .cta-button { margin-top: 20px; width: 100%; text-align: center; }
        }
    </style>
</head>
<body>

    <header class="hero-section">
        <nav class="top-nav">
            <a href="#" class="nav-link">Home</a>
            <a href="#" class="join-badge">Join Us</a>
        </nav>
        <div class="hero-content">
            <h1>Mewujudkan Kedaulatan Energi hingga Pelosok Negeri</h1>
            <p>Bergabunglah bersama kami dalam perjalanan membangun kemandirian energi nasional.</p>
        </div>
    </header>

    <div class="container">
        
        <div class="intro-text">
            <div class="text-wrapper">
                <h2>Help us shape the future of energy while advancing your career with us.</h2>
                <p>Explore and apply for opportunities that align with your skills and interests in the energy sector.</p>
            </div>
            <a href="#" class="cta-button">Apply for Opportunities &rarr;</a>
        </div>

        <div class="job-board-layout">
            
            <aside class="filters">
                <div style="display:flex; justify-content:space-between; margin-bottom:15px;">
                    <a href="#" onclick="location.reload()" style="font-size:0.9rem; text-decoration:none; color:#005eb8; cursor:pointer;">Clear filters</a>
                </div>

                <div class="filter-group">
                    <label>Can't find what you looking for?</label>
                    <div class="search-box">
                        <input type="text" placeholder="Search where you fit in here">
                        <i class="fas fa-search"></i>
                    </div>
                </div>

                <div class="filter-group">
                    <label>Filtered by Company</label>
                    <select id="companySelect" class="styled-select" onchange="handleCompanyChange()">
                        <option value="" disabled selected>-- Pilih Company --</option>
                        <option value="patra_niaga">PT Pertamina Patra Niaga</option>
                        <option value="kilang_minyak">PT Kilang Minyak Internasional</option>
                    </select>
                </div>

                <div class="filter-group">
                    <label>By Region</label>
                    <select id="regionSelect" class="styled-select">
                        <option value="" disabled selected>-- Pilih Region --</option>
                    </select>
                </div>

            </aside>

            <main class="job-list" id="jobContainer">
                </main>

        </div>
    </div>

    <script>
        // 1. DATA REGION
        const dataRegion = {
            "patra_niaga": ["Jatimbalinus", "Jawa Bagian Barat", "Jawa Bagian Tengah", "Kalimantan", "Maluku Papua", "Sumbagut"],
            "kilang_minyak": ["Refinery Unit IV Balongan"]
        };

        // 2. DATA CARD
        const kilangMinyakJobs = [
            { title: "Akuntansi / Ekonomi & Bisnis", region: "RU IV Balongan", type: "Research/Intern" },
            { title: "Elektro (Arus Kuat)", region: "RU IV Balongan", type: "Research/Intern" },
            { title: "Elektro (Arus Lemah)", region: "RU IV Balongan", type: "Research/Intern" },
            { title: "Emergency & Insurance", region: "RU IV Balongan", type: "Research/Intern" },
            { title: "Health", region: "RU IV Balongan", type: "Research/Intern" },
            { title: "Hukum", region: "RU IV Balongan", type: "Research/Intern" }
        ];

        const defaultJobs = [
            { title: "Pilih Company Terlebih Dahulu", region: "-", type: "Info" }
        ];

        // FUNCTION MAIN HANDLER
        function handleCompanyChange() {
            const companySelect = document.getElementById("companySelect");
            const selectedCompany = companySelect.value;
            
            updateRegions(selectedCompany);
            updateCards(selectedCompany);
        }

        // FUNCTION UPDATE REGION
        function updateRegions(company) {
            const regionSelect = document.getElementById("regionSelect");
            regionSelect.innerHTML = ''; 

            if (company && dataRegion[company]) {
                dataRegion[company].forEach(function(regionName) {
                    const option = document.createElement("option");
                    option.value = regionName;
                    option.text = regionName;
                    regionSelect.appendChild(option);
                });
            } else {
                regionSelect.innerHTML = '<option value="" disabled selected>-- Pilih Region --</option>';
            }
        }

        // FUNCTION UPDATE CARDS
        function updateCards(company) {
            const container = document.getElementById("jobContainer");
            container.innerHTML = ""; 

            let dataToShow = [];

            if (company === "kilang_minyak") {
                dataToShow = kilangMinyakJobs;
            } else if (company === "patra_niaga") {
                 dataToShow = [
                    { title: "Contoh Lowongan Patra Niaga 1", region: "Jawa Bagian Barat", type: "Full-time" },
                    { title: "Contoh Lowongan Patra Niaga 2", region: "Jatimbalinus", type: "Internship" }
                 ];
            }
            else {
                dataToShow = defaultJobs;
            }

            dataToShow.forEach(job => {
                let companyName = '-';
                if(company === 'kilang_minyak') companyName = 'PT Kilang Pertamina Internasional (KPI)';
                else if(company === 'patra_niaga') companyName = 'PT Pertamina Patra Niaga (C&T)';

                const cardHTML = `
                <div class="job-card">
                    <div class="job-info">
                        <h3>${job.title}</h3>
                        <div class="job-meta">
                            <span><i class="fas fa-map-marker-alt"></i> ${job.region}</span>
                            <span><i class="fas fa-building"></i> ${companyName}</span>
                            <span><i class="fas fa-briefcase"></i> ${job.type}</span>
                        </div>
                    </div>
                    ${job.type !== 'Info' ? '<div class="arrow-btn"><i class="fas fa-arrow-right"></i></div>' : ''}
                </div>
                `;
                container.innerHTML += cardHTML;
            });
        }

        window.onload = function() {
            updateCards(""); 
        };
    </script>

</body>
</html>