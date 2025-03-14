<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KreditApplication extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'tanggal', 'cabang', 'kode_ao', 'nama', 'telepon', 'pemohon', 'alamat', 'jenis_perusahaan',
        'tujuan', 'jenis_kredit', 'pekerjaan', 'jenis_pekerjaan', 'modal_pinjaman', 'jaminan', 
        'prospek_pekerjaan', 'omset_per_periode', 'periode', 'laba_per_bulan', 'hutang', 'kekayaan',
        'alamat_perusahaan', 'rincian_komersial', 'waktu_buka', 'waktu_tutup', 'lama_usaha', 'mulai_usaha',
        'loan_permintaan', 'struktur_keluarga', 'lingkungan_calon_nasabah', 'kondisi_tempat_tinggal',
        'mengenal_karakter_pemohon', 'jenis_kendaraan', 'noted', 'rekomendasi_pinjaman',
        'nama_tanggungan', 'usia', 'pekerjaan_tanggungan', 'perhitungan_keuangan',
        'bulan_tenor', 'tahun_tenor', 'lama_bulan', 'tahun_lama', 'limit_kredit', 'pokok_kredit', 'status_tenor',
        'kontribusi', 'kesimpulan', 'marketing_ttd', 'supervisor_ttd', 'tanggal_ttd',
        'ao_account', 'rm_bm', 'nama_komite', 'credit_level'
    ];
}