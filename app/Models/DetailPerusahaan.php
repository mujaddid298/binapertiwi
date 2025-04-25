<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailPerusahaan extends Model
{
    use HasFactory;

    protected $fillable = [
        'keuangan_perusahaan_id',
        'bentuk_perusahaan',
        'waktu_didirikan',
        'akte_perubahan',
        'pengesahan',
        'manajemen_kehakiman',
        'domisili',
        'notaris',
        'umur_perusahaan',
        'struktur_organisasi',
    ];

    public function keuanganPerusahaan()
    {
        return $this->belongsTo(KeuanganPerusahaan::class);
    }
}
