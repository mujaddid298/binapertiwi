@extends('layouts.bc.app')

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
                <h4 class="text-center fw-bold">FORM NOTA APLIKASI KREDIT </h4>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.storeformnak') }}" method="POST">
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
                    <h4 class="mt-4">CUSTOMER</h4>
                    <hr>
                    <div class="row mb-3">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="namacust">Nama Customer</label>
                                <input type="text" class="form-control" id="namacust" name="namacust">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="bid-usaha">Bidang Usaha</label>
                                <input type="text" class="form-control" id="bid-usaha" name="bid-usaha">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="group">Group Perusahaan</label>
                                <input type="text" class="form-control" id="group" name="group">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="penanggung_jawab">Penanggung Jawab</label>
                                <input type="text" class="form-control" id="penanggung_jawab" name="penanggung_jawab">
                            </div>
                        </div>
                    </div>
                    <div class="float-right">
                        <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <textarea class="form-control" id="alamat" name="alamat" rows="3" style="height: 100px;"
                                placeholder="Masukkan alamat customer"></textarea>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label for="industry">Industry</label>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="Oil & Gas" id="oil_gas"
                                    name="industry[]">
                                <label class="form-check-label" for="oil_gas">
                                    Oil & Gas
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="Mining" id="mining"
                                    name="industry[]">
                                <label class="form-check-label" for="mining">
                                    Mining
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="Electricity (PN)"
                                    id="electricity" name="industry[]">
                                <label class="form-check-label" for="electricity">
                                    Electricity (PN)
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="Construction" id="construction"
                                    name="industry[]">
                                <label class="form-check-label" for="construction">
                                    Construction
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="Property" id="property"
                                    name="industry[]">
                                <label class="form-check-label" for="property">
                                    Property
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="Transportasi" id="transportasi"
                                    name="industry[]">
                                <label class="form-check-label" for="transportasi">
                                    Transportasi
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="Fishery" id="fishery"
                                    name="industry[]">
                                <label class="form-check-label" for="fishery">
                                    Fishery
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="Banking" id="banking"
                                    name="industry[]">
                                <label class="form-check-label" for="banking">
                                    Banking
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="Agro" id="agro"
                                    name="industry[]">
                                <label class="form-check-label" for="agro">
                                    Agro
                                </label>
                            </div>
                        </div>


                        <h4 class="mt-4">PENGAJUAN KREDIT</h4>
                        <hr>
                        <div class="form-group">
                            <label for="nilai_kredit">Nilai kredit</label>
                            <input type="text" class="form-control" id="nilai_kredit">
                        </div>

                        <h5 for="term_of_payment">TERM OF PAYMENT</h5>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="bunga">Bunga</label>
                                    <input type="text" class="form-control" id="bunga">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="jaminan">Jaminan</label>
                                    <div>
                                        <div class="mb-2">
                                            <input type="radio" id="transfer" name="jaminan" value="Transfer">
                                            <label for="transfer">Transfer</label>
                                        </div>
                                        <div class="mb-2">
                                            <input type="radio" id="bank_garansi" name="jaminan" value="Bank Garansi">
                                            <label for="bank_garansi">Bank Garansi</label>
                                        </div>
                                        <div class="mb-2">
                                            <input type="radio" id="deposito" name="jaminan" value="Deposito">
                                            <label for="deposito">Deposito</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <h4 class="mt-4">KARAKTER PERUSAHAAN</h4>
                        <hr>
                        <div class="form-group">
                            <label for="bentuk_perusahaan">Bentuk Perusahaan</label>
                            <div class="form-check mb-2">
                                <input class="form-check-input" type="checkbox" id="pt" name="bentuk_perusahaan[]">
                                <label class="form-check-label" for="pt">Perseroan Terbatas</label>
                            </div>
                            <div class="form-check mb-2">
                                <input class="form-check-input" type="checkbox" id="fa" name="bentuk_perusahaan[]">
                                <label class="form-check-label" for="fa">Firma (FA)</label>
                            </div>
                            <div class="form-check mb-2">
                                <input class="form-check-input" type="checkbox" id="pn" name="bentuk_perusahaan[]">
                                <label class="form-check-label" for="pn">Perusahaan Negara (PN)</label>
                            </div>
                            <div class="form-check mb-2">
                                <input class="form-check-input" type="checkbox" id="cv" name="bentuk_perusahaan[]">
                                <label class="form-check-label" for="cv">Perusahaan Komanditer (CV)</label>
                            </div>
                            <div class="form-check mb-2">
                                <input class="form-check-input" type="checkbox" id="perorangan"
                                    name="bentuk_perusahaan[]">
                                <label class="form-check-label" for="perorangan">Perorangan</label>
                            </div>
                            <div class="form-check mb-2">
                                <input class="form-check-input" type="checkbox" id="lain-lain"
                                    name="bentuk_perusahaan[]">
                                <input type="text" class="form-control" id="lain-lain-text"
                                    style="width: 400px; display:inline-block;" name="lain-lain-text"
                                    placeholder="Lain-lain" onchange="updateLainLainValue(this)">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="waktu_didirikan" class="col-sm-2 col-form-label">Waktu Didirikan</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="waktu_didirikan" name="waktu_didirikan">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="domisili" class="col-sm-2 col-form-label">Domisili</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="domisili" name="domisili">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="nomor_akte_pendirian" class="col-sm-2 col-form-label">Nomor Akte
                                Pendirian</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="nomor_akte_pendirian"
                                    name="nomor_akte_pendirian">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="notaris" class="col-sm-2 col-form-label">Notaris</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="notaris" name="notaris">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="akte_perubahan" class="col-sm-2 col-form-label">Akte Perubahan</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="akte_perubahan" name="akte_perubahan">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="pengesahan" class="col-sm-2 col-form-label">Pengesahan</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="pengesahan" name="pengesahan">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="modal_dasar" class="col-sm-2 col-form-label">Modal Dasar</label>
                            <div class="col-sm-10">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Rp</span>
                                    </div>
                                    <input type="text" class="form-control" id="modal_dasar" name="modal_dasar">
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="modal_disetor" class="col-sm-2 col-form-label">Modal Setor</label>
                            <div class="col-sm-10">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text">Rp</span>
                                    </div>
                                    <input type="text" class="form-control" id="modal_disetor" name="modal_disetor">
                                </div>
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col-md-12">
                                <h6 class="mb-3">Lama Perusahaan Beroperasi Dibidang Usahanya</h6>
                                <div class="form-check form-check-inline mb-3">
                                    <input class="form-check-input" type="radio" id="lama1" name="lama"
                                        value="&lt; 1 THN">
                                    <label class="form-check-label" for="lama1">&lt; 1 THN</label>
                                </div>
                                <div class="form-check form-check-inline mb-3">
                                    <input class="form-check-input" type="radio" id="lama2" name="lama"
                                        value="0 - 5 THN">
                                    <label class="form-check-label" for="lama2">0 - 5 THN</label>
                                </div>
                                <div class="form-check form-check-inline mb-3">
                                    <input class="form-check-input" type="radio" id="lama3" name="lama"
                                        value="5 - 10 THN">
                                    <label class="form-check-label" for="lama3">5 - 10 THN</label>
                                </div>
                                <div class="form-check form-check-inline mb-3">
                                    <input class="form-check-input" type="radio" id="lama4" name="lama"
                                        value="&gt; 10 TH">
                                    <label class="form-check-label" for="lama4">&gt; 10 TH</label>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col-md-12">
                                <h6 class="mb-3">Struktur Organisasi & Management</h6>
                                <div class="form-check mb-3">
                                    <input class="form-check-input" type="radio" id="struktur2" name="struktur"
                                        value="Direksi Terdiri Dari Anggota Keluarga">
                                    <label class="form-check-label" for="struktur2">Direksi Terdiri Dari Anggota
                                        Keluarga</label>
                                </div>
                                <div class="form-check mb-3">
                                    <input class="form-check-input" type="radio" id="struktur3" name="struktur"
                                        value="Management Profesional">
                                    <label class="form-check-label" for="struktur3">Management Profesional</label>
                                </div>
                                <div class="form-check mb-3">
                                    <input class="form-check-input" type="radio" id="struktur1" name="struktur"
                                        value="Keputusan Ditangan Seorang">
                                    <label class="form-check-label" for="struktur1">Keputusan Ditangan Seorang
                                        <input type="text" class="form-control" name="pemegang_keputusan"
                                            placeholder="Nama pemegang keputusan">
                                    </label>
                                </div>
                            </div>
                        </div>

                        <h4 class="mt-4">KAPITAL PERUSAHAAN</h4>
                        <hr>
                        <h5 class="text-center m-3">HASIL PENJUALAN</h5>
                        <div class="form-group row">
                            <label for="rata_rata_per_bulan" class="col-sm-2 col-form-label">Rata-Rata Per Bulan</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="rata_rata_per_bulan"
                                    name="rata_rata_per_bulan">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="jumlah_hasil_penjualan_per_tahun" class="col-sm-2 col-form-label">Jumlah Per
                                Tahun</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="jumlah_hasil_penjualan_per_tahun"
                                    name="jumlah_hasil_penjualan_per_tahun">
                            </div>
                        </div>

                        <h5 class="text-center"> CARA PEMBAYARAN ATAS PEKERJAAN YANG TELAH SELESAI</h5>

                        <div class="row mb-3">
                            <div class="col-md-12">
                                <div class="form-check mb-2">
                                    <input class="form-check-input" type="radio" name="cara_pembayaran" id="tunai"
                                        value="TUNAI">
                                    <label class="form-check-label" for="tunai">
                                        Tunai
                                    </label>
                                </div>
                                <div class="form-check mb-2">
                                    <input class="form-check-input" type="radio" name="cara_pembayaran"
                                        id="prestasi_kerja" value="ATAS DASAR PRESTASI KERJA">
                                    <label class="form-check-label" for="prestasi_kerja">
                                        Atas Dasar Prestasi Kerja
                                    </label>
                                </div>
                                <div class="form-check mb-2">
                                    <input class="form-check-input" type="radio" name="cara_pembayaran" id="kredit"
                                        value="KREDIT">
                                    <label class="form-check-label" for="kredit">
                                        Kredit
                                    </label>
                                    <div id="kredit_term_container"
                                        style="display: none; margin-left: 20px; margin-top: 10px;">
                                        <div class="form-group">
                                            <label for="kredit_term">Kredit Term</label>
                                            <input type="number" class="form-control" id="kredit_term"
                                                name="kredit_term" placeholder="Masukkan kredit term">
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <h5 class="text-center"> MODEL TRANSAKSI PERUSAHAAN DENGAN CUSTOMERNYA</h5>
                        <div class="form-group row">
                            <label for="jenis_pembayaran" class="col-sm-12 col-form-label">Jenis Pembayaran</label>
                            <div class="col-sm-10">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="jenis_pembayaran"
                                        id="penjualan_lokal" value="PENJUALAN LOKAL">
                                    <label class="form-check-label" for="penjualan_lokal">
                                        Penjualan Lokal
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="jenis_pembayaran" id="ekspor"
                                        value="EKSPOR">
                                    <label class="form-check-label" for="ekspor">
                                        Ekspor
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="jenis_pembayaran"
                                        id="melalui_bank_exim" value="MELALUI BANK EXIM">
                                    <label class="form-check-label" for="melalui_bank_exim">
                                        Melalui Bank Exim
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="jenis_pembayaran"
                                        id="proyek_pemerintah" value="PROYEK PEMERINTAH">
                                    <label class="form-check-label" for="proyek_pemerintah">
                                        Proyek Pemerintah
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="jenis_pembayaran"
                                        id="swasta_sektor_proyek" value="SWASTA SEKTOR PROYEK / BIDANG">
                                    <label class="form-check-label" for="swasta_sektor_proyek">
                                        Swasta Sektor Proyek / Bidang
                                    </label>
                                    <div id="swasta_sektor_container"
                                        style="display: none; margin-left: 20px; margin-top: 10px;">
                                        <div class="form-group">
                                            <label for="nama_proyek">Nama Proyek/Bidang</label>
                                            <input type="text" class="form-control" id="nama_proyek" name="nama_proyek"
                                                placeholder="Masukkan nama proyek/bidang">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <h5 class="text-center"> FASILITAS YANG DIMILIKI ( TERMASUK KANTOR, PABRIK, JUMLAH PEGAWAI, DLL
                            )</h5>
                        <div class="row mb-3">
                            <div class="col-md-12">
                                <h5>TAMBAHAN JUMLAH</h5>
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Fasilitas</th>
                                            <th>Jumlah</th>
                                            <th>Keterangan</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody id="jumlah-tambah">
                                        <tr>
                                            <td>1</td>
                                            <td><input type="text" class="form-control" name="nama_tambah[]"></td>
                                            <td><input type="number" class="form-control" name="jumlah_tambah[]"></td>
                                            <td><input type="text" class="form-control" name="keterangan_tambah[]"></td>
                                            <td><button type="button" class="btn btn-danger"
                                                    onclick="removeRow(this)">Hapus</button></td>
                                        </tr>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td colspan="4">
                                                <button type="button" class="btn btn-green" onclick="addRow()">Tambah
                                                    Baris</button>
                                            </td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>

                        <h5 class="text-center"> HUBUNGAN DENGAN LEMBAGA KEUANGAN DAN BANK</h5>
                        <div class="row mb-3">
                            <div class="col-md-12">
                                <h5>TAMBAHAN JUMLAH</h5>
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Lembaga</th>
                                            <th>Deskripsi</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody id="lembaga-tambah">
                                        <tr>
                                            <td>1</td>
                                            <td><input type="text" class="form-control" name="nama_lembaga[]"></td>
                                            <td><input type="text" class="form-control" name="deskripsi[]"></td>
                                            <td><button type="button" class="btn btn-danger"
                                                    onclick="removeLembagaRow(this)">Hapus</button></td>
                                        </tr>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td colspan="3">
                                                <button type="button" class="btn btn-green"
                                                    onclick="addLembagaRow()">Tambah Baris</button>
                                            </td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                        <div class=""></div>



                        <h4 class="mt-4">HASIL PENGECEKAN REPUTASI</h4>
                        <hr>
                        <div class="row mb-3">
                            <div class="col-md-12">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Sumber Informasi</th>
                                            <th>Hubungan</th>
                                            <th>Hasil Pengecekan</th>
                                        </tr>
                                    </thead>
                                    <tbody id="reputasi-tambah">
                                        <tr>
                                            <td><input type="text" class="form-control" name="sumber_informasi[]"></td>
                                            <td><input type="text" class="form-control" name="hubungan[]"></td>
                                            <td><input type="text" class="form-control" name="hasil_pengecekan[]"></td>
                                        </tr>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td colspan="3">
                                                <button type="button" class="btn btn-green"
                                                    onclick="addReputasiRow()">Tambah Baris</button>
                                            </td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="level_persetujuan">Level Persetujuan</label>
                            <input type="hidden" name="level_persetujuan" value="1">
                        </div>
                        <h4 class="mt-4">KOMENTAR TRANSAKSI PEMBELIAN DAN HUBUNGAN DAGANG DENGAN PT. BINA PERTIWI
                            SEBELUMNYA</h4>
                        <hr>
                        <div class="form-group">
                            <label for="komentar">Komentar</label>
                            <textarea class="form-control" id="komentar" name="komentar" rows="4"
                                placeholder="Masukkan komentar mengenai transaksi pembelian dan hubungan dagang"></textarea>
                        </div>
                        <h4 class="mt-4">PIUTANG AR (IDR) PER TANGGAL</h4>
                        <hr>
                        <div class="form-group">
                            <label for="tanggal_piutang">Tanggal</label>
                            <input type="date" class="form-control" id="tanggal_piutang" name="tanggal_piutang">
                        </div>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Sales Org</th>
                                    <th>Grand Tot</th>
                                    <th>CURRENT</th>
                                    <th>1 - 30</th>
                                    <th>31 - 60</th>
                                    <th>61 - 90</th>
                                    <th>91 - 120</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>UNIT</td>
                                    <td><input type="text" class="form-control" name="grand_tot_unit"></td>
                                    <td><input type="text" class="form-control" name="current_unit"></td>
                                    <td><input type="text" class="form-control" name="1_30_unit"></td>
                                    <td><input type="text" class="form-control" name="31_60_unit"></td>
                                    <td><input type="text" class="form-control" name="61_90_unit"></td>
                                    <td><input type="text" class="form-control" name="91_120_unit"></td>
                                </tr>
                                <tr>
                                    <td>RENT</td>
                                    <td><input type="text" class="form-control" name="grand_tot_rent"></td>
                                    <td><input type="text" class="form-control" name="current_rent"></td>
                                    <td><input type="text" class="form-control" name="1_30_rent"></td>
                                    <td><input type="text" class="form-control" name="31_60_rent"></td>
                                    <td><input type="text" class="form-control" name="61_90_rent"></td>
                                    <td><input type="text" class="form-control" name="91_120_rent"></td>
                                </tr>
                                <tr>
                                    <td>PART</td>
                                    <td><input type="text" class="form-control" name="grand_tot_part"></td>
                                    <td><input type="text" class="form-control" name="current_part"></td>
                                    <td><input type="text" class="form-control" name="1_30_part"></td>
                                    <td><input type="text" class="form-control" name="31_60_part"></td>
                                    <td><input type="text" class="form-control" name="61_90_part"></td>
                                    <td><input type="text" class="form-control" name="91_120_part"></td>
                                </tr>
                                <tr>
                                    <td>SERV</td>
                                    <td><input type="text" class="form-control" name="grand_tot_serv"></td>
                                    <td><input type="text" class="form-control" name="current_serv"></td>
                                    <td><input type="text" class="form-control" name="1_30_serv"></td>
                                    <td><input type="text" class="form-control" name="31_60_serv"></td>
                                    <td><input type="text" class="form-control" name="61_90_serv"></td>
                                    <td><input type="text" class="form-control" name="91_120_serv"></td>
                                </tr>
                                <tr>
                                    <td><strong>Grand Total</strong></td>
                                    <td><input type="text" class="form-control" name="grand_tot_total"></td>
                                    <td><input type="text" class="form-control" name="current_total"></td>
                                    <td><input type="text" class="form-control" name="1_30_total"></td>
                                    <td><input type="text" class="form-control" name="31_60_total"></td>
                                    <td><input type="text" class="form-control" name="61_90_total"></td>
                                    <td><input type="text" class="form-control" name="91_120_total"></td>
                                </tr>
                            </tbody>
                        </table>
                        <h4 class="mt-4">PENGALAMAN PEMBAYARAN ANGSURAN KREDIT KE PT BINA PERTIWI</h4>
                        <hr>
                        <div class="form-group">
                            <label for="pengalaman_pembayaran">Pengalaman Pembayaran</label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" id="baik" name="pengalaman_pembayaran"
                                    value="Baik">
                                <label class="form-check-label" for="baik">
                                    Baik
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" id="sedang" name="pengalaman_pembayaran"
                                    value="Sedang">
                                <label class="form-check-label" for="sedang">
                                    Sedang
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" id="tidak_baik"
                                    name="pengalaman_pembayaran" value="Tidak Baik">
                                <label class="form-check-label" for="tidak_baik">
                                    Tidak Baik
                                </label>
                            </div>
                        </div>
                        <h4 class="mt-4">ANALISA KEBUTUHAN SUKU CADANG</h4>
                        <hr>
                        <div class="row mb-3">
                            <div class="col-md-12">
                                <h5>TAMBAHAN JUMLAH</h5>
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>MODEL ALAT</th>
                                            <th>Tahun Buat</th>
                                            <th>JUMLAH</th>
                                            <th>LOKASI</th>
                                            <th>PERHITUNGAN KEBUTUHAN SPARE PART PER BULAN</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody id="suku-cadang-tambah">
                                        <tr>
                                            <td><input type="text" class="form-control" name="model_alat[]"></td>
                                            <td><input type="text" class="form-control" name="tahun_buat[]"></td>
                                            <td><input type="number" class="form-control" name="jumlah[]"></td>
                                            <td><input type="text" class="form-control" name="lokasi[]"></td>
                                            <td><input type="text" class="form-control" name="perhitungan_spare_part[]">
                                            </td>
                                            <td><button type="button" class="btn btn-danger"
                                                    onclick="removeSukuCadangRow(this)">Hapus</button></td>
                                        </tr>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td colspan="5">
                                                <button type="button" class="btn btn-green"
                                                    onclick="addSukuCadangRow()">Tambah Baris</button>
                                            </td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                        <h4 class="mt-4">KONDISI DAN ISU-ISU MAKRO</h4>
                        <hr>
                        <div class="form-group">
                            <label for="kondisi_isu_makro">Deskripsi Kondisi dan Isu-isu Makro</label>
                            <textarea class="form-control" id="kondisi_isu_makro" name="kondisi_isu_makro" rows="4"
                                placeholder="Masukkan deskripsi mengenai kondisi dan isu-isu makro"></textarea>
                        </div>
                        <h4 class="mt-4">KOMENTAR DARI BC</h4>
                        <hr>
                        <div class="form-group">
                            <label for="komentar_bc">Komentar</label>
                            <textarea class="form-control" id="komentar_bc" name="komentar_bc" rows="4"
                                placeholder="Masukkan komentar dari BC"></textarea>
                        </div>
                        <h4 class="mt-4">EVALUASI KOMITE KREDIT DI CABANG</h4>
                        <hr>
                        <div class="form-group">
                            <label for="komentar_boh">Komentar BOH/KAPERWA/ROH</label>
                            <p id="komentar_boh">Contoh komentar dari BOH/KAPERWA/ROH.</p>
                        </div>
                        <div class="form-group">
                            <label for="komentar_adh">Komentar ADH/BAS</label>
                            <p id="komentar_adh">Contoh komentar dari ADH/BAS.</p>
                        </div>
                        <div class="form-group">
                            <label for="komentar_msdh">Komentar MSDH/MSRH</label>
                            <p id="komentar_msdh">Contoh komentar dari MSDH/MSRH.</p>
                        </div>


                        <h4 class="mt-4">LAMPIRAN / DATA PENDUKUNG</h4>
                        <hr>
                        <div class="form-group">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="akte_pendirian" name="lampiran[]"
                                    value="Akte Pendirian">
                                <label class="form-check-label" for="akte_pendirian">Akte Pendirian</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="cash_flow" name="lampiran[]"
                                    value="Cash Flow">
                                <label class="form-check-label" for="cash_flow">Cash Flow</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="neraca_dan_rugi_laba"
                                    name="lampiran[]" value="Neraca & Daftar Rugi Laba">
                                <label class="form-check-label" for="neraca_dan_rugi_laba">Neraca & Daftar Rugi
                                    Laba</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="kontrak_spk" name="lampiran[]"
                                    value="Kontrak / SPK">
                                <label class="form-check-label" for="kontrak_spk">Kontrak / SPK</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="siup_situ" name="lampiran[]"
                                    value="SIUP/SITU">
                                <label class="form-check-label" for="siup_situ">SIUP/SITU</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="tdp" name="lampiran[]" value="TDP">
                                <label class="form-check-label" for="tdp">TDP</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="npwp_skt_sppkp" name="lampiran[]"
                                    value="NPWP, SKT, SPPKP">
                                <label class="form-check-label" for="npwp_skt_sppkp">NPWP, SKT, SPPKP</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="ktp" name="lampiran[]" value="KTP">
                                <label class="form-check-label" for="ktp">KTP</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="rekening_koran" name="lampiran[]"
                                    value="Rekening Koran">
                                <label class="form-check-label" for="rekening_koran">Rekening Koran</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="bank_garansi" name="lampiran[]"
                                    value="Bank Garansi">
                                <label class="form-check-label" for="bank_garansi">Bank Garansi</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="skdp_sktu" name="lampiran[]"
                                    value="SKDP/SKTU">
                                <label class="form-check-label" for="skdp_sktu">SKDP/SKTU</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="lain_lain" name="lampiran[]"
                                    value="Lain-lain">
                                <label class="form-check-label" for="lain_lain">Lain-lain (diperinci)</label>
                            </div>
                        </div>


                        <h4 class="mt-4"> NILAI KREDIT
                            YANG DISETUJUI </h4>
                        <hr>
                        <div class="form-group">
                            <label for="nilai_kredit">Nilai kredit</label>
                            <input type="text" class="form-control" id="nilai_kredit">
                        </div>

                        <h5 for="term_of_payment">TERM OF PAYMENT</h5>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="bunga">Bunga</label>
                                    <input type="text" class="form-control" id="bunga">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="jaminan">Jaminan</label>
                                    <div>
                                        <div class="mb-2">
                                            <input type="radio" id="transfer" name="jaminan" value="Transfer">
                                            <label for="transfer">Transfer</label>
                                        </div>
                                        <div class="mb-2">
                                            <input type="radio" id="bank_garansi" name="jaminan" value="Bank Garansi">
                                            <label for="bank_garansi">Bank Garansi</label>
                                        </div>
                                        <div class="mb-2">
                                            <input type="radio" id="deposito" name="jaminan" value="Deposito">
                                            <label for="deposito">Deposito</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <h4 class="mt-4"> PERSETUJUAN</h4>
                        <hr>
                        <div class="form-group">
                            <label for="komite_kredit">KOMITE KREDIT</label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" id="disetujui" name="komite_kredit"
                                    value="Disetujui">
                                <label class="form-check-label" for="disetujui">Disetujui</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" id="disetujui_dengan_syarat"
                                    name="komite_kredit" value="Disetujui dengan Syarat">
                                <label class="form-check-label" for="disetujui_dengan_syarat">Disetujui dengan Syarat
                                    (Lihat Notulen Rapat)</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" id="ditolak" name="komite_kredit"
                                    value="Ditolak">
                                <label class="form-check-label" for="ditolak">Ditolak</label>
                            </div>
                        </div>

                        <h4 class="mt-4">TANDA TANGAN</h4>
                        <hr>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>BM</th>
                                    <th>ADH</th>
                                    <th>MSRH</th>
                                    <th>CAR</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><img src="path/to/default-signature.png" alt="Tanda Tangan BM"
                                            style="width: 100px; height: auto;"></td>
                                    <td><img src="path/to/default-signature.png" alt="Tanda Tangan ADH"
                                            style="width: 100px; height: auto;"></td>
                                    <td><img src="path/to/default-signature.png" alt="Tanda Tangan MSRH"
                                            style="width: 100px; height: auto;"></td>
                                    <td><img src="path/to/default-signature.png" alt="Tanda Tangan CAR"
                                            style="width: 100px; height: auto;"></td>
                                </tr>
                            </tbody>
                        </table>



                        <h4 class="mt-4">EVALUASI KOMITE KREDIT HO (>100JT)</h4>
                        <hr>

                        <div class="form-group">
                            <label for="komentar_direktur_admin_support">Komentar DIREKTUR ADMIN & SUPPORT</label>
                            <p id="komentar_direktur_admin_support">Contoh komentar dari DIREKTUR ADMIN & SUPPORT.</p>
                        </div>

                        <div class="form-group">
                            <label for="komentar_direktur_sales_operation">Komentar DIREKTUR SALES AND OPERATION</label>
                            <p id="komentar_direktur_sales_operation">Contoh komentar dari DIREKTUR SALES AND OPERATION.
                            </p>
                        </div>

                        <div class="form-group">
                            <label for="komentar_admin_support_head">Komentar ADMIN AND SUPPORT DIVISION HEAD</label>
                            <p id="komentar_admin_support_head">Contoh komentar dari ADMIN AND SUPPORT DIVISION HEAD.
                            </p>
                        </div>

                        <div class="form-group">
                            <label for="komentar_sales_operation_head">Komentar SALES AND OPERATION DIVISION
                                HEAD</label>
                            <p id="komentar_sales_operation_head">Contoh komentar dari SALES AND OPERATION DIVISION
                                HEAD.</p>
                        </div>

                        <h4 class="mt-4"> PERSETUJUAN</h4>
                        <hr>
                        <div class="form-group">
                            <label for="komite_kredit">KOMITE KREDIT</label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" id="disetujui" name="komite_kredit"
                                    value="Disetujui">
                                <label class="form-check-label" for="disetujui">Disetujui</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" id="disetujui_dengan_syarat"
                                    name="komite_kredit" value="Disetujui dengan Syarat">
                                <label class="form-check-label" for="disetujui_dengan_syarat">Disetujui dengan Syarat
                                    (Lihat Notulen Rapat)</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" id="ditolak" name="komite_kredit"
                                    value="Ditolak">
                                <label class="form-check-label" for="ditolak">Ditolak</label>
                            </div>
                        </div>

                        <h4 class="mt-4">TANDA TANGAN</h4>
                        <hr>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>DIREKTUR ADMIN & SUPPORT</th>
                                    <th>DIREKTUR SALES & OPERATION</th>
                                    <th>ADM & SUPP DIV HD</th>
                                    <th>SALES & OPT DIV HD</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><img src="path/to/default-signature.png"
                                            alt="Tanda Tangan DIREKTUR ADMIN & SUPPORT"
                                            style="width: 100px; height: auto;"></td>
                                    <td><img src="path/to/default-signature.png"
                                            alt="Tanda Tangan DIREKTUR SALES & OPERATION"
                                            style="width: 100px; height: auto;"></td>
                                    <td><img src="path/to/default-signature.png" alt="Tanda Tangan ADM & SUPP DIV HD"
                                            style="width: 100px; height: auto;"></td>
                                    <td><img src="path/to/default-signature.png" alt="Tanda Tangan SALES & OPT DIV HD"
                                            style="width: 100px; height: auto;"></td>
                                </tr>
                            </tbody>
                        </table>

                        <!-- Submit Button -->
                        <div class="row mt-4">
                            <div class="col-md-12 text-center">
                                <button type="button" class="btn btn-green" onclick="submitForm()">Lanjutkan</button>
                            </div>
                        </div>
                </form>
            </div>
        </div>
    </div>

