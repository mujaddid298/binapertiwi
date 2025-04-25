<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pengesahan extends Model
{
    protected $table = 'pengesahan';

    protected $fillable = [
        'user_id',
        'jabatan',
        'tanda_tangan'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
} 