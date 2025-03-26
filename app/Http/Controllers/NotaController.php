<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NotaController extends Controller
{
    /**
     * Display the NAK form
     */
    public function index()
    {
        return view('pages.form_nak');
    }

    /**
     * Store the NAK form data
     */
    public function store(Request $request)
    {
        // Validate the form data
        $validated = $request->validate([
            'tanggal' => 'required|date',
            'cabang' => 'required|string',
            'nama_bc' => 'required|string',
            'nama' => 'required|string',
            'telepon' => 'required|string',
            'alamat' => 'required|string',
            'penanggung_jawab' => 'required|string',
            'industry' => 'required|array',
            'nilai_kredit' => 'required|string',
            'bunga' => 'required|string',
            'bayar' => 'required|string',
            'jaminan' => 'required|string',
            'modal_pinjaman' => 'required|array',
            'prospek_pekerjaan' => 'required|string',
            'omset_per_periode' => 'required|string',
            'periode' => 'required|string',
            'laba_per_bulan' => 'required|string',
            'hutang' => 'required|string',
            'kekayaan' => 'required|string',
            'alamat_perusahaan' => 'required|string',
            'rincian_komersial' => 'required|string',
            'waktu_buka' => 'required|string',
            'waktu_tutup' => 'required|string',
            'lama_usaha' => 'required|string',
            'mulai_usaha' => 'required|string',
            'loan_permintaan' => 'required|string',
            'struktur_keluarga' => 'required|array',
            'lingkungan_calon_nasabah' => 'required|string',
            'kondisi_tempat_tinggal' => 'required|string',
            'mengenal_karakter_pemohon' => 'required|string',
            'jenis_kendaraan' => 'required|string',
            'noted' => 'required|string',
            'rekomendasi_pinjaman' => 'required|string',
            'nama_tanggungan' => 'required|string',
            'usia' => 'required|string',
            'pekerjaan_tanggungan' => 'required|string',
            'nama_customer' => 'required|array',
            'nominal' => 'required|array',
            'jenis_pengeluaran' => 'required|array',
            'nominal_pengeluaran' => 'required|array',
            'perhitungan_keuangan' => 'required|string',
            'bulan_tenor' => 'required|string',
            'tahun_tenor' => 'required|string',
            'lama_bulan' => 'required|string',
            'tahun_lama' => 'required|string',
            'limit_kredit' => 'required|string',
            'pokok_kredit' => 'required|string',
            'status_tenor' => 'required|string',
            'kontribusi' => 'required|string',
            'kesimpulan' => 'required|string',
            'keterangan_tambahan' => 'required|array',
            'persetujuan_tambahan' => 'required|array',
            'marketing_ttd' => 'required|string',
            'supervisor_ttd' => 'required|string',
            'tanggal_ttd' => 'required|date',
            'ao_account' => 'required|string',
            'rm_bm' => 'required|string',
            'nama_komite' => 'required|string',
            'credit_level' => 'required|string',
        ]);

        try {
            // Here you would typically save the data to your database
            // For example:
            // Nota::create($validated);

            return redirect()->back()->with('success', 'Form NAK berhasil disimpan');
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Terjadi kesalahan saat menyimpan form')
                ->withInput();
        }
    }
} 