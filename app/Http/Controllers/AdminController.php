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

    // Handle admin login
    public function login(Request $request)
    {
        // BYPASS: Allow login without validating credentials
        // You can set a default admin user ID to log in as
        // For example, assuming your admin user has ID = 1

        Auth::loginUsingId(1); // Bypass authentication, logs in user with ID 1
        $request->session()->regenerate();
        return redirect()->intended('/admin/dashboard');

        // --- Original code below (commented out) ---
        /*
        $credentials = $request->validate([
            'email'    => ['required', 'email'],
            'password' => ['required'],
        ]);

        // Attempt to log in as admin (assuming 'is_admin' column exists)
        if (Auth::attempt(array_merge($credentials, ['is_admin' => 1]), $request->filled('remember'))) {
            $request->session()->regenerate();
            return redirect()->intended('/admin/dashboard');
        }

        return back()->with('error', 'Invalid credentials or not an admin.');
        */
    }

    // Optional: Admin dashboard (dummy)
    public function dashboard()
    {
        return view('admin.dashboard');
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

