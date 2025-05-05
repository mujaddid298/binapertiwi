<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable = [
        'nama',
        'alamat',
        'industry',
        'bidang_usaha',
        'group_perusahaan',
        'penanggung_jawab',
        'kapital_perusahaan_id',
        'kapasitas_perusahaan_id',
        'nak_id',
    ];
}
