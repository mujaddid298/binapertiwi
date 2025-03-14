@extends('layouts.app')

@section('title', 'Home')

@section('content')
<!-- [ breadcrumb ] start -->
<div class="page-header">
    <div class="page-block">
        <div class="row align-items-center">
            <div class="col-md-12">
                <div class="page-header-title">
                    <h5 class="m-b-10">Home</h5>
                </div>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                    {{-- <li class="breadcrumb-item" aria-current="page">Dashboard</li> --}}
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- [ breadcrumb ] end -->


<!-- [ Main Content ] start -->
<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header bg-warning">
                <h5 class="text-dark">NOTA APLIKASI KREDIT PKP2</h5>
            </div>
            <div class="card-body">
                <form action="{{  }}" method="POST">
                    @csrf

                    <!-- Top Section -->
                    <div class="row mb-3">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="tanggal">TANGGAL</label>
                                <input type="date" class="form-control" id="tanggal" name="tanggal">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="cabang">CABANG</label>
                                <input type="text" class="form-control" id="cabang" name="cabang">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="kode_ao">KODE AO</label>
                                <input type="text" class="form-control" id="kode_ao" name="kode_ao">
                            </div>
                        </div>
                    </div>

                    <!-- Personal Information Section -->
                    <div class="row mb-3">
                        <div class="col-md-8">
                            <div class="form-group">
                                <label for="nama">NAMA</label>
                                <input type="text" class="form-control" id="nama" name="nama">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="telepon">NOMOR TELEPON</label>
                                <input type="text" class="form-control" id="telepon" name="telepon">
                            </div>
                        </div>
                    </div>

                    <!-- Pemohon Section -->
                    <div class="row mb-3">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="pemohon">PEMOHON</label>
                                <input type="text" class="form-control" id="pemohon" name="pemohon">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="alamat">ALAMAT</label>
                                <input type="text" class="form-control" id="alamat" name="alamat">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="jenis_perusahaan">JENIS PERUSAHAAN</label>
                                <input type="text" class="form-control" id="jenis_perusahaan" name="jenis_perusahaan">
                            </div>
                        </div>
                    </div>

                    <!-- Tujuan Section -->
                    <div class="row mb-3">
                        <div class="col-md-12">
                            <label>TUJUAN</label>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" id="ob" name="tujuan[]"
                                            value="OB">
                                        <label class="form-check-label" for="ob">OB</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" id="kpr" name="tujuan[]"
                                            value="KPR">
                                        <label class="form-check-label" for="kpr">KPR</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" id="biasa" name="tujuan[]"
                                            value="Biasa">
                                        <label class="form-check-label" for="biasa">Biasa</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" id="refinancing" name="tujuan[]"
                                            value="Refinancing">
                                        <label class="form-check-label" for="refinancing">Refinancing</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" id="property" name="tujuan[]"
                                            value="Property">
                                        <label class="form-check-label" for="property">Property</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" id="construction"
                                            name="tujuan[]" value="Construction">
                                        <label class="form-check-label" for="construction">Construction</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" id="primary" name="tujuan[]"
                                            value="Primary">
                                        <label class="form-check-label" for="primary">Primary</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" id="building" name="tujuan[]"
                                            value="Building">
                                        <label class="form-check-label" for="building">Building</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox" id="lain" name="tujuan[]"
                                            value="Lain">
                                        <label class="form-check-label" for="lain">Lain</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Jenis Kredit Section -->
                    <div class="row mb-3">
                        <div class="col-md-12">
                            <label>JENIS KREDIT</label>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" id="jenisKredit1"
                                            name="jenis_kredit" value="Plafond">
                                        <label class="form-check-label" for="jenisKredit1">Plafond</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" id="jenisKredit2"
                                            name="jenis_kredit" value="Non Plafond">
                                        <label class="form-check-label" for="jenisKredit2">Non Plafond</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" id="jenisKredit3"
                                            name="jenis_kredit" value="Transaksional">
                                        <label class="form-check-label" for="jenisKredit3">Transaksional</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Pekerjaan Section -->
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="pekerjaan">PEKERJAAN</label>
                                <input type="text" class="form-control" id="pekerjaan" name="pekerjaan">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="jenis_pekerjaan">JENIS PEKERJAAN</label>
                                <input type="text" class="form-control" id="jenis_pekerjaan" name="jenis_pekerjaan">
                            </div>
                        </div>
                    </div>

                    <!-- Modal Pinjaman Section -->
                    <div class="row mb-3">
                        <div class="col-md-12">
                            <label>MODAL PINJAMAN</label>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="pembiayaan_tambahan"
                                            name="modal_pinjaman[]" value="Pembiayaan Tambahan">
                                        <label class="form-check-label" for="pembiayaan_tambahan">PEMBIAYAAN
                                            TAMBAHAN</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="pembiayaan_pembahasan"
                                            name="modal_pinjaman[]" value="Pembiayaan Pembahasan KYC">
                                        <label class="form-check-label" for="pembiayaan_pembahasan">PEMBIAYAAN
                                            PEMBAHASAN KYC</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="pribadi_pem"
                                            name="modal_pinjaman[]" value="Pribadi (Pem)">
                                        <label class="form-check-label" for="pribadi_pem">PRIBADI (PEM)</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="institusional_pem"
                                            name="modal_pinjaman[]" value="Institusional (Pem)">
                                        <label class="form-check-label" for="institusional_pem">INSTITUSIONAL
                                            (PEM)</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Jaminan Section -->
                    <div class="row mb-3">
                        <div class="col-md-12">
                            <label>JAMINAN</label>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" id="jaminan1" name="jaminan"
                                            value="Tanah">
                                        <label class="form-check-label" for="jaminan1">Tanah</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" id="jaminan2" name="jaminan"
                                            value="Bangunan">
                                        <label class="form-check-label" for="jaminan2">Bangunan</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" id="jaminan3" name="jaminan"
                                            value="Kendaraan">
                                        <label class="form-check-label" for="jaminan3">Kendaraan</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Prospek Pekerjaan Section -->
                    <div class="row mb-3">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="prospek_pekerjaan">PROSPEK PEKERJAAN</label>
                                <input type="text" class="form-control" id="prospek_pekerjaan" name="prospek_pekerjaan">
                            </div>
                        </div>
                    </div>

                    <!-- Riwayat Keuangan Section -->
                    <div class="row mb-3">
                        <div class="col-md-12">
                            <label>RIWAYAT KEUANGAN</label>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="omset_per_periode">OMSET PER PERIODE</label>
                                        <input type="text" class="form-control" id="omset_per_periode"
                                            name="omset_per_periode">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="periode">PERIODE</label>
                                        <input type="text" class="form-control" id="periode" name="periode">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Lain-lain Section -->
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="laba_per_bulan">LABA PER BULAN</label>
                                <input type="text" class="form-control" id="laba_per_bulan" name="laba_per_bulan">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="hutang">HUTANG</label>
                                <input type="text" class="form-control" id="hutang" name="hutang">
                            </div>
                        </div>
                    </div>

                    <!-- Pemohon Section -->
                    <div class="row mb-3">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="kekayaan">KEKAYAAN</label>
                                <input type="text" class="form-control" id="kekayaan" name="kekayaan">
                            </div>
                        </div>
                    </div>

                    <!-- Alamat Section -->
                    <div class="row mb-3">
                        <div class="col-md-12">
                            <h6>ALAMAT PERUSAHAAN</h6>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="alamat_perusahaan">ALAMAT</label>
                                        <input type="text" class="form-control" id="alamat_perusahaan"
                                            name="alamat_perusahaan">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="rincian_komersial">RINCIAN KOMERSIAL/NAMA USAHA TEMPAT</label>
                                        <input type="text" class="form-control" id="rincian_komersial"
                                            name="rincian_komersial">
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="waktu_buka">Waktu Buka</label>
                                        <input type="text" class="form-control" id="waktu_buka" name="waktu_buka">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="waktu_tutup">Waktu Tutup</label>
                                        <input type="text" class="form-control" id="waktu_tutup" name="waktu_tutup">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="lama_usaha">Lama Usaha</label>
                                        <input type="text" class="form-control" id="lama_usaha" name="lama_usaha">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="mulai_usaha">Mulai Usaha</label>
                                        <input type="text" class="form-control" id="mulai_usaha" name="mulai_usaha">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Loan Information Section -->
                    <div class="row mb-3">
                        <div class="col-md-12">
                            <label>LOAN PERMINTAAN DEBITUR</label>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" id="loan1" name="loan_permintaan"
                                            value="1 Tahun">
                                        <label class="form-check-label" for="loan1">1 Tahun</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" id="loan2" name="loan_permintaan"
                                            value="2 Tahun">
                                        <label class="form-check-label" for="loan2">2 Tahun</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" id="loan3" name="loan_permintaan"
                                            value="3 Tahun">
                                        <label class="form-check-label" for="loan3">3 Tahun</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" id="loan4" name="loan_permintaan"
                                            value="4 Tahun">
                                        <label class="form-check-label" for="loan4">4 Tahun</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Struktur Keluarga Section -->
                    <div class="row mb-3">
                        <div class="col-md-12">
                            <label>STRUKTUR KELUARGA & RECOMMENDATION</label>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="struktur_keluarga1"
                                            name="struktur_keluarga[]" value="Pemeriksaan Informasi Hutang">
                                        <label class="form-check-label" for="struktur_keluarga1">PEMERIKSAAN INFORMASI
                                            HUTANG</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="struktur_keluarga2"
                                            name="struktur_keluarga[]"
                                            value="Pemeriksaan Tempat Kerja & Keadaan Pekerjaan">
                                        <label class="form-check-label" for="struktur_keluarga2">PEMERIKSAAN TEMPAT
                                            KERJA & KEADAAN PEKERJAAN</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="struktur_keluarga3"
                                            name="struktur_keluarga[]" value="Pengecekan Dari Pihak Finansial">
                                        <label class="form-check-label" for="struktur_keluarga3">PENGECEKAN DARI PIHAK
                                            FINANSIAL</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Karakteristik Pemohon Section -->
                    <div class="row mb-3">
                        <div class="col-md-12">
                            <label>KARAKTERISTIK PEMOHON</label>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="lingkungan_calon_nasabah">LINGKUNGAN CALON NASABAH</label>
                                        <input type="text" class="form-control" id="lingkungan_calon_nasabah"
                                            name="lingkungan_calon_nasabah">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="kondisi_tempat_tinggal">KONDISI TEMPAT TINGGAL</label>
                                        <input type="text" class="form-control" id="kondisi_tempat_tinggal"
                                            name="kondisi_tempat_tinggal">
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="mengenal_karakter_pemohon">MENGENAL KARAKTER PEMOHON</label>
                                        <input type="text" class="form-control" id="mengenal_karakter_pemohon"
                                            name="mengenal_karakter_pemohon">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="jenis_kendaraan">JENIS KENDARAAN</label>
                                        <input type="text" class="form-control" id="jenis_kendaraan"
                                            name="jenis_kendaraan">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Notes Section -->
                    <div class="row mb-3">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="noted">NOTED</label>
                                <textarea class="form-control" id="noted" name="noted" rows="3"></textarea>
                            </div>
                        </div>
                    </div>

                    <!-- Rekomendasi Pinjaman Section -->
                    <div class="row mb-3">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="rekomendasi_pinjaman">REKOMENDASI PINJAMAN</label>
                                <input type="text" class="form-control" id="rekomendasi_pinjaman"
                                    name="rekomendasi_pinjaman">
                            </div>
                        </div>
                    </div>

                    <!-- Jumlah Tanggungan Section -->
                    <div class="row mb-3">
                        <div class="col-md-12">
                            <label>JUMLAH TANGGUNGAN PEMOHON</label>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="nama_tanggungan">NAMA LENGKAP</label>
                                        <input type="text" class="form-control" id="nama_tanggungan"
                                            name="nama_tanggungan">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="usia">USIA</label>
                                        <input type="text" class="form-control" id="usia" name="usia">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="pekerjaan_tanggungan">PEKERJAAN</label>
                                        <input type="text" class="form-control" id="pekerjaan_tanggungan"
                                            name="pekerjaan_tanggungan">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Rincian Omset Section -->
                    <div class="row mb-3">
                        <div class="col-md-12">
                            <h6>RINCIAN OMSET HARIAN & BULANAN TOKO DEBITUR</h6>
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>NO.</th>
                                            <th>NAMA CUSTOMER</th>
                                            <th>NOMINAL</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1.</td>
                                            <td><input type="text" class="form-control" name="nama_customer[]"></td>
                                            <td><input type="text" class="form-control" name="nominal[]"></td>
                                        </tr>
                                        <tr>
                                            <td>2.</td>
                                            <td><input type="text" class="form-control" name="nama_customer[]"></td>
                                            <td><input type="text" class="form-control" name="nominal[]"></td>
                                        </tr>
                                        <tr>
                                            <td>3.</td>
                                            <td><input type="text" class="form-control" name="nama_customer[]"></td>
                                            <td><input type="text" class="form-control" name="nominal[]"></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <!-- Pengeluaran Rutin Section -->
                    <div class="row mb-3">
                        <div class="col-md-12">
                            <h6>PENGELUARAN RUTIN TEMPAT USAHA</h6>
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>JENIS</th>
                                            <th>NOMINAL</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><input type="text" class="form-control" name="jenis_pengeluaran[]"></td>
                                            <td><input type="text" class="form-control" name="nominal_pengeluaran[]">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><input type="text" class="form-control" name="jenis_pengeluaran[]"></td>
                                            <td><input type="text" class="form-control" name="nominal_pengeluaran[]">
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <!-- Perhitungan Keuangan Section -->
                    <div class="row mb-3">
                        <div class="col-md-12">
                            <h6>PERHITUNGAN KEUANGAN</h6>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" id="perhitungan1"
                                            name="perhitungan_keuangan" value="Tebus">
                                        <label class="form-check-label" for="perhitungan1">TEBUS</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" id="perhitungan2"
                                            name="perhitungan_keuangan" value="Tambah Baru">
                                        <label class="form-check-label" for="perhitungan2">TAMBAH BARU</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Tenor Section -->
                    <div class="row mb-3">
                        <div class="col-md-12">
                            <h6>TENOR LAYANAN DEBITUR/NASABAH TERHITUNG SEJAK</h6>
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>BULAN</th>
                                            <th>TAHUN</th>
                                            <th>LAMA BULAN</th>
                                            <th>TAHUN</th>
                                            <th>LIMIT KREDIT</th>
                                            <th>POKOK KREDIT</th>
                                            <th>STATUS</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><input type="text" class="form-control" name="bulan_tenor"></td>
                                            <td><input type="text" class="form-control" name="tahun_tenor"></td>
                                            <td><input type="text" class="form-control" name="lama_bulan"></td>
                                            <td><input type="text" class="form-control" name="tahun_lama"></td>
                                            <td><input type="text" class="form-control" name="limit_kredit"></td>
                                            <td><input type="text" class="form-control" name="pokok_kredit"></td>
                                            <td><input type="text" class="form-control" name="status_tenor"></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <!-- Kontribusi Section -->
                    <div class="row mb-3">
                        <div class="col-md-12">
                            <h6>KONTRIBUSI NASABAH TERHADAP BSI BILA DILIHAT DARI SEMUA DEBITUR</h6>
                            <div class="form-group">
                                <input type="text" class="form-control" id="kontribusi" name="kontribusi">
                            </div>
                        </div>
                    </div>

                    <!-- Kesimpulan Section -->
                    <div class="row mb-3">
                        <div class="col-md-12">
                            <h6>KESIMPULAN TERHADAP PEMOHON BOP PORTOFOLIO NASABAH PT BANK SYARIAH INDONESIA.</h6>
                            <div class="form-group">
                                <textarea class="form-control" id="kesimpulan" name="kesimpulan" rows="4"></textarea>
                            </div>
                        </div>
                    </div>

                    <!-- Catatan Tambahan Section -->
                    <div class="row mb-3">
                        <div class="col-md-12">
                            <h6>CATATAN TAMBAHAN</h6>
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>KETERANGAN</th>
                                            <th>PERSETUJUAN</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><input type="text" class="form-control" name="keterangan_tambahan[]">
                                            </td>
                                            <td><input type="text" class="form-control" name="persetujuan_tambahan[]">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><input type="text" class="form-control" name="keterangan_tambahan[]">
                                            </td>
                                            <td><input type="text" class="form-control" name="persetujuan_tambahan[]">
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <!-- Signature Section -->
                    <div class="row mb-3">
                        <div class="col-md-12">
                            <h6>DISAHKAN OLEH</h6>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="marketing_ttd">MARKETING (TTD)</label>
                                        <input type="text" class="form-control" id="marketing_ttd" name="marketing_ttd">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="supervisor_ttd">SUPERVISOR (TTD)</label>
                                        <input type="text" class="form-control" id="supervisor_ttd"
                                            name="supervisor_ttd">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Date Section -->
                    <div class="row mb-3">
                        <div class="col-md-12 text-center">
                            <div class="form-group">
                                <label for="tanggal_ttd">TANGGAL</label>
                                <input type="date" class="form-control" id="tanggal_ttd" name="tanggal_ttd"
                                    style="width: 200px; margin: 0 auto;">
                            </div>
                        </div>
                    </div>

                    <!-- Final Section -->
                    <div class="row mb-3">
                        <div class="col-md-12">
                            <h6>ANGGOTA TIM</h6>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="ao_account">AO/ACCOUNT</label>
                                        <input type="text" class="form-control" id="ao_account" name="ao_account">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="rm_bm">RM/BM</label>
                                        <input type="text" class="form-control" id="rm_bm" name="rm_bm">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="nama_komite">NAMA KOMITE</label>
                                        <input type="text" class="form-control" id="nama_komite" name="nama_komite">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Credit Committee Section -->
                    <div class="row mb-3">
                        <div class="col-md-12">
                            <h6>ANGGOTA TIM KREDIT CABANG</h6>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" id="level1" name="credit_level"
                                            value="Level Basic">
                                        <label class="form-check-label" for="level1">LEVEL BASIC</label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" id="level2" name="credit_level"
                                            value="Level 1">
                                        <label class="form-check-label" for="level2">LEVEL 1</label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" id="level3" name="credit_level"
                                            value="Level 2">
                                        <label class="form-check-label" for="level3">LEVEL 2</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-4">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" id="level4" name="credit_level"
                                            value="Level 3">
                                        <label class="form-check-label" for="level4">LEVEL 3</label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" id="level5" name="credit_level"
                                            value="Level 4">
                                        <label class="form-check-label" for="level5">LEVEL 4</label>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" id="level6" name="credit_level"
                                            value="Level 5">
                                        <label class="form-check-label" for="level6">LEVEL 5</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <div class="row mt-4">
                        <div class="col-md-12 text-center">
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <button type="reset" class="btn btn-secondary">Reset</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- [ Main Content ] end -->
@endsection