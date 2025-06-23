<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


use App\Http\Controllers\AuthController;

Route::get('/register', [AuthController::class, 'registerForm'])->name('register.form');
Route::post('/register', [AuthController::class, 'registerPost'])->name('register.post');

Route::get('/login', [AuthController::class, 'loginForm'])->name('login.form');
Route::post('/login', [AuthController::class, 'loginPost'])->name('login.post');

use App\Http\Controllers\AdminController;

Route::middleware([])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::get('/admin/status-das', [AdminController::class, 'statusDAS'])->name('admin.statusDAS');
    Route::get('/admin/evakuasi', [AdminController::class, 'evakuasi'])->name('admin.evakuasi');
    Route::get('/admin/users', [AdminController::class, 'users'])->name('admin.users');
    Route::get('/logout', [AdminController::class, 'logout'])->name('admin.logout');
});

Route::post('/login', [AuthController::class, 'loginPost'])->name('login.post');

use App\Http\Controllers\EvakuasiController;

Route::get('/request-evakuasi', [EvakuasiController::class, 'form'])->name('request.evakuasi.form');
Route::post('/request-evakuasi', [EvakuasiController::class, 'submit'])->name('request.evakuasi.submit');
Route::get('/admin/evakuasi', [EvakuasiController::class, 'adminEvakuasi'])->name('admin.evakuasi');

use App\Http\Controllers\PublicController;

Route::get('/status-banjir', [PublicController::class, 'statusBanjir'])->name('status.banjir');

Route::get('/status-peta', function () {
    return view('status-peta');
});