</div>

<script>
function updateLainLainValue(input) {
    const checkbox = document.getElementById('lain-lain');
    if (input.value.trim() !== '') {
        checkbox.value = input.value;
        checkbox.checked = true;
    } else {
        checkbox.value = '';
        checkbox.checked = false;
    }
}

document.getElementById('kredit').addEventListener('change', function() {
    const kreditTermContainer = document.getElementById('kredit_term_container');
    if (this.checked) {
        kreditTermContainer.style.display = 'block';
    } else {
        kreditTermContainer.style.display = 'none';
    }
});

// Hide kredit term input when other payment methods are selected
document.querySelectorAll('input[name="cara_pembayaran"]').forEach(radio => {
    if (radio.id !== 'kredit') {
        radio.addEventListener('change', function() {
            document.getElementById('kredit_term_container').style.display = 'none';
        });
    }
});

document.getElementById('swasta_sektor_proyek').addEventListener('change', function() {
    const swastaContainer = document.getElementById('swasta_sektor_container');
    if (this.checked) {
        swastaContainer.style.display = 'block';
    } else {
        swastaContainer.style.display = 'none';
    }
});

// Hide swasta sektor input when other payment types are selected
document.querySelectorAll('input[name="jenis_pembayaran"]').forEach(radio => {
    if (radio.id !== 'swasta_sektor_proyek') {
        radio.addEventListener('change', function() {
            document.getElementById('swasta_sektor_container').style.display = 'none';
        });
    }
});

