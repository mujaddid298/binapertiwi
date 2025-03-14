<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Persetujuan extends Model
{
    use HasFactory;

    protected $table = 'persetujuan_nak';
    protected $fillable = [
        'nak_id',
        'komite_id',
        'status',
        'komen',
        'tanggal_persetujuan',
    ];
    // Relasi ke tabel user (komite)
    public function komite()
    {
        return $this->belongsTo(User::class, 'komite_id');
    }
}