<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $credentials = [
            'email' => 'admin@gmail.com',
            'password' => 'admin123'
        ];
        
        // Validasi input
        $request->validate([
            'username' => 'required|email',
            'password' => 'required|min:6'
        ]);
        
        // Cek credentials
        if ($request->username === $credentials['email'] && 
            $request->password === $credentials['password']) {
            
            // Set session
            Session::put('logged_in', true);
            Session::put('nama', 'Administrator SINTA');
            Session::put('email', $credentials['email']);
            Session::put('role', 'Super Admin');
            
            return redirect()->route('dashboard');
        }
        
        return back()->withErrors([
            'error' => 'Username atau password salah!'
        ])->withInput($request->only('username'));
    }
    
    public function logout()
    {
        Session::flush();
        return redirect()->route('login');
    }
}