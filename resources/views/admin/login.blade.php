<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin | SINTA Pertamina</title>
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
        }
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', 'Arial', sans-serif;
        }
        
        body {
            background: linear-gradient(135deg, #f8fbff 0%, #eef5ff 100%);
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            padding: 20px;
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
                radial-gradient(circle at 15% 50%, rgba(0, 94, 184, 0.03) 0%, transparent 20%),
                radial-gradient(circle at 85% 30%, rgba(0, 168, 89, 0.03) 0%, transparent 20%),
                radial-gradient(circle at 50% 80%, rgba(227, 6, 19, 0.02) 0%, transparent 20%);
            z-index: -1;
        }
        
        .container {
            display: flex;
            flex-direction: column;
            align-items: center;
            width: 100%;
            max-width: 460px;
            animation: fadeIn 0.8s ease-out;
        }
        
        .logo-container {
            width: 100%;
            display: flex;
            justify-content: center;
            margin-bottom: 25px;
            padding: 25px;
            background: white;
            border-radius: 16px;
            box-shadow: 0 8px 25px var(--shadow-light);
            transition: transform 0.3s ease;
        }
        
        .logo-container:hover {
            transform: translateY(-3px);
        }
        
        .logo-combined {
            display: flex;
            flex-direction: column;
            align-items: center;
            text-align: center;
        }
        
        .logo-image-container {
            margin-bottom: 15px;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 80px;
        }
        
        .logo-sinta {
            max-height: 80px;
            width: auto;
            object-fit: contain;
        }
        
        .logo-text {
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        
        .logo-text h1 {
            color: var(--pertamina-blue);
            font-size: 28px;
            font-weight: 800;
            letter-spacing: 0.5px;
            line-height: 1.1;
            margin-bottom: 5px;
        }
        
        .logo-text .subtitle {
            color: var(--pertamina-green);
            font-size: 14px;
            font-weight: 600;
            margin-bottom: 10px;
            letter-spacing: 1px;
        }
        
        .pertamina-badge {
            margin-top: 5px;
            padding: 8px 25px;
            background: linear-gradient(to right, var(--pertamina-blue), var(--pertamina-green));
            border-radius: 30px;
            color: white;
            font-weight: 700;
            font-size: 16px;
            letter-spacing: 1px;
            box-shadow: 0 4px 12px rgba(0, 94, 184, 0.2);
        }
        
        .login-box {
            width: 100%;
            padding: 40px 35px;
            background: white;
            border-radius: 20px;
            box-shadow: 0 12px 35px var(--shadow-medium);
            border: 1px solid rgba(0, 94, 184, 0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            position: relative;
            overflow: hidden;
        }
        
        .login-box::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 5px;
            background: linear-gradient(90deg, var(--pertamina-blue), var(--pertamina-green), var(--pertamina-red));
        }
        
        .login-box::after {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: radial-gradient(circle at top right, rgba(0, 168, 89, 0.03), transparent 60%),
                      radial-gradient(circle at bottom left, rgba(0, 94, 184, 0.03), transparent 60%);
            z-index: 0;
        }
        
        .login-box:hover {
            transform: translateY(-5px);
            box-shadow: 0 18px 45px var(--shadow-medium);
        }
        
        .header {
            text-align: center;
            margin-bottom: 30px;
            position: relative;
            z-index: 1;
        }
        
        h2 {
            color: var(--pertamina-blue);
            margin-bottom: 8px;
            font-weight: 700;
            font-size: 24px;
            letter-spacing: 0.3px;
        }
        
        .login-subtitle {
            color: var(--text-light);
            font-size: 15px;
            line-height: 1.5;
        }
        
        .input-group {
            margin-bottom: 25px;
            position: relative;
            z-index: 1;
        }
        
        .input-group label {
            display: block;
            margin-bottom: 10px;
            color: var(--text-dark);
            font-weight: 600;
            font-size: 14px;
            transition: color 0.3s;
        }
        
        .input-group input {
            width: 100%;
            padding: 16px 20px;
            padding-left: 50px;
            border-radius: 10px;
            border: 2px solid var(--border-color);
            font-size: 16px;
            transition: all 0.3s;
            background-color: #f9fbfd;
            color: var(--text-dark);
        }
        
        .input-group input:focus {
            outline: none;
            border-color: var(--pertamina-green);
            box-shadow: 0 0 0 4px rgba(0, 168, 89, 0.15);
            background-color: white;
        }
        
        .input-group i {
            position: absolute;
            left: 18px;
            top: 47px;
            color: var(--pertamina-blue);
            font-size: 20px;
            transition: color 0.3s;
        }
        
        .input-group input:focus + i {
            color: var(--pertamina-green);
        }
        
        .show-password {
            position: absolute;
            right: 18px;
            top: 47px;
            color: var(--text-light);
            cursor: pointer;
            font-size: 20px;
            transition: color 0.2s;
        }
        
        .show-password:hover {
            color: var(--pertamina-blue);
        }
        
        .remember-forgot {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
            font-size: 14px;
            position: relative;
            z-index: 1;
        }
        
        .remember {
            display: flex;
            align-items: center;
        }
        
        .remember input {
            margin-right: 10px;
            cursor: pointer;
            width: 18px;
            height: 18px;
            accent-color: var(--pertamina-blue);
        }
        
        .forgot-link {
            color: var(--pertamina-blue);
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s;
            padding: 5px 10px;
            border-radius: 6px;
        }
        
        .forgot-link:hover {
            color: var(--pertamina-dark);
            background-color: rgba(0, 94, 184, 0.05);
            text-decoration: none;
        }
        
        button {
            width: 100%;
            padding: 17px;
            background: linear-gradient(to right, var(--pertamina-blue), var(--pertamina-dark));
            color: white;
            border: none;
            border-radius: 10px;
            font-weight: 700;
            font-size: 16px;
            cursor: pointer;
            transition: all 0.3s;
            display: flex;
            justify-content: center;
            align-items: center;
            letter-spacing: 0.5px;
            position: relative;
            z-index: 1;
            overflow: hidden;
        }
        
        button::before {
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
        
        button:hover::before {
            left: 0;
        }
        
        button:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 20px rgba(0, 94, 184, 0.25);
        }
        
        button:active {
            transform: translateY(0);
        }
        
        button i {
            margin-right: 12px;
            font-size: 18px;
        }
        
        .error {
            color: var(--pertamina-red);
            text-align: center;
            margin-bottom: 20px;
            padding: 15px;
            background-color: rgba(227, 6, 19, 0.05);
            border-radius: 10px;
            border-left: 5px solid var(--pertamina-red);
            animation: shake 0.5s ease-in-out;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            z-index: 1;
        }
        
        .error i {
            margin-right: 10px;
            font-size: 18px;
        }
        
        .success {
            color: var(--pertamina-green);
            text-align: center;
            margin-bottom: 20px;
            padding: 15px;
            background-color: rgba(0, 168, 89, 0.05);
            border-radius: 10px;
            border-left: 5px solid var(--pertamina-green);
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            z-index: 1;
        }
        
        .success i {
            margin-right: 10px;
            font-size: 18px;
        }
        
        .brand {
            text-align: center;
            font-size: 14px;
            margin-top: 25px;
            color: var(--text-light);
            padding-top: 20px;
            border-top: 1px solid rgba(0, 94, 184, 0.1);
            position: relative;
            z-index: 1;
        }
        
        .brand strong {
            color: var(--pertamina-blue);
            font-weight: 700;
        }
        
        /* Fallback styling jika logo tidak ditemukan */
        .logo-fallback {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 200px;
            height: 80px;
            background: linear-gradient(135deg, var(--pertamina-blue), var(--pertamina-dark));
            border-radius: 10px;
            color: white;
            font-size: 24px;
            font-weight: 700;
            letter-spacing: 1px;
        }
        
        /* Animations */
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(30px); }
            to { opacity: 1; transform: translateY(0); }
        }
        
        @keyframes shake {
            0%, 100% { transform: translateX(0); }
            10%, 30%, 50%, 70%, 90% { transform: translateX(-5px); }
            20%, 40%, 60%, 80% { transform: translateX(5px); }
        }
        
        .pulse {
            animation: pulse 2s infinite;
        }
        
        @keyframes pulse {
            0% { box-shadow: 0 0 0 0 rgba(0, 168, 89, 0.3); }
            70% { box-shadow: 0 0 0 10px rgba(0, 168, 89, 0); }
            100% { box-shadow: 0 0 0 0 rgba(0, 168, 89, 0); }
        }
        
        /* Responsive */
        @media (max-width: 500px) {
            .login-box {
                padding: 30px 25px;
            }
            
            .container {
                max-width: 100%;
            }
            
            .logo-sinta {
                max-height: 60px;
            }
            
            .logo-text h1 {
                font-size: 24px;
            }
            
            .pertamina-badge {
                font-size: 14px;
                padding: 6px 16px;
            }
            
            .remember-forgot {
                flex-direction: column;
                align-items: flex-start;
            }
            
            .forgot-link {
                margin-top: 15px;
            }
            
            .input-group input {
                padding: 14px 16px;
                padding-left: 45px;
            }
            
            .input-group i, .show-password {
                top: 42px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Logo SINTA Pertamina -->
        <div class="logo-container">
            <div class="logo-combined">
                <div class="logo-image-container">
                    <?php
                    // Cek apakah file logo ada di beberapa lokasi yang mungkin
                    $logoPaths = [
                        'public/img/logo-sinta.png',
                        'img/logo-sinta.png',
                        '../public/img/logo-sinta.png',
                        './img/logo-sinta.png',
                        'logo-sinta.png'
                    ];
                    
                    $logoFound = false;
                    foreach ($logoPaths as $path) {
                        if (file_exists($path)) {
                            $logoFound = true;
                            echo '<img src="' . $path . '" alt="Logo SINTA Pertamina" class="logo-sinta">';
                            break;
                        }
                    }
                    
                    if (!$logoFound) {
                        echo '<div class="logo-fallback">SINTA</div>';
                    }
                    ?>
                </div>
            </div>
        </div>
        
        <!-- Login Box -->
        <div class="login-box">
            <div class="header">
                <h2>Login Admin</h2>
                <div class="login-subtitle">Akses sistem dengan kredensial Anda yang terdaftar</div>
            </div>
            
            <!-- Error Message -->
            <?php if(isset($_SESSION['error'])): ?>
            <div class="error">
                <i class="fas fa-exclamation-circle"></i> <?php echo htmlspecialchars($_SESSION['error']); ?>
            </div>
            <?php unset($_SESSION['error']); ?>
            <?php endif; ?>
            
            <!-- Success Message -->
            <?php if(isset($_SESSION['success'])): ?>
            <div class="success">
                <i class="fas fa-check-circle"></i> <?php echo htmlspecialchars($_SESSION['success']); ?>
            </div>
            <?php unset($_SESSION['success']); ?>
            <?php endif; ?>
            
            <form id="loginForm" method="POST" action="login_process.php">
                <input type="hidden" name="csrf_token" value="<?php echo isset($_SESSION['csrf_token']) ? $_SESSION['csrf_token'] : ''; ?>">
                
                <div class="input-group">
                    <label for="username">Username</label>
                    <input type="text" id="username" name="username" placeholder="Masukkan username" required 
                           value="<?php echo isset($_SESSION['old_username']) ? htmlspecialchars($_SESSION['old_username']) : ''; ?>">
                    <i class="fas fa-user"></i>
                </div>
                
                <div class="input-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" placeholder="Masukkan password" required>
                    <i class="fas fa-lock"></i>
                    <span class="show-password" id="togglePassword">
                        <i class="fas fa-eye"></i>
                    </span>
                </div>
                
                <div class="remember-forgot">
                    <div class="remember">
                        <input type="checkbox" id="remember" name="remember" <?php echo isset($_SESSION['remember_me']) ? 'checked' : ''; ?>>
                        <label for="remember">Ingat Saya</label>
                    </div>
                    <a href="forgot_password.php" class="forgot-link">Lupa Password?</a>
                </div>
                
                <button type="submit" id="loginButton">
                    <i class="fas fa-sign-in-alt"></i> Login ke Sistem
                </button>
            </form>
            
            <div class="brand">
                <strong>SINTA</strong> - Student Internship in Pertamina | © <?php echo date('Y'); ?>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Toggle password visibility
            const togglePassword = document.getElementById('togglePassword');
            const passwordInput = document.getElementById('password');
            
            togglePassword.addEventListener('click', function() {
                const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
                passwordInput.setAttribute('type', type);
                this.innerHTML = type === 'password' ? '<i class="fas fa-eye"></i>' : '<i class="fas fa-eye-slash"></i>';
            });
            
            // Form validation
            const loginForm = document.getElementById('loginForm');
            const loginButton = document.getElementById('loginButton');
            
            loginForm.addEventListener('submit', function(e) {
                const username = document.getElementById('username').value.trim();
                const password = document.getElementById('password').value.trim();
                
                // Basic validation
                if (!username || !password) {
                    e.preventDefault();
                    showError("Username dan password harus diisi!");
                    return;
                }
                
                if (username.length < 3) {
                    e.preventDefault();
                    showError("Username harus memiliki minimal 3 karakter!");
                    return;
                }
                
                if (password.length < 6) {
                    e.preventDefault();
                    showError("Password harus memiliki minimal 6 karakter!");
                    return;
                }
                
                // Show loading state
                const originalText = loginButton.innerHTML;
                loginButton.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Memproses Login...';
                loginButton.disabled = true;
            });
            
            function showError(message) {
                // Create error message element if it doesn't exist
                let errorDiv = document.querySelector('.error');
                if (!errorDiv) {
                    errorDiv = document.createElement('div');
                    errorDiv.className = 'error';
                    errorDiv.innerHTML = '<i class="fas fa-exclamation-circle"></i> <span></span>';
                    const form = document.querySelector('form');
                    form.parentNode.insertBefore(errorDiv, form);
                }
                
                errorDiv.querySelector('span').textContent = message;
                errorDiv.style.display = 'flex';
                
                // Add pulse animation to the login box
                document.querySelector('.login-box').classList.add('pulse');
                setTimeout(() => {
                    document.querySelector('.login-box').classList.remove('pulse');
                }, 2000);
            }
            
            // Input focus effects
            const inputs = document.querySelectorAll('input');
            inputs.forEach(input => {
                input.addEventListener('focus', function() {
                    this.parentElement.querySelector('label').style.color = 'var(--pertamina-green)';
                });
                
                input.addEventListener('blur', function() {
                    this.parentElement.querySelector('label').style.color = '';
                });
            });
            
            // Add subtle animation to logo on load
            setTimeout(() => {
                document.querySelector('.logo-container').style.transform = 'translateY(0)';
            }, 300);
        });
    </script>
    
    <?php
    // Set CSRF token jika belum ada
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
    
    if (!isset($_SESSION['csrf_token'])) {
        $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
    }
    
    // Simpan input sebelumnya jika ada
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $_SESSION['old_username'] = $_POST['username'] ?? '';
        $_SESSION['remember_me'] = isset($_POST['remember']) ? true : false;
    }
    ?>
</body>
</html>