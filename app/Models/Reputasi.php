<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reputasi extends Model
{
    use HasFactory;

    protected $fillable = [
        'sumber_informasi',
        'hubungan',
        'hasil_pengecekan',
    ];
}
