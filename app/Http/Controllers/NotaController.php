<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\DetailPerusahaan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Nak;
use App\Models\Nota;
use App\Models\Fasilitas;
use App\Models\KapitalPerusahaan;
use App\Models\PengajuanKredit;

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
    public function storeformnak(Request $request)
    {
        // Validate the form data
        $validated = $request->validate([
            'tanggal' => 'nullable|date',
            'cabang' => 'nullable|string',
            'nama_bc' => 'nullable|string',
            'nama' => 'nullable|string',
            'telepon' => 'nullable|string',
            'alamat' => 'nullable|string',
            'penanggung_jawab' => 'nullable|string',
            'industry' => 'nullable|array',
            'nilai_kredit' => 'nullable|string',
            'bunga' => 'nullable|string',
            'bayar' => 'nullable|string',
            'jaminan' => 'nullable|string',
            'modal_pinjaman' => 'nullable|array',
            'prospek_pekerjaan' => 'nullable|string',
            'omset_per_periode' => 'nullable|string',
            'periode' => 'nullable|string',
            'laba_per_bulan' => 'nullable|string',
            'hutang' => 'nullable|string',
            'kekayaan' => 'nullable|string',
            'alamat_perusahaan' => 'nullable|string',
            'rincian_komersial' => 'nullable|string',
            'waktu_buka' => 'nullable|string',
            'waktu_tutup' => 'nullable|string',
            'lama_usaha' => 'nullable|string',
            'mulai_usaha' => 'nullable|string',
            'loan_permintaan' => 'nullable|string',
            'struktur_keluarga' => 'nullable|array',
            'lingkungan_calon_nasabah' => 'nullable|string',
            'kondisi_tempat_tinggal' => 'nullable|string',
            'mengenal_karakter_pemohon' => 'nullable|string',
            'jenis_kendaraan' => 'nullable|string',
            'noted' => 'nullable|string',
            'rekomendasi_pinjaman' => 'nullable|string',
            'nama_tanggungan' => 'nullable|string',
            'usia' => 'nullable|string',
            'pekerjaan_tanggungan' => 'nullable|string',
            'nama_customer' => 'nullable|array',
            'nominal' => 'nullable|array',
            'jenis_pengeluaran' => 'nullable|array',
            'nominal_pengeluaran' => 'nullable|array',
            'perhitungan_keuangan' => 'nullable|string',
            'bulan_tenor' => 'nullable|string',
            'tahun_tenor' => 'nullable|string',
            'lama_bulan' => 'nullable|string',
            'tahun_lama' => 'nullable|string',
            'limit_kredit' => 'nullable|string',
            'pokok_kredit' => 'nullable|string',
            'status_tenor' => 'nullable|string',
            'kontribusi' => 'nullable|string',
            'kesimpulan' => 'nullable|string',
            'keterangan_tambahan' => 'nullable|array',
            'persetujuan_tambahan' => 'nullable|array',
            'marketing_ttd' => 'nullable|string',
            'supervisor_ttd' => 'nullable|string',
            'tanggal_ttd' => 'nullable|date',
            'ao_account' => 'nullable|string',
            'rm_bm' => 'nullable|string',
            'nama_komite' => 'nullable|string',
            'credit_level' => 'nullable|string',
        ]);

        try {
            // Begin transaction to ensure all data is stored correctly
            DB::beginTransaction();

            // Create main Nota record
            $nota = Nak::create([
                'tanggal' => $validated['tanggal'],
                'cabang' => $validated['cabang'],
                'nama_bc' => $validated['nama_bc'],
                //'credit_level' => $validated['credit_level'],
                // Add other main nota fields here
            ]);

            // // Create personal information record
            // PersonalInfo::create([
            //     'nota_id' => $nota->id,
            //     'nama' => $validated['nama'],
            //     'telepon' => $validated['telepon'],
            //     'alamat' => $validated['alamat'],
            //     'penanggung_jawab' => $validated['penanggung_jawab']
            // ]);

            // // Create business information record
            // BusinessInfo::create([
            //     'nota_id' => $nota->id,
            //     'industry' => $validated['industry'],
            //     'alamat_perusahaan' => $validated['alamat_perusahaan'],
            //     'lama_usaha' => $validated['lama_usaha'],
            //     'mulai_usaha' => $validated['mulai_usaha']
            // ]);

            // // Create financial information record
            // FinancialInfo::create([
            //     'nota_id' => $nota->id,
            //     'nilai_kredit' => $validated['nilai_kredit'],
            //     'bunga' => $validated['bunga'],
            //     'omset_per_periode' => $validated['omset_per_periode'],
            //     'laba_per_bulan' => $validated['laba_per_bulan']
            // ]);

            DB::commit();
            return redirect()->back()->with('success', 'Form NAK berhasil disimpan');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()
                ->with('error', 'Terjadi kesalahan saat menyimpan form')
                ->withInput();
        }
    }

    /**
     * Store the Persetujuan 3 form data
     */
    public function storePersetujuan3(Request $request)
    {
        // Validate the incoming request data
        $validatedData = $request->validate([
            'nama_bc' => 'required|string|max:255',
            'cabang' => 'required|string|max:255',
            'tanggal' => 'required|date',
            'namacust' => 'required|string|max:255',
            'bid-usaha' => 'required|string|max:255',
            'group' => 'required|string|max:255',
            'penanggung_jawab' => 'required|string|max:255',
            'alamat' => 'required|string',
            'industry' => 'array',
            'nilai_kredit' => 'required|numeric',
            'jangka_pembayaran' => 'required|string',
            'bunga' => 'required|numeric',
            'jaminan' => 'required|string',
            'bentuk_perusahaan' => 'array',
            'waktu_didirikan' => 'required|string|max:255',
            'domisili' => 'required|string|max:255',
            'nomor_akte_pendirian' => 'required|string|max:255',
            'notaris' => 'required|string|max:255',
            'akte_perubahan' => 'required|string|max:255',
            'pengesahan' => 'required|string|max:255',
            'modal_dasar' => 'required|numeric',
            'modal_disetor' => 'required|numeric',
            'lama' => 'required|string',
            'struktur' => 'required|string',
            'pemegang_keputusan' => 'nullable|string|max:255',
            'rata_rata_per_bulan' => 'required|numeric',
            'jumlah_hasil_penjualan_per_tahun' => 'required|numeric',
            'cara_pembayaran' => 'required|string',
            'jenis_pembayaran' => 'required|string',
            'nama_proyek' => 'nullable|string|max:255',
            'nama_fasilitas' => 'array',
            'jumlah_fasilitas' => 'array',
            'keterangan_fasilitas' => 'array',
            // Add other fields as necessary
        ]);

        try {
            $nota = Nak::create([
                'tanggal' => $validatedData['tanggal'],
                'cabang' => $validatedData['cabang'],
                'nama_bc' => $validatedData['nama_bc'],
            ]);
            $customer = Customer::create([
                'nota_id' => $nota->id,
                'namacust' => $validatedData['namacust'],
                'bidang_usaha' => $validatedData['bid-usaha'],
                'group' => $validatedData['group'],
                'penanggung_jawab' => $validatedData['penanggung_jawab'],
                'alamat' => $validatedData['alamat'],
                'industry' => $validatedData['industry'],
            ]);

            $kapital_perusahaan = KapitalPerusahaan::create([
                'customer_id' => $customer->id,
                'rata_rata_per_bulan' => $validatedData['rata_rata_per_bulan'],
                'jumlah_hasil_penjualan_per_tahun' => $validatedData['jumlah_hasil_penjualan_per_tahun'],
                'cara_pembayaran' => $validatedData['cara_pembayaran'],
                'jenis_pembayaran' => $validatedData['jenis_pembayaran'],
            ]);

            $detail_perusahaan = DetailPerusahaan::create([
                'customer_id' => $customer->id,
                'keuangan_perusahaan_id' => $customer->id,
                'bentuk_perusahaan' => $validatedData['bentuk_perusahaan'],
                'waktu_didirikan' => $validatedData['waktu_didirikan'],
                'domisili' => $validatedData['domisili'],
                'nomor_akte_pendirian' => $validatedData['nomor_akte_pendirian'],
                'notaris' => $validatedData['notaris'],
                'akte_perubahan' => $validatedData['akte_perubahan'],
                'pengesahan' => $validatedData['pengesahan'],
                'modal_dasar' => $validatedData['modal_dasar'],
                'modal_disetor' => $validatedData['modal_disetor'],
                'lama' => $validatedData['lama'],
                'struktur' => $validatedData['struktur'],
                'pemegang_keputusan' => $validatedData['pemegang_keputusan'],
            ]);

            $pengajuan_kredit = PengajuanKredit::create([
                'nilai_kredit' => $validatedData['nilai_kredit'],
                'jangka_pembayaran' => $validatedData['jangka_pembayaran'],
                'bunga' => $validatedData['bunga'],
                'jaminan' => $validatedData['jaminan'],
            ]);

        } catch (\Exception $e) {
            // Handle the exception (e.g., log the error, return a response)
            return redirect()->back()->with('error', 'Terjadi kesalahan saat menyimpan data: ' . $e->getMessage());
        }
        // Store facilities if they exist
        if (!empty($validatedData['nama_fasilitas'])) {
            foreach ($validatedData['nama_fasilitas'] as $index => $nama_fasilitas) {
                // Assuming you have a model for facilities, e.g., Facility
                // You may need to create a Facility model and migration if it doesn't exist
                Fasilitas::create([
                    'nota_id' => $nota->id, // Assuming you have a foreign key in the facilities table
                    'nama_fasilitas' => $nama_fasilitas,
                    'jumlah_fasilitas' => $validatedData['jumlah_fasilitas'][$index] ?? null,
                    'keterangan_fasilitas' => $validatedData['keterangan_fasilitas'][$index] ?? null,
                ]);
            }
        }

        // Redirect or return response
        return redirect()->route('admin.someRoute')->with('success', 'Data has been saved successfully.');
    }
} 