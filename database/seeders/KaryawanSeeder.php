<?php

namespace Database\Seeders;

use App\Models\Jabatan;
use App\Models\Karyawan;
use Illuminate\Database\Seeder;

class KaryawanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $manager = Jabatan::where('nama_jabatan', 'Manager')->first()->id_jabatan;
        $it      = Jabatan::where('nama_jabatan', 'IT')->first()->id_jabatan;
        $staf    = Jabatan::where('nama_jabatan', 'Staf')->first()->id_jabatan;

        Karyawan::insert([
            [
                'nik'            => 'K001',
                'nama_karyawan'  => 'Darmawan',
                'id_jabatan'     => $manager,
                'tgl_masuk'      => '2026-05-06',
                'created_at'     => now(),
                'updated_at'     => now()
            ],
            [
                'nik'            => 'K002',
                'nama_karyawan'  => 'Haris',
                'id_jabatan'     => $it,
                'tgl_masuk'      => '2026-03-01',
                'created_at'     => now(),
                'updated_at'     => now()
            ],
            [
                'nik'            => 'K003',
                'nama_karyawan'  => 'Pratiwi',
                'id_jabatan'     => $staf,
                'tgl_masuk'      => '2026-05-06',
                'created_at'     => now(),
                'updated_at'     => now()
            ],
        ]);
    }
}
