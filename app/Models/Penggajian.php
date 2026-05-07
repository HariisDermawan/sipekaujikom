<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Penggajian extends Model
{
    protected $table = 'penggajians';
    protected $primaryKey = 'id_penggajian';

    protected $fillable = [
        'bulan_tahun',
        'potongan_pinjaman',
        'gaji_bersih',
        'id_karyawan'
    ];

    public function karyawan(): BelongsTo
    {
        return $this->belongsTo(Karyawan::class, 'id_karyawan', 'id_karyawan');
    }
}
