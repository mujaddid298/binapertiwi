<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AnalisaKc extends Model
{
    protected $fillable = [
        'user_id',
        'jabatan',
        'komentar'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
