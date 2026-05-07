<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Pinjaman extends Model
{
    protected $table = 'pinjamans';
    protected $primaryKey = 'id_pinjaman';

    protected $fillable = [
        'id_karyawan',
        'tenor',
        'cicilan_per_bulan',
        'jumlah_pinjaman',
        'status'
    ];

    public function karyawan(): BelongsTo
    {
        return $this->belongsTo(Karyawan::class, 'id_karyawan', 'id_karyawan');
    }

    
}
