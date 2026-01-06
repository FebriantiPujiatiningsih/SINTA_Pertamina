<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    public function loginForm()
    {
        return view('admin.login');
    }

    public function login(Request $request)
    {
        $username = $request->username;
        $password = $request->password;

        if ($username === 'admin' && $password === 'admin123') {
            Session::put('admin', $username);
            return redirect()->route('admin.dashboard');
        }

        return redirect()->route('login.form')->with('error', 'Username atau Password salah!');
    }

    public function dashboard()
    {
        if (!Session::has('admin')) {
            return redirect()->route('login.form');
        }

        return view('admin.dashboard');
    }

    public function logout()
    {
        Session::forget('admin');
        return redirect()->route('login.form');
    }
}
