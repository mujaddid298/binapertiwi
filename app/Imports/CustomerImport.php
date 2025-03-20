<?php

namespace App\Imports;

use App\Models\Customer; 
use App\Models\KapitalPerusahaan; 
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class CustomerImport implements ToModel, WithHeadingRow
{
    public function model(array $row)
    {
        // Simpan data ke tabel pertama
        $customer = Customer::create([
            'nama' => $row['nama'],
            'alamat' => $row['alamat'],
            'industry' => $row['industry'],
            'bidang_usaha' => $row['bidang_usaha'],
            'group_perusahaan' => $row['group_perusahaan'],
            'penanggung_jawab' => $row['penanggung_jawab'],
            'kapital_perusahaan_id' => is_numeric($row['kapital_perusahaan_id']) ? (int)$row['kapital_perusahaan_id'] : null,
            'kapasitas_perusahaan_id' => is_numeric($row['kapasitas_perusahaan_id']) ? (int)$row['kapasitas_perusahaan_id'] : null,
        ]);

        // Jika fasilitas_id tidak boleh null, pastikan nilai ada
       // $fasilitasId = is_numeric($row['fasilitas_id']) ? (int)$row['fasilitas_id'] : null;

        // Simpan data ke tabel kedua
        KapitalPerusahaan::create([
            'customer_id' => $customer->id, // Menghubungkan dengan customer yang baru dibuat
            'penjualan_perbulan' => $row['penjualan_perbulan'], // Pastikan kolom ini ada di file Excel
            'penjualan_pertahun' => $row['penjualan_pertahun'], // Pastikan kolom ini ada di file Excel
            'keterangan' => $row['keterangan'], // Pastikan kolom ini ada di file Excel
            'pembayaran' => $row['pembayaran'], // Pastikan kolom ini ada di file Excel
            'transaksi' => $row['transaksi'], // Pastikan kolom ini ada di file Excel
        ]);
    }
} 