function addRow() {
    const tbody = document.getElementById('jumlah-tambah');
    const rowCount = tbody.getElementsByTagName('tr').length;
    const newRow = document.createElement('tr');

    newRow.innerHTML = `
        <td>${rowCount + 1}</td>
        <td><input type="text" class="form-control" name="nama_tambah[]"></td>
        <td><input type="number" class="form-control" name="jumlah_tambah[]"></td>
        <td><input type="text" class="form-control" name="keterangan_tambah[]"></td>
        <td><button type="button" class="btn btn-danger" onclick="removeRow(this)">Hapus</button></td>
    `;

    tbody.appendChild(newRow);
}

function removeRow(button) {
    const row = button.closest('tr');
    row.remove();

    // Update nomor urut
    const tbody = document.getElementById('jumlah-tambah');
    const rows = tbody.getElementsByTagName('tr');
    for (let i = 0; i < rows.length; i++) {
        rows[i].cells[0].textContent = i + 1;
    }
}

function addLembagaRow() {
    const tbody = document.getElementById('lembaga-tambah');
    const rowCount = tbody.getElementsByTagName('tr').length;
    const newRow = document.createElement('tr');

    newRow.innerHTML = `
        <td>${rowCount + 1}</td>
        <td><input type="text" class="form-control" name="nama_lembaga[]"></td>
        <td><input type="text" class="form-control" name="deskripsi[]"></td>
        <td><button type="button" class="btn btn-danger" onclick="removeLembagaRow(this)">Hapus</button></td>
    `;

    tbody.appendChild(newRow);
}

