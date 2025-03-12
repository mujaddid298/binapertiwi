<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nak extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'cabang', 'tanggal', 'nama_bc', 'perusahaan_pelanggan',
        'pengajuan_kredit', 'karakter_perusahaan', 'kapital_perusahaan',
        'kapasitas_perusahaan', 'kondisi_makro_lingkungan', 'lampiran',
        'nilai_kredit_yang_disetujui', 'analisa_tim_kredit_ho', 'status',
        'nilai_kredit', 'term_of_payment', 'bunga', 'jaminan'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function persetujuan()
    {
        return $this->hasMany(PersetujuanNak::class);
    }
}