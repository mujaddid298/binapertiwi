@extends('layouts.bc.app_admin')

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
                    <!-- Error Messages -->
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
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
                            <textarea class="form-control" id="alamat" name="alamat" rows="3" style="height: 100px;" placeholder="Masukkan alamat customer"></textarea>
                        </div>
                    </div>
                        <div class="row">
                        <div class="col-md-6">
                                <label for="industry">Industry</label>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="Oil & Gas" id="oil_gas" name="industry[]">
                                    <label class="form-check-label" for="oil_gas">
                                        Oil & Gas
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="Mining" id="mining" name="industry[]">
                                    <label class="form-check-label" for="mining">
                                        Mining
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="Electricity (PN)" id="electricity" name="industry[]">
                                    <label class="form-check-label" for="electricity">
                                        Electricity (PN)
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="Construction" id="construction" name="industry[]">
                                    <label class="form-check-label" for="construction">
                                        Construction
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="Property" id="property" name="industry[]">
                                    <label class="form-check-label" for="property">
                                        Property
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="Transportasi" id="transportasi" name="industry[]">
                                    <label class="form-check-label" for="transportasi">
                                        Transportasi
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="Fishery" id="fishery" name="industry[]">
                                    <label class="form-check-label" for="fishery">
                                        Fishery
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="Banking" id="banking" name="industry[]">
                                    <label class="form-check-label" for="banking">
                                        Banking
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="Agro" id="agro" name="industry[]">
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
                    
                    
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="jangka_pembayaran">Term Of Payment</label>
                                <input type="text" class="form-control" id="jangka_pembayaran">
                            </div>
                        </div>
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
                            <input class="form-check-input" type="checkbox" id="perorangan" name="bentuk_perusahaan[]">
                            <label class="form-check-label" for="perorangan">Perorangan</label>
                        </div>
                        <div class="form-check mb-2">
                            <input class="form-check-input" type="checkbox" id="lain-lain" name="bentuk_perusahaan[]"> 
                            <input type="text" class="form-control" id="lain-lain-text" 
                                   style="width: 400px; display:inline-block;" 
                                   name="lain-lain-text"
                                   placeholder="Lain-lain"
                                   onchange="updateLainLainValue(this)">
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
                        <label for="nomor_akte_pendirian" class="col-sm-2 col-form-label">Nomor Akte Pendirian</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="nomor_akte_pendirian" name="nomor_akte_pendirian">
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
                    <h6 class="text-center"> SUSUNAN KEPEMILIKAN SAHAM,  DANA,  DIREKS</h6>
              
                    
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
                    <div class="row mb-3">
                        <div class="col-md-12"> 
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Susunan</th> <!-- Changed from Fasilitas to Susunan -->
                                        <th>Saham (Amount)</th> <!-- Changed from Jumlah to Saham (Amount) -->
                                        <th>Nilai Saham</th> <!-- Changed from Keterangan to Nilai Saham -->
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody id="jumlah-susunan"> <!-- Updated ID for consistency -->
                                    <tr>
                                        <td>1</td>
                                        <td><input type="text" class="form-control" name="nama_susunan[]"></td> <!-- Changed from nama_fasilitas to nama_susunan -->
                                        <td><input type="number" class="form-control" name="jumlah_saham[]"></td> <!-- Changed from jumlah_fasilitas to jumlah_saham -->
                                        <td><input type="text" class="form-control" name="nilai_saham[]"></td> <!-- Changed from keterangan_fasilitas to nilai_saham -->
                                        <td><button type="button" class="btn btn-danger" onclick="removeRow(this)">Hapus</button></td>
                                    </tr>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="4">
                                            <button type="button" class="btn btn-green" onclick="addRow()">Tambah Baris</button>
                                        </td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-md-12">
                            <h6 class="mb-3">Lama Perusahaan Beroperasi Dibidang Usahanya</h6>
                            <div class="form-check form-check-inline mb-3">
                                <input class="form-check-input" type="radio" id="lama1" name="lama" value="&lt; 1 THN">
                                <label class="form-check-label" for="lama1">&lt; 1 THN</label>
                            </div>
                            <div class="form-check form-check-inline mb-3">
                                <input class="form-check-input" type="radio" id="lama2" name="lama" value="0 - 5 THN">
                                <label class="form-check-label" for="lama2">0 - 5 THN</label>
                            </div>
                            <div class="form-check form-check-inline mb-3">
                                <input class="form-check-input" type="radio" id="lama3" name="lama" value="5 - 10 THN">
                                <label class="form-check-label" for="lama3">5 - 10 THN</label>
                            </div>
                            <div class="form-check form-check-inline mb-3">
                                <input class="form-check-input" type="radio" id="lama4" name="lama" value="&gt; 10 TH">
                                <label class="form-check-label" for="lama4">&gt; 10 TH</label>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-md-12">
                            <h6 class="mb-3">Struktur Organisasi & Management</h6>
                            <div class="form-check mb-3">
                                <input class="form-check-input" type="radio" id="struktur2" name="struktur" value="Direksi Terdiri Dari Anggota Keluarga">
                                <label class="form-check-label" for="struktur2">Direksi Terdiri Dari Anggota Keluarga</label>
                            </div>
                            <div class="form-check mb-3">
                                <input class="form-check-input" type="radio" id="struktur3" name="struktur" value="Management Profesional">
                                <label class="form-check-label" for="struktur3">Management Profesional</label>
                            </div>
                            <div class="form-check mb-3">
                                <input class="form-check-input" type="radio" id="struktur1" name="struktur" value="Keputusan Ditangan Seorang">
                                <label class="form-check-label" for="struktur1">Keputusan Ditangan Seorang
                                    <input type="text" class="form-control" name="pemegang_keputusan" placeholder="Nama pemegang keputusan">
                                </label>
                            </div>
                        </div>
                    </div>

                    <h4 class="mt-4">KAPITAL PERUSAHAAN</h4>
                    <hr>
                    <h6 class="text-center m-3">HASIL PENJUALAN</h6>
                    <div class="form-group row">
                        <label for="rata_rata_per_bulan" class="col-sm-2 col-form-label">Rata-Rata Per Bulan</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="rata_rata_per_bulan" name="rata_rata_per_bulan">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="jumlah_hasil_penjualan_per_tahun" class="col-sm-2 col-form-label">Jumlah Per Tahun</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="jumlah_hasil_penjualan_per_tahun" name="jumlah_hasil_penjualan_per_tahun">
                        </div>
                    </div>

                    <h6 class="text-center"> CARA PEMBAYARAN ATAS PEKERJAAN YANG TELAH SELESAI</h6>

                    <div class="row mb-3">
                        <div class="col-md-12">
                            <div class="form-check mb-2">
                                <input class="form-check-input" type="radio" name="cara_pembayaran" id="tunai" value="TUNAI">
                                <label class="form-check-label" for="tunai">
                                    Tunai
                                </label>
                            </div>
                            <div class="form-check mb-2">
                                <input class="form-check-input" type="radio" name="cara_pembayaran" id="prestasi_kerja" value="ATAS DASAR PRESTASI KERJA">
                                <label class="form-check-label" for="prestasi_kerja">
                                    Atas Dasar Prestasi Kerja
                                </label>
                            </div>
                            <div class="form-check mb-2">
                                <input class="form-check-input" type="radio" name="cara_pembayaran" id="kredit" value="KREDIT">
                                <label class="form-check-label" for="kredit">
                                    Kredit
                                </label>
                                <div id="kredit_term_container" style="display: none; margin-left: 20px; margin-top: 10px;">
                                    <div class="form-group">
                                        <label for="kredit_term">Kredit Term</label>
                                        <input type="number" class="form-control" id="kredit_term" name="kredit_term" placeholder="Masukkan kredit term">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <h6 class="text-center"> MODEL TRANSAKSI PERUSAHAAN DENGAN CUSTOMERNYA</h6>
                    <div class="form-group row">
                        <label for="jenis_pembayaran" class="col-sm-12 col-form-label">Jenis Pembayaran</label>
                        <div class="col-sm-10">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="jenis_pembayaran" id="penjualan_lokal" value="PENJUALAN LOKAL">
                                <label class="form-check-label" for="penjualan_lokal">
                                    Penjualan Lokal
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="jenis_pembayaran" id="ekspor" value="EKSPOR">
                                <label class="form-check-label" for="ekspor">
                                    Ekspor
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="jenis_pembayaran" id="melalui_bank_exim" value="MELALUI BANK EXIM">
                                <label class="form-check-label" for="melalui_bank_exim">
                                    Melalui Bank Exim
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="jenis_pembayaran" id="proyek_pemerintah" value="PROYEK PEMERINTAH">
                                <label class="form-check-label" for="proyek_pemerintah">
                                    Proyek Pemerintah
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="jenis_pembayaran" id="swasta_sektor_proyek" value="SWASTA SEKTOR PROYEK / BIDANG">
                                <label class="form-check-label" for="swasta_sektor_proyek">
                                    Swasta Sektor Proyek / Bidang
                                </label>
                                <div id="swasta_sektor_container" style="display: none; margin-left: 20px; margin-top: 10px;">
                                    <div class="form-group">
                                        <label for="nama_proyek">Nama Proyek/Bidang</label>
                                        <input type="text" class="form-control" id="nama_proyek" name="nama_proyek" placeholder="Masukkan nama proyek/bidang">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <h6 class="text-center"> FASILITAS YANG DIMILIKI ( TERMASUK  KANTOR,  PABRIK,  JUMLAH PEGAWAI, DLL )</h6>
                    <div class="row mb-3">
                        <div class="col-md-12">
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
                                <tbody id="jumlah-fasilitas">
                                    <tr>
                                        <td>1</td>
                                        <td><input type="text" class="form-control" name="nama_fasilitas[]"></td>
                                        <td><input type="number" class="form-control" name="jumlah_fasilitas[]"></td>
                                        <td><input type="text" class="form-control" name="keterangan_fasilitas[]"></td>
                                        <td><button type="button" class="btn btn-danger" onclick="removeRow(this)">Hapus</button></td>
                                    </tr>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="4">
                                            <button type="button" class="btn btn-green" onclick="addRow()">Tambah Baris</button>
                                        </td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                    <!-- Submit Button -->
                    <div class="form-group text-center mt-4">
                        <button type="submit" class="btn btn-primary">Submit</button>
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
    const tbody = document.getElementById('jumlah-fasilitas');
    const rowCount = tbody.getElementsByTagName('tr').length;
    const newRow = document.createElement('tr');

    newRow.innerHTML = `
        <td>${rowCount + 1}</td>
        <td><input type="text" class="form-control" name="nama_fasilitas[]"></td>
        <td><input type="number" class="form-control" name="jumlah_fasilitas[]"></td>
        <td><input type="text" class="form-control" name="keterangan_fasilitas[]"></td>
        <td><button type="button" class="btn btn-danger" onclick="removeRow(this)">Hapus</button></td>
`;

    tbody.appendChild(newRow);
}

