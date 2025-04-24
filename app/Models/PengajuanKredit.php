<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PengajuanKredit extends Model
{
    protected $table = 'pengajuan_kredit';

    protected $fillable = [
        'nilai_kredit',
        'jangka_pembayaran',
        'bunga',
        'jaminan'
    ];

    protected $casts = [

    ];
} 