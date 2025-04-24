<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KapasitasPerusahaan extends Model
{
    use HasFactory;

    protected $table = 'kapasitas_perusahaan';

    protected $fillable = [
        'hubungan_bank_id',
        'reputasi_id',
        'usaha_sampingan_id',
        'req_suku_cadang_id',
        'status_piutang',
        'kategori_piutang',
        'pengalaman_pembayaran',
    ];

    public function hubunganBank()
    {
        return $this->belongsTo(HubunganBank::class);
    }

    public function reputasi()
    {
        return $this->belongsTo(Reputasi::class);
    }

    public function usahaSampingan()
    {
        return $this->belongsTo(UsahaSampingan::class);
    }

    public function reqSukuCadang()
    {
        return $this->belongsTo(ReqSukuCadang::class);
    }
}