function removeRow(button) {
    const row = button.closest('tr');
    row.remove();
    
    // Update nomor urut
    const tbody = document.getElementById('jumlah-fasilitas');
    const rows = tbody.getElementsByTagName('tr');
    for(let i = 0; i < rows.length; i++) {
        rows[i].cells[0].textContent = i + 1;
    }
}


function addRow() {
    const tbody = document.getElementById('jumlah-susunan'); // Updated ID
    const rowCount = tbody.getElementsByTagName('tr').length;
    const newRow = document.createElement('tr');

    newRow.innerHTML = `
        <td>${rowCount + 1}</td>
        <td><input type="text" class="form-control" name="nama_susunan[]"></td> <!-- Updated name -->
        <td><input type="number" class="form-control" name="jumlah_saham[]"></td> <!-- Updated name -->
        <td><input type="text" class="form-control" name="nilai_saham[]"></td> <!-- Updated name -->
        <td><button type="button" class="btn btn-danger" onclick="removeRow(this)">Hapus</button></td>
    `;

    tbody.appendChild(newRow);
}

function removeRow(button) {
    const row = button.closest('tr');
    row.remove();
    
    // Update nomor urut
    const tbody = document.getElementById('jumlah-susunan'); // Updated ID
    const rows = tbody.getElementsByTagName('tr');
    for(let i = 0; i < rows.length; i++) {
        rows[i].cells[0].textContent = i + 1;
    }
}





</script>
@endsection