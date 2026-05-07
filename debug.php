<?php

require_once 'vendor/autoload.php';

$app = require_once 'bootstrap/app.php';

$app->make(Illuminate\Contracts\Console\Kernel::class)->bootstrap();

use App\Models\Pinjaman;
use App\Models\Karyawan;

echo "Checking pinjaman data:\n";
$pinjamans = Pinjaman::with('karyawan')->get();

foreach ($pinjamans as $p) {
    echo "ID: {$p->id_pinjaman}, Karyawan: {$p->karyawan->nama_karyawan}, Cicilan: {$p->cicilan_per_bulan}, Status: {$p->status}\n";
}

echo "\nChecking karyawan Darmawan:\n";
$karyawan = Karyawan::where('nama_karyawan', 'Darmawan')->with('pinjaman')->first();

if ($karyawan) {
    echo "Karyawan: {$karyawan->nama_karyawan}\n";
    echo "Pinjaman count: " . $karyawan->pinjaman->count() . "\n";
    echo "Total cicilan aktif: " . $karyawan->pinjaman()->where('status', 'Aktif')->sum('cicilan_per_bulan') . "\n";
} else {
    echo "Karyawan Darmawan tidak ditemukan\n";
}
