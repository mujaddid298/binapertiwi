<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReqSukuCadang extends Model
{
    use HasFactory;

    protected $table = 'req_suku_cadangs';

    protected $fillable = [
        'model_alat',
        'tahun_buat',
        'jumlah',
        'lokasi',
        'perhitungan_kebutuhan',
    ];
}
