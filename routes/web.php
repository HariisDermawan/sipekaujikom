<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\JabatanController;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\PenggajianController;
use App\Http\Controllers\PinjamanController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
    Route::resource('/karyawan', KaryawanController::class);
    Route::resource('/jabatan', JabatanController::class);
    Route::resource('/penggajian', PenggajianController::class);
    Route::resource('/pinjaman', PinjamanController::class);
    Route::put('/pinjaman/{id}/lunas', [PinjamanController::class, 'lunas'])->name('pinjaman.lunas');
    Route::get('/slip-gaji', [PenggajianController::class, 'slip'])->name('slip.index');
    Route::get('/slip-gaji/{id}', [PenggajianController::class, 'showSlip'])->name('slip.show');
    Route::get('/laporan-bulanan', [PenggajianController::class, 'laporan'])->name('laporan.index');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