function removeLembagaRow(button) {
    const row = button.closest('tr');
    row.remove();

    // Update nomor urut
    const tbody = document.getElementById('lembaga-tambah');
    const rows = tbody.getElementsByTagName('tr');
    for (let i = 0; i < rows.length; i++) {
        rows[i].cells[0].textContent = i + 1;
    }
}

function addReputasiRow() {
    const tbody = document.getElementById('reputasi-tambah');
    const rowCount = tbody.getElementsByTagName('tr').length;
    const newRow = document.createElement('tr');

    newRow.innerHTML = `
        <td><input type="text" class="form-control" name="sumber_informasi[]"></td>
        <td><input type="text" class="form-control" name="hubungan[]"></td>
        <td><input type="text" class="form-control" name="hasil_pengecekan[]"></td>
    `;

    tbody.appendChild(newRow);
}

function addSukuCadangRow() {
    const tbody = document.getElementById('suku-cadang-tambah');
    const rowCount = tbody.getElementsByTagName('tr').length;
    const newRow = document.createElement('tr');

    newRow.innerHTML = `
        <td><input type="text" class="form-control" name="model_alat[]"></td>
        <td><input type="text" class="form-control" name="tahun_buat[]"></td>
        <td><input type="number" class="form-control" name="jumlah[]"></td>
        <td><input type="text" class="form-control" name="lokasi[]"></td>
        <td><input type="text" class="form-control" name="perhitungan_spare_part[]"></td>
        <td><button type="button" class="btn btn-danger" onclick="removeSukuCadangRow(this)">Hapus</button></td>
    `;

    tbody.appendChild(newRow);
}

function removeSukuCadangRow(button) {
    const row = button.closest('tr');
    row.remove();

    // Update nomor urut if needed (optional)
    const tbody = document.getElementById('suku-cadang-tambah');
    const rows = tbody.getElementsByTagName('tr');
    for (let i = 0; i < rows.length; i++) {
        // Update any necessary row numbering or identifiers here
    }
}

function submitForm() {
    // Simulasi pengiriman form dan navigasi ke halaman komentar
    window.location.href = '/admin/level1'; // Ganti dengan URL halaman komentar
}
</script>
@endsection