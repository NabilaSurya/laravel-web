<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TableController;
use App\Http\Controllers\WargaController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\KategoriAsetController;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/profile', function () {
    return 'Ini adalah halaman pofil pengguna.';
})->name('profile.show');
Route::get('/nama/{param1?}', function ($param1 = '') {
    return 'Nama saya: ' . $param1;
});
Route::get('/mahasiswa/{param1}', [MahasiswaController::class, 'show']);
Route::get('/profil', function () {
    return view('halaman-profile');
});
Route::get('/pengguna', function () {
    return 'Ini adalah halaman website pengguna';
})->name('pengguna.show');
Route::get('/nim/{param1?}', function ($param1 = '') {
    return 'NIM saya: ' . $param1;
});

Route::get('/login', [AuthController::class, 'index'])->name('login.index');

Route::post('/login', [AuthController::class, 'login']);

Route::get('/inventaris', function () {
    return view('inventaris.index');
});
// Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::resource('kategori_aset', KategoriAsetController::class);

Route::resource('user', UserController::class);

Route::resource('warga', WargaController::class);

Route::get('/about', function () {
    return view('guest/about.about');
})->name('about');
