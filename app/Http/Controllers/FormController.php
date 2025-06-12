<?php

namespace App\Http\Controllers;

use App\Models\AgingAr;
use App\Models\Nak;
use Illuminate\Http\Request;
use App\Models\YourModel; // Ensure your model has the fillable properties set
use App\Models\Customer; // Add this line to import the Customer model
use App\Models\PengajuanKredit; // Add this line to import the PengajuanKredit model
use App\Models\DetailPerusahaan; // Add this line to import the PengajuanKredit model
use App\Models\KeuanganPerusahaan;
use App\Models\KapitalPerusahaan;
use App\Models\Fasilitas;

class FormController extends Controller
{
    public function formTingkat3()
    {
        return view('pages.admin.tingkat3'); // Replace with your actual view name
    }

    public function formTingkat2()
    {
        return view('pages.admin.tingkat2'); // Replace with your actual view name
    }


    public function storeTingkat3(Request $request)
    {
        //dd ( $request->all());
        $validated = $request->validate([
            'nama_bc' => 'required|string|max:255',
            'cabang' => 'required|string|max:255',
            'tanggal' => 'required|date',
            'namacust' => 'required|string|max:255',
            'bid-usaha' => 'required|string|max:255',
            'group' => 'required|string|max:255',
            'penanggung_jawab' => 'required|string|max:255',
            'alamat' => 'required|string',
            'industry' => 'array',
            'industry.*' => 'string',
            'nilai_kredit' => 'required|numeric',
            'term_of_payment' => 'required|string',
            'bunga' => 'required|numeric',
            'jaminan' => 'required|string',
            'bentuk_perusahaan' => 'required|array',
            'bentuk_perusahaan.*' => 'string',
            'waktu_didirikan' => 'required|string',
            'domisili' => 'required|string',
            'nomor_akte_pendirian' => 'required|string',
            'notaris' => 'required|string',
            'akte_perubahan' => 'required|string',
            'pengesahan' => 'required|string',
            'modal_dasar' => 'required|numeric',
            'modal_disetor' => 'required|numeric',
            'lama' => 'required|string',
            'struktur' => 'required|string',
            'pemegang_keputusan' => [
                'nullable',
                function ($attribute, $value, $fail) use ($request) {
                    if ($request->input('struktur') === 'Keputusan Ditangan Seorang' && empty($value)) {
                        $fail('Nama pemegang keputusan harus diisi jika struktur adalah Keputusan Ditangan Seorang.');
                    }
                }
            ],
            'nama_susunan' => 'array',
            'nama_susunan.*' => 'nullable|string',
            'jumlah_saham' => 'array',
            'jumlah_saham.*' => 'nullable|integer',
            'nilai_saham' => 'array',
            'nilai_saham.*' => 'nullable|string',
            'manajemen_kehakiman' => 'nullable|string',
            'jabatan_susunan' => 'array',
            'jabatan_susunan.*' => 'nullable|string',
            'rata_rata_per_bulan' => 'required|string',
            'jumlah_hasil_penjualan_per_tahun' => 'required|string',
            'cara_pembayaran' => 'required|string',
            'kredit_term' => 'nullable|integer',
            'jenis_pembayaran' => 'required|string',
            'nama_proyek' => 'nullable|string',
            'nama_fasilitas' => 'required|array',
            'nama_fasilitas.*' => 'required|string',
            'jumlah_fasilitas' => 'required|array',
            'jumlah_fasilitas.*' => 'required|integer',
            'keterangan_fasilitas' => 'required|array',
            'keterangan_fasilitas.*' => 'required|string', 
        ], [
            'rata_rata_per_bulan.required' => 'Rata-rata per bulan wajib diisi.',
            'jumlah_hasil_penjualan_per_tahun.required' => 'Jumlah hasil penjualan per tahun wajib diisi.',
            'cara_pembayaran.required' => 'Cara pembayaran wajib dipilih.',
            'jenis_pembayaran.required' => 'Jenis pembayaran wajib dipilih.',
            'nama_fasilitas.*.required' => 'Nama fasilitas wajib diisi.',
            'jumlah_fasilitas.*.required' => 'Jumlah fasilitas wajib diisi.',
            'jumlah_fasilitas.*.integer' => 'Jumlah fasilitas harus berupa angka.',
            'keterangan_fasilitas.*.required' => 'Keterangan fasilitas wajib diisi.',
        ]);

        // Tambahkan field level ke dalam array validated
        $validated['level'] = 'level 3';

        // Simpan ke tabel Nak
        $nak = Nak::create($validated);

        // Simpan ke tabel Customer
        $customerData = [
            'nama' => $validated['namacust'],
            'bidang_usaha' => $validated['bid-usaha'],
            'group_perusahaan' => $validated['group'],
            'penanggung_jawab' => $validated['penanggung_jawab'],
            'alamat' => $validated['alamat'],
            'industry' => json_encode($validated['industry']),
            'nak_id' => $nak->id,
        ];
        $customer = Customer::create($customerData);

        // Simpan ke tabel PengajuanKredit
        $agingArData = [
            'customers_id' => $customer->id,
            'nilai_kredit' => $validated['nilai_kredit'],
            'term_of_payment' => $validated['term_of_payment'],
            'bunga' => $validated['bunga'],
            'jaminan' => $validated['jaminan'],
            'nak_id' => $nak->id,
        ];
        $agingAr = AgingAr::create($agingArData);

        // Simpan ke tabel DetailPerusahaan
        $pemegang_keputusan = $request->pemegang_keputusan;
        if ($request->struktur === 'Keputusan Ditangan Seorang' && $request->filled('jabatan_pemegang_keputusan')) {
            $pemegang_keputusan .= ' - ' . $request->jabatan_pemegang_keputusan;
        }
        $detailPerusahaanData = [
            'customers_id' => $customer->id,
            'bentuk_perusahaan' => json_encode($validated['bentuk_perusahaan']),
            'waktu_didirikan' => $validated['waktu_didirikan'],
            'domisili' => $validated['domisili'],
            'nomer_akte' => $validated['nomor_akte_pendirian'],
            'notaris' => $validated['notaris'],
            'akte_perubahan' => $validated['akte_perubahan'],
            'pengesahan' => $validated['pengesahan'],
            'modal_dasar' => $validated['modal_dasar'],
            'modal_disetor' => $validated['modal_disetor'],
            'umur_perusahaan' => $validated['lama'],
            'struktur_organisasi' => $validated['struktur'],
            'manajemen_kehakiman' => $validated['manajemen_kehakiman'] ?? null,
            'pemegang_keputusan' => $pemegang_keputusan 
                ? 'Keputusan dipegang oleh ' . $pemegang_keputusan 
                : null,
        ];
        $detailPerusahaan = DetailPerusahaan::create($detailPerusahaanData);

        // Simpan ke tabel KeuanganPerusahaan
        if ($request->has('nama_susunan')) {
            $nama_susunan = $request->input('nama_susunan', []);
            $jabatan_susunan = $request->input('jabatan_susunan', []);
            $jumlah_saham = $request->input('jumlah_saham', []);
            $nilai_saham = $request->input('nilai_saham', []);
            for ($i = 0; $i < count($nama_susunan); $i++) {
                if ($nama_susunan[$i] || $jumlah_saham[$i] || $nilai_saham[$i] || ($jabatan_susunan[$i] ?? null)) {
                    KeuanganPerusahaan::create([
                        'detail_perusahaan_id' => $detailPerusahaan->id,
                        'nama' => $nama_susunan[$i],
                        'jabatan' => $jabatan_susunan[$i] ?? null,
                        'saham' => $jumlah_saham[$i],
                        'nilai_saham' => $nilai_saham[$i],
                    ]);
                }
            }
        }
        // Simpan kapital perusahaan menggunakan model
        $cara_pembayaran = $request->cara_pembayaran;
        if ($cara_pembayaran === 'KREDIT' && $request->filled('kredit_term')) {
            $cara_pembayaran .= ' - ' . $request->kredit_term . ' hari';
        }

        // Gabungkan nama_proyek ke jenis_pembayaran jika dipilih
        $jenis_pembayaran = $request->jenis_pembayaran;
        if ($jenis_pembayaran === 'SWASTA SEKTOR PROYEK / BIDANG' && $request->filled('nama_proyek')) {
            $jenis_pembayaran .= ' - ' . $request->nama_proyek;
        }

        $kapitalData = [
            'customers_id' => $customer->id,
            'penjualan_perbulan' => $request->rata_rata_per_bulan,
            'penjualan_pertahun' => $request->jumlah_hasil_penjualan_per_tahun,
            'cara_pembayaran' => $cara_pembayaran,
            'jenis_pembayaran' => $jenis_pembayaran, 
        ];

        $kapital = KapitalPerusahaan::create($kapitalData);

        // Simpan fasilitas
        foreach ($request->nama_fasilitas as $i => $nama) {
            if ($nama || $request->jumlah_fasilitas[$i] || $request->keterangan_fasilitas[$i] ?? null) {
                Fasilitas::create([
                    'kapital_perusahaan_id' => $kapital->id,
                    'f\asilitas' => $nama,
                    'jumlah' => $request->jumlah_fasilitas[$i],
                    'keterangan' => $request->keterangan_fasilitas[$i],
                ]);
            }
        }

        return redirect()->route('admin.formTingkat3')->with('success', 'Form submitted successfully!');
    }


    public function storeTingkat2(Request $request)
    {


    }

}