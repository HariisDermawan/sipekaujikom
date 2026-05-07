<?php

namespace Database\Seeders;

use App\Models\Karyawan;
use App\Models\Penggajian;
use Illuminate\Database\Seeder;

class PenggajianSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $darmawan = Karyawan::where('nik', 'K001')->first()->id_karyawan;
        $haris    = Karyawan::where('nik', 'K002')->first()->id_karyawan;
        $pratiwi  = Karyawan::where('nik', 'K003')->first()->id_karyawan;

        Penggajian::insert([
            [
                'id_karyawan' => $darmawan,
                'bulan_tahun' => 'Mei 2026',
                'potongan_pinjaman' => 0,
                'gaji_bersih' => 9000000,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id_karyawan' => $haris,
                'bulan_tahun' => 'Mei 2026',
                'potongan_pinjaman' => 0,
                'gaji_bersih' => 6800000,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id_karyawan' => $pratiwi,
                'bulan_tahun' => 'Mei 2026',
                'potongan_pinjaman' => 0,
                'gaji_bersih' => 4000000,
                'created_at' => now(),
                'updated_at' => now()
            ],
        ]);
    }
}
