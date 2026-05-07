<?php

namespace Database\Seeders;

use App\Models\Karyawan;
use App\Models\Pinjaman;
use Illuminate\Database\Seeder;

class PinjamanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $haris   = Karyawan::where('nik', 'K002')->first()->id_karyawan;
        $pratiwi = Karyawan::where('nik', 'K003')->first()->id_karyawan;

        Pinjaman::insert([
            [
                'id_karyawan' => $haris,
                'jumlah_pinjaman' => 3000000,
                'tenor' => 6,
                'cicilan_per_bulan' => 500000,
                'status' => 'Aktif',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id_karyawan' => $pratiwi,
                'jumlah_pinjaman' => 2000000,
                'tenor' => 4,
                'cicilan_per_bulan' => 500000,
                'status' => 'Aktif',
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);
    }
}
