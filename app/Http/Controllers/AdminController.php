<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    // Show the admin login form
    public function showLoginForm()
    {
        return view('admin.login');
    }

    // Handle admin login (no validation, just redirect)
    public function login(Request $request)
    {
        // No validation, just redirect to homepage
        return redirect()->route('admin.homepage');
    }

    // Admin homepage
    public function homepage()
    {
        return view('admin.homepage');
    }

    // Optional: Logout
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('admin.login.form');
    }
}

