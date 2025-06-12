<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Approval extends Model
{
    use HasFactory;

    protected $table = 'approvals';

    protected $fillable = [
        'id_openblock',
        'id_user',
        'status',
        'komentar',
        'dokumen_type',
        'level',
        'created_at',
        'updated_at',
    ];

    // Define relationships
    public function openBlock()
    {
        return $this->belongsTo(OpenBlock::class, 'id_openblock');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
}