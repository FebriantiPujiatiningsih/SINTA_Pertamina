<?php
session_start();

// In a real Laravel application, this would be a Controller method
// For now, we'll simulate the login process

// Sample credentials (in real app, this would be from database)
$valid_username = 'admin';
$valid_password = 'password123';

// CSRF token validation
if (!isset($_POST['csrf_token']) || $_POST['csrf_token'] !== $_SESSION['csrf_token']) {
    $_SESSION['error'] = 'Token keamanan tidak valid. Silakan coba lagi.';
    header('Location: login.blade.php');
    exit();
}

// Get form data
$username = $_POST['username'] ?? '';
$password = $_POST['password'] ?? '';
$remember = isset($_POST['remember']);

// Validate input
if (empty($username) || empty($password)) {
    $_SESSION['error'] = 'Username dan password harus diisi!';
    header('Location: login.blade.php');
    exit();
}

// Check credentials
if ($username === $valid_username && $password === $valid_password) {
    // Set session variables
    $_SESSION['logged_in'] = true;
    $_SESSION['user_name'] = 'Administrator';
    $_SESSION['user_role'] = 'admin';
    
    // If remember me is checked, set cookie (30 days)
    if ($remember) {
        setcookie('remember_token', bin2hex(random_bytes(32)), time() + (30 * 24 * 60 * 60), '/');
    }
    
    // Regenerate session ID for security
    session_regenerate_id(true);
    
    // Clear old form data
    unset($_SESSION['old_username']);
    unset($_SESSION['remember_me']);
    
    // Redirect to dashboard
    header('Location: dashboard.blade.php');
    exit();
} else {
    $_SESSION['error'] = 'Username atau password salah!';
    $_SESSION['old_username'] = $username;
    $_SESSION['remember_me'] = $remember;
    header('Location: login.blade.php');
    exit();
}
?>