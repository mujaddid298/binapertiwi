<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HubunganBank extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_lembaga',
        'deskripsi',
    ];
}
