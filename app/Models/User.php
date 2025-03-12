<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory;

    protected $fillable = [
        'nama', 'email', 'alamat', 'role', 'level', 'jabatan',
        'password', 'no_hp', 'cabang'
    ];

    public function nak()
    {
        return $this->hasMany(Nak::class);
    }

    public function persetujuan()
    {
        return $this->hasMany(PersetujuanNak::class, 'komite_id');
    }
}
