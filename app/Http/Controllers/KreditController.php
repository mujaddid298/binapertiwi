<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KreditApplication;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class KreditController extends Controller
{
    /**
     * Display a listing of the credit applications.
     *
     * @return \Illuminate\Http\Response
     */
    public function form_nak()
    {
        $applications = KreditApplication::latest()->paginate(10);
        return view('pages.form_nak', compact('applications'));
    }

    /**
     * Show the form for creating a new credit application.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('kredit.create');
    }

    /**
     * Store a newly created credit application in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validate the request data
        $validator = Validator::make($request->all(), [
            'tanggal' => 'required|date',
            'cabang' => 'required|string|max:255',
            'nama' => 'required|string|max:255',
            'telepon' => 'required|string|max:20',
            'pemohon' => 'required|string|max:255',
            'alamat' => 'required|string',
            'jenis_perusahaan' => 'required|string|max:255',
            'pekerjaan' => 'required|string|max:255',
            'jenis_pekerjaan' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        DB::beginTransaction();

        try {
            // Create the credit application record
            $application = new KreditApplication();
            
            // Basic information
            $application->tanggal = $request->tanggal;
            $application->cabang = $request->cabang;
            $application->kode_ao = $request->kode_ao;
            $application->nama = $request->nama;
            $application->telepon = $request->telepon;
            $application->pemohon = $request->pemohon;
            $application->alamat = $request->alamat;
            $application->jenis_perusahaan = $request->jenis_perusahaan;
            
            // Tujuan
            $application->tujuan = $request->has('tujuan') ? implode(', ', $request->tujuan) : null;
            
            // Jenis Kredit
            $application->jenis_kredit = $request->jenis_kredit;
            
            // Pekerjaan
            $application->pekerjaan = $request->pekerjaan;
            $application->jenis_pekerjaan = $request->jenis_pekerjaan;
            
            // Modal Pinjaman
            $application->modal_pinjaman = $request->has('modal_pinjaman') ? implode(', ', $request->modal_pinjaman) : null;
            
            // Jaminan
            $application->jaminan = $request->jaminan;
            
            // Prospek Pekerjaan
            $application->prospek_pekerjaan = $request->prospek_pekerjaan;
            
            // Riwayat Keuangan
            $application->omset_per_periode = $request->omset_per_periode;
            $application->periode = $request->periode;
            $application->laba_per_bulan = $request->laba_per_bulan;
            $application->hutang = $request->hutang;
            $application->kekayaan = $request->kekayaan;
            
            // Alamat Perusahaan
            $application->alamat_perusahaan = $request->alamat_perusahaan;
            $application->rincian_komersial = $request->rincian_komersial;
            $application->waktu_buka = $request->waktu_buka;
            $application->waktu_tutup = $request->waktu_tutup;
            $application->lama_usaha = $request->lama_usaha;
            $application->mulai_usaha = $request->mulai_usaha;
            
            // Loan Permintaan
            $application->loan_permintaan = $request->loan_permintaan;
            
            // Struktur Keluarga
            $application->struktur_keluarga = $request->has('struktur_keluarga') ? implode(', ', $request->struktur_keluarga) : null;
            
            // Karakteristik Pemohon
            $application->lingkungan_calon_nasabah = $request->lingkungan_calon_nasabah;
            $application->kondisi_tempat_tinggal = $request->kondisi_tempat_tinggal;
            $application->mengenal_karakter_pemohon = $request->mengenal_karakter_pemohon;
            $application->jenis_kendaraan = $request->jenis_kendaraan;
            
            // Notes
            $application->noted = $request->noted;
            
            // Rekomendasi
            $application->rekomendasi_pinjaman = $request->rekomendasi_pinjaman;
            
            // Tanggungan
            $application->nama_tanggungan = $request->nama_tanggungan;
            $application->usia = $request->usia;
            $application->pekerjaan_tanggungan = $request->pekerjaan_tanggungan;
            
            // Perhitungan Keuangan
            $application->perhitungan_keuangan = $request->perhitungan_keuangan;
            
            // Tenor
            $application->bulan_tenor = $request->bulan_tenor;
            $application->tahun_tenor = $request->tahun_tenor;
            $application->lama_bulan = $request->lama_bulan;
            $application->tahun_lama = $request->tahun_lama;
            $application->limit_kredit = $request->limit_kredit;
            $application->pokok_kredit = $request->pokok_kredit;
            $application->status_tenor = $request->status_tenor;
            
            // Kontribusi
            $application->kontribusi = $request->kontribusi;
            
            // Kesimpulan
            $application->kesimpulan = $request->kesimpulan;
            
            // Signatures
            $application->marketing_ttd = $request->marketing_ttd;
            $application->supervisor_ttd = $request->supervisor_ttd;
            $application->tanggal_ttd = $request->tanggal_ttd;
            
            // Team
            $application->ao_account = $request->ao_account;
            $application->rm_bm = $request->rm_bm;
            $application->nama_komite = $request->nama_komite;
            $application->credit_level = $request->credit_level;
            
            // Save the application
            $application->save();
            
            // Save customer data
            if ($request->has('nama_customer') && $request->has('nominal')) {
                $customerData = [];
                foreach ($request->nama_customer as $key => $name) {
                    if (!empty($name) && isset($request->nominal[$key])) {
                        $customerData[] = [
                            'kredit_application_id' => $application->id,
                            'nama_customer' => $name,
                            'nominal' => $request->nominal[$key],
                            'created_at' => now(),
                            'updated_at' => now(),
                        ];
                    }
                }
                
                if (!empty($customerData)) {
                    DB::table('kredit_customers')->insert($customerData);
                }
            }
            
            // Save pengeluaran data
            if ($request->has('jenis_pengeluaran') && $request->has('nominal_pengeluaran')) {
                $pengeluaranData = [];
                foreach ($request->jenis_pengeluaran as $key => $jenis) {
                    if (!empty($jenis) && isset($request->nominal_pengeluaran[$key])) {
                        $pengeluaranData[] = [
                            'kredit_application_id' => $application->id,
                            'jenis_pengeluaran' => $jenis,
                            'nominal' => $request->nominal_pengeluaran[$key],
                            'created_at' => now(),
                            'updated_at' => now(),
                        ];
                    }
                }
                
                if (!empty($pengeluaranData)) {
                    DB::table('kredit_pengeluaran')->insert($pengeluaranData);
                }
            }
            
            // Save catatan tambahan
            if ($request->has('keterangan_tambahan') && $request->has('persetujuan_tambahan')) {
                $catatanData = [];
                foreach ($request->keterangan_tambahan as $key => $keterangan) {
                    if (!empty($keterangan) && isset($request->persetujuan_tambahan[$key])) {
                        $catatanData[] = [
                            'kredit_application_id' => $application->id,
                            'keterangan' => $keterangan,
                            'persetujuan' => $request->persetujuan_tambahan[$key],
                            'created_at' => now(),
                            'updated_at' => now(),
                        ];
                    }
                }
                
                if (!empty($catatanData)) {
                    DB::table('kredit_catatan')->insert($catatanData);
                }
            }
            
            DB::commit();
            
            return redirect()->route('kredit.index')
                ->with('success', 'Aplikasi kredit berhasil ditambahkan');
                
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()
                ->with('error', 'Terjadi kesalahan: ' . $e->getMessage())
                ->withInput();
        }
    }

    /**
     * Display the specified credit application.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $application = KreditApplication::findOrFail($id);
        
        // Get related data
        $customers = DB::table('kredit_customers')
            ->where('kredit_application_id', $id)
            ->get();
            
        $pengeluaran = DB::table('kredit_pengeluaran')
            ->where('kredit_application_id', $id)
            ->get();
            
        $catatan = DB::table('kredit_catatan')
            ->where('kredit_application_id', $id)
            ->get();
            
        return view('kredit.show', compact('application', 'customers', 'pengeluaran', 'catatan'));
    }

    /**
     * Show the form for editing the specified credit application.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $application = KreditApplication::findOrFail($id);
        
        // Get related data
        $customers = DB::table('kredit_customers')
            ->where('kredit_application_id', $id)
            ->get();
            
        $pengeluaran = DB::table('kredit_pengeluaran')
            ->where('kredit_application_id', $id)
            ->get();
            
        $catatan = DB::table('kredit_catatan')
            ->where('kredit_application_id', $id)
            ->get();
            
        return view('kredit.edit', compact('application', 'customers', 'pengeluaran', 'catatan'));
    }

    /**
     * Update the specified credit application in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Validate the request data
        $validator = Validator::make($request->all(), [
            'tanggal' => 'required|date',
            'cabang' => 'required|string|max:255',
            'nama' => 'required|string|max:255',
            'telepon' => 'required|string|max:20',
            'pemohon' => 'required|string|max:255',
            'alamat' => 'required|string',
            'jenis_perusahaan' => 'required|string|max:255',
            'pekerjaan' => 'required|string|max:255',
            'jenis_pekerjaan' => 'required|string|max:255',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        DB::beginTransaction();

        try {
            // Find the application
            $application = KreditApplication::findOrFail($id);
            
            // Update basic information
            $application->tanggal = $request->tanggal;
            $application->cabang = $request->cabang;
            $application->kode_ao = $request->kode_ao;
            $application->nama = $request->nama;
            $application->telepon = $request->telepon;
            $application->pemohon = $request->pemohon;
            $application->alamat = $request->alamat;
            $application->jenis_perusahaan = $request->jenis_perusahaan;
            
            // Update tujuan
            $application->tujuan = $request->has('tujuan') ? implode(', ', $request->tujuan) : null;
            
            // Update other fields
            $application->jenis_kredit = $request->jenis_kredit;
            $application->pekerjaan = $request->pekerjaan;
            $application->jenis_pekerjaan = $request->jenis_pekerjaan;
            $application->modal_pinjaman = $request->has('modal_pinjaman') ? implode(', ', $request->modal_pinjaman) : null;
            $application->jaminan = $request->jaminan;
            $application->prospek_pekerjaan = $request->prospek_pekerjaan;
            $application->omset_per_periode = $request->omset_per_periode;
            $application->periode = $request->periode;
            $application->laba_per_bulan = $request->laba_per_bulan;
            $application->hutang = $request->hutang;
            $application->kekayaan = $request->kekayaan;
            $application->alamat_perusahaan = $request->alamat_perusahaan;
            $application->rincian_komersial = $request->rincian_komersial;
            $application->waktu_buka = $request->waktu_buka;
            $application->waktu_tutup = $request->waktu_tutup;
            $application->lama_usaha = $request->lama_usaha;
            $application->mulai_usaha = $request->mulai_usaha;
            $application->loan_permintaan = $request->loan_permintaan;
            $application->struktur_keluarga = $request->has('struktur_keluarga') ? implode(', ', $request->struktur_keluarga) : null;
            $application->lingkungan_calon_nasabah = $request->lingkungan_calon_nasabah;
            $application->kondisi_tempat_tinggal = $request->kondisi_tempat_tinggal;
            $application->mengenal_karakter_pemohon = $request->mengenal_karakter_pemohon;
            $application->jenis_kendaraan = $request->jenis_kendaraan;
            $application->noted = $request->noted;
            $application->rekomendasi_pinjaman = $request->rekomendasi_pinjaman;
            $application->nama_tanggungan = $request->nama_tanggungan;
            $application->usia = $request->usia;
            $application->pekerjaan_tanggungan = $request->pekerjaan_tanggungan;
            $application->perhitungan_keuangan = $request->perhitungan_keuangan;
            $application->bulan_tenor = $request->bulan_tenor;
            $application->tahun_tenor = $request->tahun_tenor;
            $application->lama_bulan = $request->lama_bulan;
            $application->tahun_lama = $request->tahun_lama;
            $application->limit_kredit = $request->limit_kredit;
            $application->pokok_kredit = $request->pokok_kredit;
            $application->status_tenor = $request->status_tenor;
            $application->kontribusi = $request->kontribusi;
            $application->kesimpulan = $request->kesimpulan;
            $application->marketing_ttd = $request->marketing_ttd;
            $application->supervisor_ttd = $request->supervisor_ttd;
            $application->tanggal_ttd = $request->tanggal_ttd;
            $application->ao_account = $request->ao_account;
            $application->rm_bm = $request->rm_bm;
            $application->nama_komite = $request->nama_komite;
            $application->credit_level = $request->credit_level;
            
            // Save the application
            $application->save();
            
            // Update customer data
            DB::table('kredit_customers')->where('kredit_application_id', $id)->delete();
            if ($request->has('nama_customer') && $request->has('nominal')) {
                $customerData = [];
                foreach ($request->nama_customer as $key => $name) {
                    if (!empty($name) && isset($request->nominal[$key])) {
                        $customerData[] = [
                            'kredit_application_id' => $application->id,
                            'nama_customer' => $name,
                            'nominal' => $request->nominal[$key],
                            'created_at' => now(),
                            'updated_at' => now(),
                        ];
                    }
                }
                
                if (!empty($customerData)) {
                    DB::table('kredit_customers')->insert($customerData);
                }
            }
            
            // Update pengeluaran data
            DB::table('kredit_pengeluaran')->where('kredit_application_id', $id)->delete();
            if ($request->has('jenis_pengeluaran') && $request->has('nominal_pengeluaran')) {
                $pengeluaranData = [];
                foreach ($request->jenis_pengeluaran as $key => $jenis) {
                    if (!empty($jenis) && isset($request->nominal_pengeluaran[$key])) {
                        $pengeluaranData[] = [
                            'kredit_application_id' => $application->id,
                            'jenis_pengeluaran' => $jenis,
                            'nominal' => $request->nominal_pengeluaran[$key],
                            'created_at' => now(),
                            'updated_at' => now(),
                        ];
                    }
                }
                
                if (!empty($pengeluaranData)) {
                    DB::table('kredit_pengeluaran')->insert($pengeluaranData);
                }
            }
            
            // Update catatan tambahan
            DB::table('kredit_catatan')->where('kredit_application_id', $id)->delete();
            if ($request->has('keterangan_tambahan') && $request->has('persetujuan_tambahan')) {
                $catatanData = [];
                foreach ($request->keterangan_tambahan as $key => $keterangan) {
                    if (!empty($keterangan) && isset($request->persetujuan_tambahan[$key])) {
                        $catatanData[] = [
                            'kredit_application_id' => $application->id,
                            'keterangan' => $keterangan,
                            'persetujuan' => $request->persetujuan_tambahan[$key],
                            'created_at' => now(),
                            'updated_at' => now(),
                        ];
                    }
                }
                
                if (!empty($catatanData)) {
                    DB::table('kredit_catatan')->insert($catatanData);
                }
            }
            
            DB::commit();
            
            return redirect()->route('kredit.index')
                ->with('success', 'Aplikasi kredit berhasil diperbarui');
                
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()
                ->with('error', 'Terjadi kesalahan: ' . $e->getMessage())
                ->withInput();
        }
    }

    /**
     * Remove the specified credit application from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::beginTransaction();
        
        try {
            // Delete related data first
            DB::table('kredit_customers')->where('kredit_application_id', $id)->delete();
            DB::table('kredit_pengeluaran')->where('kredit_application_id', $id)->delete();
            DB::table('kredit_catatan')->where('kredit_application_id', $id)->delete();
            
            // Delete the application
            KreditApplication::findOrFail($id)->delete();
            
            DB::commit();
            
            return redirect()->route('kredit.index')
                ->with('success', 'Aplikasi kredit berhasil dihapus');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()
                ->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }
    
    /**
     * Print the specified credit application.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function print($id)
    {
        $application = KreditApplication::findOrFail($id);
        
        // Get related data
        $customers = DB::table('kredit_customers')
            ->where('kredit_application_id', $id)
            ->get();
            
        $pengeluaran = DB::table('kredit_pengeluaran')
            ->where('kredit_application_id', $id)
            ->get();
            
        $catatan = DB::table('kredit_catatan')
            ->where('kredit_application_id', $id)
            ->get();
            
        // Return view for printing
        return view('kredit.print', compact('application', 'customers', 'pengeluaran', 'catatan'));
    }
}