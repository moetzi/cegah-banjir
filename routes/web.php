<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EvakuasiController;
use App\Http\Controllers\AdminController;

Route::get('/request-evakuasi', [EvakuasiController::class, 'index']);
Route::post('/request-evakuasi', [EvakuasiController::class, 'store'])->name('evakuasi.store');
Route::get('/admin/login', [AdminController::class, 'showLoginForm'])->name('admin.login.form');
Route::post('/admin/login', [AdminController::class, 'login'])->name('admin.login.submit');
Route::get('/admin/homepage', [AdminController::class, 'homepage'])->name('admin.homepage');

Route::get('/', function () {
    return view('welcome');
});
