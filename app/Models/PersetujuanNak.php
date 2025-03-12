<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PersetujuanNak extends Model
{
    use HasFactory;

    protected $fillable = ['nak_id', 'komite_id', 'status', 'komen', 'tanggal_persetujuan'];

    public function nak()
    {
        return $this->belongsTo(Nak::class);
    }

    public function komite()
    {
        return $this->belongsTo(User::class, 'komite_id');
    }
}