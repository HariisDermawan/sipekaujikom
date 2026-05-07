<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Karyawan extends Model
{
    protected $table = 'karyawans';
    protected $primaryKey = 'id_karyawan';

    protected $fillable = [
        'nik',
        'nama_karyawan',
        'tgl_masuk',
        'id_jabatan'
    ];
    public function jabatan(): BelongsTo
    {
        return $this->belongsTo(Jabatan::class, 'id_jabatan', 'id_jabatan');
    }

    public function pinjaman(): HasMany
    {
        return $this->hasMany(Pinjaman::class, 'id_karyawan', 'id_karyawan');
    }

    public function penggajian(): HasMany
    {
        return $this->hasMany(Penggajian::class, 'id_karyawan', 'id_karyawan');
    }

    
}
