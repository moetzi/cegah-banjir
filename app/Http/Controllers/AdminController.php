<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.dashboard');
    }

    public function statusDAS()
    {
        return view('admin.status-das');
    }

    public function evakuasi()
    {
        return view('admin.evakuasi');
    }

    public function users()
    {
        return view('admin.users');
    }

    public function logout()
    {
        Session::flush();
        return redirect('/login')->with('success', 'Berhasil logout!');
    }
}
