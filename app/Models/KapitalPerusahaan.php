<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KapitalPerusahaan extends Model
{
    use HasFactory;

    // Nama tabel yang terkait dengan model ini
    protected $table = 'kapital_perusahaan';

    // Kolom yang dapat diisi secara massal
    protected $fillable = [
        'customers_id',
        'penjualan_perbulan',
        'penjualan_pertahun',
        'keterangan',
        'cara_pembayaran',
        'jenis_pembayaran', 
    ];

    // Relasi dengan model Customer
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    // Relasi dengan model Fasilitas
    public function fasilitas()
    {
        return $this->belongsTo(Fasilitas::class, 'fasilitas_id');
    }
}