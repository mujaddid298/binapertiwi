<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Fasilitas extends Model
{
    protected $table = 'fasilitas';
    
    protected $fillable = [
        'kapital_perusahaan_id',
        'fasilitas',
        'jumlah',
        'keterangan'
    ];
}
