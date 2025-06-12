<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Persetujuan extends Model
{
    use HasFactory;

    protected $table = 'persetujuan_nak';
    protected $fillable = [
        'open_block_id',
        'user_id',
        'status',
        'komentar',
        'level',
    ];
    // Relasi ke tabel user (komite)
    public function user()
    {
        return $this->belongsTo(User::class, 'komite_id');
    }
}