<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailPerusahaan extends Model
{
    use HasFactory;

    protected $fillable = [
        'customers_id',
        'bentuk_perusahaan',
        'waktu_didirikan',
        'akte_perubahan',
        'pengesahan',
        'manajemen_kehakiman',
        'domisili',
        'modal_dasar',
        'modal_disetor',
        'notaris',
        'nomer_akte',
        'umur_perusahaan',
        'struktur_organisasi',
    ];

    public function keuanganPerusahaan()
    {
        return $this->belongsTo(KeuanganPerusahaan::class);
    }
}
