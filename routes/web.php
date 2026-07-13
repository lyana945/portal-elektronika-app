<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AplikasiController;

// Gerbang Autentikasi Login
Route::get('/login', [AplikasiController::class, 'showLogin'])->name('login');
Route::post('/login', [AplikasiController::class, 'login']);
Route::post('/logout', [AplikasiController::class, 'logout'])->name('logout');

// Proteksi Halaman: Pengunjung Wajib Login
Route::middleware(['auth'])->group(function () {
    Route::get('/', [AplikasiController::class, 'index'])->name('dashboard');
    
    // Fitur Tambah Alat
    Route::get('/alat/tambah', [AplikasiController::class, 'createAlat']);
    Route::post('/alat/simpan', [AplikasiController::class, 'storeAlat']);
    
    // Fitur Tambahan UAS: Edit & Hapus Data
    Route::get('/alat/edit/{id}', [AplikasiController::class, 'editAlat']);
    Route::post('/alat/update/{id}', [AplikasiController::class, 'updateAlat']);
    Route::post('/alat/hapus/{id}', [AplikasiController::class, 'destroyAlat']);
});