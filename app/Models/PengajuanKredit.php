<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PengajuanKredit extends Model
{
    protected $table = 'pengajuan_kredit';

    protected $fillable = [
        'nilai_kredit',
        'term_of_payment',
        'bunga',
        'jaminan',
        'nak_id'
    ];

    protected $casts = [

    ];
} 