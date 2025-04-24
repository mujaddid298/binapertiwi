@extends('layouts.app')

@section('title', 'Form Nota Aplikasi Kredit')

@section('content')
<div class="page-header">
    <div class="page-block">
        <div class="row align-items-center">
            <div class="col-md-12">
                <div class="page-header-title">
                    <h5 class="m-b-10">Form Pengajuan Kredit</h5>
                </div>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item" aria-current="page">Form NAK</li>
                </ul>
            </div>
        </div>
    </div>
</div>

<!-- [ Main Content ] start -->
<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header">
<div class="container p-4" style="font-size: 13px;  ">
    <h5 class="text-center mb-3">NOTA APLIKASI KREDIT PKPS</h5>
    <table class="table ">
        <tr>
            <td><strong>CABANG</strong></td>
            <td><input type="text" class="form-control"></td>
            <td><strong>TANGGAL</strong></td>
            <td><input type="date" class="form-control"></td>
            <td><strong>Nama BC</strong></td>
            <td><input type="text" class="form-control"></td>
        </tr>
    </table>
                <h4 class="text-center fw-bold">FORM NOTA APLIKASI KREDIT </h4>
            </div>
            <div class="card-body">
                <form action="#" method="POST">
                    @csrf
                    <!-- Top Section -->
                    <div class="row mb-3">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="nama_bc">NAMA BC</label>
                                <input type="text" class="form-control" id="nama_bc" name="nama_bc">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="cabang">CABANG</label>
                                <select class="form-control" id="cabang" name="cabang">
                                    <option value="">Pilih Cabang</option>
                                    <option value="pekanbaru">Pekanbaru</option>
                                    <option value="pelembang">Pelembang</option>
                                    <option value="tanjunenim">Tanjun Enim</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="tanggal">TANGGAL</label>
                                <input type="date" class="form-control" id="tanggal" name="tanggal">
                            </div>
                        </div>
                    </div>
                    <!-- Personal Information Section -->
                    <div class="row mb-3">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="nama">NAMA CUSTOMER</label>
                                <input type="text" class="form-control" id="nama" name="nama">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="telepon">BIDANG USAHA</label>
                                <input type="text" class="form-control" id="telepon" name="telepon">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="nama">GROUP PERUSAHAAN</label>
                                <input type="text" class="form-control" id="nama" name="nama">
                            </div>
                        </div>
                    </div>
    <h6 class="mt-4">PERUSAHAAN PELANGGAN</h6>
    <table class="table ">
        <tr>
            <td><strong>NAMA</strong></td>
            <td colspan="4"><input type="text" class="form-control"></td>
            <td><strong>BIDANG USAHA</strong></td>
            <td><input type="text" class="form-control"></td>
        </tr>
        <tr>
            <td><strong>ALAMAT</strong></td>
            <td colspan="4"><input type="text" class="form-control"></td>
            <td><strong>GROUP PERUSAHAAN</strong></td>
            <td><input type="text" class="form-control"></td>

        </tr>
        <tr>
            <td><strong>PENANGGUNG JAWAB</strong></td>
            <td colspan="3"><input type="text" class="form-control"></td>
            <td><strong>INDUSTRY</strong></td>
            <td colspan="8">
                <label><input type="checkbox"> Oil & Gas </label>
                <label><input type="checkbox"> Mining </label>
                <label><input type="checkbox"> Electricity (PN)</label>
                <label><input type="checkbox"> Construction </label>
                <label><input type="checkbox"> Property </label>
                <label><input type="checkbox"> Transportasi </label>
                <label><input type="checkbox"> Fishery </label>
                <label><input type="checkbox"> Banking </label>
                <label><input type="checkbox"> Agro </label>
            </td>

        </tr>
    </table>

    <h6 class="mt-4">PENGAJUAN KREDIT</h6>
    <table class="table ">
        <tr>
            <td><strong>NILAI KREDIT</strong></td>
            <td><input type="text" class="form-control"></td>
            <td><strong>TERM OF PAYMENT</strong></td>
            <td><input type="text" class="form-control"></td>
        </tr>
        <tr>
            <td><strong>BUNGA</strong></td>
            <td><input type="text" class="form-control"></td>
            <td><strong>JAMINAN</strong></td>
            <td>
                <label><input type="checkbox"> Transfer</label>
                <label><input type="checkbox"> Bank Garansi</label>
                <label><input type="checkbox"> Deposito</label>
            </td>
        </tr>
    </table>

    <h6 class="mt-4">KARAKTER PERUSAHAAN</h6>
    <table class="table ">
        <tr>
            <td><strong>BENTUK PERUSAHAAN</strong></td>
            <td colspan="4">
                <label><input type="checkbox"> Perseroan Terbatas</label>
                <label><input type="checkbox"> Firma (FA)</label>
                <label><input type="checkbox"> Perusahaan Negara (PN)</label>
                <label><input type="checkbox"> Perusahaan Komanditer (CV)</label>
                <label><input type="checkbox"> Perorangan</label>
                <label><input type="checkbox"> Lain-lain: <input type="text" class="form-control"
                        style="width: 200px; display:inline-block;"></label>
            </td>
        </tr>
    </table>
    <table class="table ">
        <tr>
            <td><strong>WAKTU DIDIRIKAN</strong></td>
            <td><input type="text" class="form-control"></td>
            <td><strong>DOMISILI</strong></td>
            <td><input type="text" class="form-control"></td>
        </tr>
        <tr>
            <td><strong>NOMOR AKTE PENDIRIAN</strong></td>
            <td><input type="text" class="form-control"></td>
            <td><strong>NOTARIS</strong></td>
            <td><input type="text" class="form-control"></td>
        </tr>
        <tr>
            <td><strong>AKTE PERUBAHAN</strong></td>
            <td><input type="text" class="form-control"></td>
            <td colspan="2"></td>
        </tr>
        <tr>
            <td><strong>PENGESAHAN</strong></td>
            <td><input type="text" class="form-control"></td>
            <td colspan="2"></td>
        </tr>
        <tr>
            <td><strong>MODAL DASAR</strong></td>
            <td colspan="2">Rp <input type="text" class="form-control"></td>
            <td><strong>MODAL DISETOR</strong></td>
            <td>Rp <input type="text" class="form-control"></td>
        </tr>
    </table>
    <table border="1" width="100%" cellspacing="0" cellpadding="5">
        <tr>
            <th colspan="4">LAMA PERUSAHAAN BEROPERASI DIBIDANG USAHANYA</th>
        </tr>
        <tr>
            <td><input type="checkbox"> &lt; 1 THN</td>
            <td><input type="checkbox"> 0 - 5 THN</td>
            <td><input type="checkbox"> 5 - 10 THN</td>
            <td><input type="checkbox"> &gt; 10 TH</td>
        </tr>
        <tr>
            <th colspan="4">STRUKTUR ORGANISASI & MANAGEMENT</th>
        </tr>
        <tr>
            <td colspan="4"><input type="checkbox"> KEPUTUSAN DITANGAN SEORANG ................................</td>
        </tr>
        <tr>
            <td colspan="4"><input type="checkbox"> DIREKSI TERDIRI DARI ANGGOTA KELUARGA</td>
        </tr>
        <tr>
            <td colspan="4"><input type="checkbox"> MANAGEMENT PROFESIONAL</td>
        </tr>
    </table>

    <h6 class="mt-4">KAPITAL PERUSAHAAN</h6>
    <table class="table ">
        <tr>
            <td><strong>RATA-RATA PER BULAN</strong></td>
            <td><input type="text" class="form-control"></td>
        </tr>
        <tr>
            <td><strong>JUMLAH HASIL PENJUALAN PER TAHUN</strong></td>
            <td><input type="text" class="form-control"></td>
        </tr>
    </table>


                    <!-- Jenis Kredit Section -->
                    <div class="row mb-3">
                        <div class="col-md-12">
                            <!-- <label>JENIS KREDIT</label> -->
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="nilai_kredit">NILAI KREDIT</label>
                                        <input type="text" class="form-control" id="nilai_kredit" name="nilai_kredit">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="bunga">BUNGA</label>
                                        <input type="text" class="form-control" id="bunga" name="bunga">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="bayar">TERM OF PAYMENT</label>
                                        <input type="text" class="form-control" id="bayar" name="bayar">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <label>JAMINAN :</label>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" id="jaminan1" name="jaminan"
                                            value="Transfer">
                                        <label class="form-check-label" for="jaminan1">Transfer</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" id="jaminan2" name="jaminan"
                                            value="Bank Garansi">
                                        <label class="form-check-label" for="jaminan2">Bank Garansi</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" id="jaminan3" name="jaminan"
                                            value="Deposito">
                                        <label class="form-check-label" for="jaminan3">Deposito</label>
                                    </div>
                                </div>
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
                            <h4>RIWAYAT KEUANGAN</h4>
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
                            <h4>ALAMAT PERUSAHAAN</h4>
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
                            <h4>KARAKTERISTIK PEMOHON</h4>
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
                            <h4>JUMLAH TANGGUNGAN PEMOHON</h4>
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
                                <table class="table ">
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
                                <table class="table ">
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
                                <table class="table ">
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
                                <table class="table ">
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

    <h6 class="mt-4">FASILITAS YANG DIMILIKI</h6>
    <table class="table ">
        <tr>
            <th>NO</th>
            <th>FASILITAS</th>
            <th>JUMLAH</th>
            <th>KETERANGAN</th>
        </tr>
        @for($i = 1; $i <= 5; $i++) <tr>
            <td>{{ $i }}</td>
            <td><input type="text" class="form-control"></td>
            <td><input type="text" class="form-control"></td>
            <td><input type="text" class="form-control"></td>
            </tr>
            @endfor
    </table>

</div>
@endsection