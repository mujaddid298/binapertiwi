<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OpenblockAging extends Model
{
    use HasFactory;

    protected $table = 'openblock_agings';

    protected $fillable = [
        'open_block_id',
        'aging',
        'nilai',
        'plan',
        'tanggal_aging',
        'cara_bayar',
    ];

    public function openblock()
    {
        return $this->belongsTo(OpenBlock::class, 'open_block_id');
    }
}