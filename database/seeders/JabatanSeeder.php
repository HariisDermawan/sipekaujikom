<?php

namespace Database\Seeders;

use App\Models\Jabatan;
use Illuminate\Database\Seeder;

class JabatanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Jabatan::insert([
            [
                'nama_jabatan'      => 'Manager',
                'gapok'             => '8000000',
                'tunjangan_makan'   => '1000000',
                'created_at'        => now(),
                'updated_at'        => now()
            ],
            [
                'nama_jabatan'      => 'IT',
                'gapok'             => '6000000',
                'tunjangan_makan'   => '800000',
                'created_at'        => now(),
                'updated_at'        => now()
            ],
            [
                'nama_jabatan'      => 'Staf',
                'gapok'             => '3500000',
                'tunjangan_makan'   => '500000',
                'created_at'        => now(),
                'updated_at'        => now()
            ]
        ]);
    }
}
