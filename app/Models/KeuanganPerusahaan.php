<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KeuanganPerusahaan extends Model
{
    use HasFactory;

    protected $table = 'keuangan_perusahaans';

    protected $fillable = [ 
        'nama',
        'jabatan',
        'saham',
        'nilai_saham',
        'detail_perusahaan_id',
    ];
}
