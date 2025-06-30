<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\FirebaseAuthService;

class AuthController extends Controller
{
    protected $firebase;

    public function __construct(FirebaseAuthService $firebase)
    {
        $this->firebase = $firebase;
    }

    // Tampilkan form login
    public function loginForm()
    {
        return view('login');
    }

    // Tampilkan form register
    public function registerForm()
    {
        return view('register');
    }

    // Proses login
    public function login(Request $request)
    {
        $request->validate([
            'email'    => 'required|email',
            'password' => 'required'
        ]);

        try {
            $result = $this->firebase->signInWithEmailPassword(
                $request->email,
                $request->password
            );

            // Simpan token di session kalau perlu
            session(['firebase_token' => $result['idToken']]);

           return redirect()->route('admin.dashboard')->with('success', 'Berhasil login!');
        } catch (\Exception $e) {
            $errorMessage = 'Email atau password yang Anda masukkan salah. Silakan coba lagi.';
            return redirect()->back()->with('error', $errorMessage);
        }
    }

    // Proses register
    public function register(Request $request)
    {
        $request->validate([
            'email'    => 'required|email',
            'password' => 'required|min:6'
        ]);

        try {
            $result = $this->firebase->signUpWithEmailPassword(
                $request->email,
                $request->password
            );

            return redirect()->route('login.form')->with('success', 'Registrasi berhasil, silakan login.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    // Tambahan route POST register, supaya bisa dipanggil route
    public function registerPost(Request $request)
    {
        return $this->register($request);
    }

    // Tambahan route POST login, supaya bisa dipanggil route
    public function loginPost(Request $request)
    {
        return $this->login($request);
    }
}
