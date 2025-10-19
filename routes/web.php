<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KategoriAsetController;
use App\Http\Controllers\MahasiswaController;


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

Route::get('/guest-login', [AuthController::class, 'index']);

Route::post('/guest-login/process', [AuthController::class, 'login']);

Route::get('/inventaris', function () {
    return view('inventaris.index');
});
Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::resource('kategori_aset', KategoriAsetController::class);
