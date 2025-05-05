@extends('layouts.admin.app_admin')

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
                <form action="{{ route('admin.form.store') }}" method="POST">
                    @csrf
                    {{-- <!-- Error Messages -->
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif --}}
                    <!-- Top Section -->
                    <div class="row mb-3">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="nama_bc">NAMA BC</label>
                                <input type="text" class="form-control" id="nama_bc" name="nama_bc" value="{{ old('nama_bc') }}">
                                @error('nama_bc')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="cabang">CABANG</label>
                                <select class="form-control" id="cabang" name="cabang">
                                    <option value="">Pilih Cabang</option>
                                    <option value="pekanbaru" {{ old('cabang') == 'pekanbaru' ? 'selected' : '' }}>Pekanbaru</option>
                                    <option value="pelembang" {{ old('cabang') == 'pelembang' ? 'selected' : '' }}>Pelembang</option>
                                    <option value="tanjunenim" {{ old('cabang') == 'tanjunenim' ? 'selected' : '' }}>Tanjun Enim</option>
                                </select>
                                @error('cabang')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="tanggal">TANGGAL</label>
                                <input type="date" class="form-control" id="tanggal" name="tanggal" value="{{ old('tanggal') }}">
                                @error('tanggal')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <!-- Customer Section -->
                    <h4 class="mt-4">CUSTOMER</h4>
                    <hr>
                    <div class="row mb-3">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="namacust">Nama Customer</label>
                                <input type="text" class="form-control" id="namacust" name="namacust" value="{{ old('namacust') }}">
                                @error('namacust')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="bid-usaha">Bidang Usaha</label>
                                <input type="text" class="form-control" id="bid-usaha" name="bid-usaha" value="{{ old('bid-usaha') }}">
                                @error('bid-usaha')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="group">Group Perusahaan</label>
                                <input type="text" class="form-control" id="group" name="group" value="{{ old('group') }}">
                                @error('group')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="penanggung_jawab">Penanggung Jawab</label>
                                <input type="text" class="form-control" id="penanggung_jawab" name="penanggung_jawab" value="{{ old('penanggung_jawab') }}">
                                @error('penanggung_jawab')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <textarea class="form-control" id="alamat" name="alamat" rows="3" style="height: 100px;" placeholder="Masukkan alamat customer">{{ old('alamat') }}</textarea>
                        @error('alamat')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label for="industry">Industry</label>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="Oil & Gas" id="oil_gas" name="industry[]" {{ in_array('Oil & Gas', old('industry', [])) ? 'checked' : '' }}>
                                <label class="form-check-label" for="oil_gas">Oil & Gas</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="Mining" id="mining" name="industry[]" {{ in_array('Mining', old('industry', [])) ? 'checked' : '' }}>
                                <label class="form-check-label" for="mining">Mining</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="Electricity (PN)" id="electricity" name="industry[]" {{ in_array('Electricity (PN)', old('industry', [])) ? 'checked' : '' }}>
                                <label class="form-check-label" for="electricity">Electricity (PN)</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="Construction" id="construction" name="industry[]" {{ in_array('Construction', old('industry', [])) ? 'checked' : '' }}>
                                <label class="form-check-label" for="construction">Construction</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="Property" id="property" name="industry[]" {{ in_array('Property', old('industry', [])) ? 'checked' : '' }}>
                                <label class="form-check-label" for="property">Property</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="Transportasi" id="transportasi" name="industry[]" {{ in_array('Transportasi', old('industry', [])) ? 'checked' : '' }}>
                                <label class="form-check-label" for="transportasi">Transportasi</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="Fishery" id="fishery" name="industry[]" {{ in_array('Fishery', old('industry', [])) ? 'checked' : '' }}>
                                <label class="form-check-label" for="fishery">Fishery</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="Banking" id="banking" name="industry[]" {{ in_array('Banking', old('industry', [])) ? 'checked' : '' }}>
                                <label class="form-check-label" for="banking">Banking</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="Agro" id="agro" name="industry[]" {{ in_array('Agro', old('industry', [])) ? 'checked' : '' }}>
                                <label class="form-check-label" for="agro">Agro</label>
                            </div>
                            @error('industry')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <!-- Pengajuan Kredit Section -->
                    <h4 class="mt-4">PENGAJUAN KREDIT</h4>
                    <hr>
                    <div class="form-group">
                        <label for="nilai_kredit">Nilai kredit</label>
                        <input type="text" class="form-control" id="nilai_kredit" name="nilai_kredit" value="{{ old('nilai_kredit') }}">
                        @error('nilai_kredit')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="term_of_payment">Term Of Payment</label>
                                <input type="text" class="form-control" id="term_of_payment" name="term_of_payment" value="{{ old('term_of_payment') }}">
                                @error('term_of_payment')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="bunga">Bunga</label>
                                <input type="text" class="form-control" id="bunga" name="bunga" value="{{ old('bunga') }}">
                                @error('bunga')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="jaminan">Jaminan</label>
                                <div>
                                    <div class="mb-2">
                                        <input type="radio" id="transfer" name="jaminan" value="Transfer" {{ old('jaminan') == 'Transfer' ? 'checked' : '' }}>
                                        <label for="transfer">Transfer</label>
                                    </div>
                                    <div class="mb-2">
                                        <input type="radio" id="bank_garansi" name="jaminan" value="Bank Garansi" {{ old('jaminan') == 'Bank Garansi' ? 'checked' : '' }}>
                                        <label for="bank_garansi">Bank Garansi</label>
                                    </div>
                                    <div class="mb-2">
                                        <input type="radio" id="deposito" name="jaminan" value="Deposito" {{ old('jaminan') == 'Deposito' ? 'checked' : '' }}>
                                        <label for="deposito">Deposito</label>
                                    </div>
                                </div>
                                @error('jaminan')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <!-- Karakter Perusahaan Section -->
                    <h4 class="mt-4">KARAKTER PERUSAHAAN</h4>
                    <hr>
                    <div class="form-group">
                        <label for="bentuk_perusahaan">Bentuk Perusahaan</label>
                        <div class="form-check mb-2">
                            <input class="form-check-input" type="checkbox" id="pt" name="bentuk_perusahaan[]" value="Perseroan Terbatas" {{ in_array('Perseroan Terbatas', old('bentuk_perusahaan', [])) ? 'checked' : '' }}>
                            <label class="form-check-label" for="pt">Perseroan Terbatas</label>
                        </div>
                        <div class="form-check mb-2">
                            <input class="form-check-input" type="checkbox" id="fa" name="bentuk_perusahaan[]" value="Firma (FA)" {{ in_array('Firma (FA)', old('bentuk_perusahaan', [])) ? 'checked' : '' }}>
                            <label class="form-check-label" for="fa">Firma (FA)</label>
                        </div>
                        <div class="form-check mb-2">
                            <input class="form-check-input" type="checkbox" id="pn" name="bentuk_perusahaan[]" value="Perusahaan Negara (PN)" {{ in_array('Perusahaan Negara (PN)', old('bentuk_perusahaan', [])) ? 'checked' : '' }}>
                            <label class="form-check-label" for="pn">Perusahaan Negara (PN)</label>
                        </div>
                        <div class="form-check mb-2">
                            <input class="form-check-input" type="checkbox" id="cv" name="bentuk_perusahaan[]" value="Perusahaan Komanditer (CV)" {{ in_array('Perusahaan Komanditer (CV)', old('bentuk_perusahaan', [])) ? 'checked' : '' }}>
                            <label class="form-check-label" for="cv">Perusahaan Komanditer (CV)</label>
                        </div>
                        <div class="form-check mb-2">
                            <input class="form-check-input" type="checkbox" id="perorangan" name="bentuk_perusahaan[]" value="Perorangan" {{ in_array('Perorangan', old('bentuk_perusahaan', [])) ? 'checked' : '' }}>
                            <label class="form-check-label" for="perorangan">Perorangan</label>
                        </div>
                        <div class="form-check mb-2">
                            <input class="form-check-input" type="checkbox" id="lain-lain" name="bentuk_perusahaan[]" value="Lain-lain" {{ in_array('Lain-lain', old('bentuk_perusahaan', [])) ? 'checked' : '' }}> 
                            <input type="text" class="form-control" id="lain-lain-text" style="width: 400px; display:inline-block;" name="lain-lain-text" placeholder="Lain-lain" onchange="updateLainLainValue(this)">
                        </div>
                        @error('bentuk_perusahaan')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group row">
                        <label for="waktu_didirikan" class="col-sm-2 col-form-label">Waktu Didirikan</label>
                        <div class="col-sm-10">
                            <input type="date" class="form-control" id="waktu_didirikan" name="waktu_didirikan" value="{{ old('waktu_didirikan') }}">
                            @error('waktu_didirikan')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="domisili" class="col-sm-2 col-form-label">Domisili</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="domisili" name="domisili" value="{{ old('domisili') }}">
                            @error('domisili')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="nomor_akte_pendirian" class="col-sm-2 col-form-label">Nomor Akte Pendirian</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="nomor_akte_pendirian" name="nomor_akte_pendirian" value="{{ old('nomor_akte_pendirian') }}">
                            @error('nomor_akte_pendirian')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="notaris" class="col-sm-2 col-form-label">Notaris</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="notaris" name="notaris" value="{{ old('notaris') }}">
                            @error('notaris')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="manajemen_kehakiman" class="col-sm-2 col-form-label">Manajemen Kehakiman</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="manajemen_kehakiman" name="manajemen_kehakiman" value="{{ old('manajemen_kehakiman') }}">
                            @error('manajemen_kehakiman')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="akte_perubahan" class="col-sm-2 col-form-label">Akte Perubahan</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="akte_perubahan" name="akte_perubahan" value="{{ old('akte_perubahan') }}">
                            @error('akte_perubahan')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="pengesahan" class="col-sm-2 col-form-label">Pengesahan</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="pengesahan" name="pengesahan" value="{{ old('pengesahan') }}">
                            @error('pengesahan')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <h6 class="text-center"> SUSUNAN KEPEMILIKAN SAHAM, DANA, DIREKS</h6>
                    <div class="form-group row">
                        <label for="modal_dasar" class="col-sm-2 col-form-label">Modal Dasar</label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Rp</span>
                                </div>
                                <input type="text" class="form-control" id="modal_dasar" name="modal_dasar" value="{{ old('modal_dasar') }}">
                            </div>
                            @error('modal_dasar')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="modal_disetor" class="col-sm-2 col-form-label">Modal Setor</label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Rp</span>
                                </div>
                                <input type="text" class="form-control" id="modal_disetor" name="modal_disetor" value="{{ old('modal_disetor') }}">
                            </div>
                            @error('modal_disetor')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-12"> 
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Susunan</th>
                                        <th>Jabatan</th>
                                        <th>Saham (Amount)</th>
                                        <th>Nilai Saham</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody id="jumlah-susunan">
                                    <tr>
                                        <td>1</td>
                                        <td><input type="text" class="form-control" name="nama_susunan[]"></td>
                                        <td><input type="text" class="form-control" name="jabatan_susunan[]"></td>
                                        <td><input type="number" class="form-control" name="jumlah_saham[]"></td>
                                        <td><input type="text" class="form-control" name="nilai_saham[]"></td>
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
                            <h6 class="mb-3">Lama Perusahaan Beroperasi Dibidang Usahanya
                            </h6>
                         
                            <div class="form-check form-check-inline mb-3">
                                <input class="form-check-input" type="radio" id="lama1" name="lama" value="< 1 THN" {{ old('lama') == '< 1 THN' ? 'checked' : '' }}>
                                <label class="form-check-label" for="lama1">< 1 THN</label>
                            </div>
                            <div class="form-check form-check-inline mb-3">
                                <input class="form-check-input" type="radio" id="lama2" name="lama" value="0 - 5 THN" {{ old('lama') == '0 - 5 THN' ? 'checked' : '' }}>
                                <label class="form-check-label" for="lama2">0 - 5 THN</label>
                            </div>
                            <div class="form-check form-check-inline mb-3">
                                <input class="form-check-input" type="radio" id="lama3" name="lama" value="5 - 10 THN" {{ old('lama') == '5 - 10 THN' ? 'checked' : '' }}>
                                <label class="form-check-label" for="lama3">5 - 10 THN</label>
                            </div>
                            <div class="form-check form-check-inline mb-3">
                                <input class="form-check-input" type="radio" id="lama4" name="lama" value="> 10 TH" {{ old('lama') == '> 10 TH' ? 'checked' : '' }}>
                                <label class="form-check-label" for="lama4">> 10 TH</label>
                            </div>
                           <br>
                            @error('lama')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                            
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-md-12">
                            <h6 class="mb-3">Struktur Organisasi & Management</h6>
                            <div class="form-check mb-3">
                                <input class="form-check-input" type="radio" id="struktur2" name="struktur" value="Direksi Terdiri Dari Anggota Keluarga" {{ old('struktur') == 'Direksi Terdiri Dari Anggota Keluarga' ? 'checked' : '' }} onclick="togglePemegangInput()">
                                <label class="form-check-label" for="struktur2">Direksi Terdiri Dari Anggota Keluarga</label>
                            </div>
                            <div class="form-check mb-3">
                                <input class="form-check-input" type="radio" id="struktur3" name="struktur" value="Management Profesional" {{ old('struktur') == 'Management Profesional' ? 'checked' : '' }} onclick="togglePemegangInput()">
                                <label class="form-check-label" for="struktur3">Management Profesional</label>
                            </div>
                            <div class="form-check mb-3">
                                <input class="form-check-input" type="radio" id="struktur1" name="struktur" value="Keputusan Ditangan Seorang" {{ old('struktur') == 'Keputusan Ditangan Seorang' ? 'checked' : '' }} onclick="togglePemegangInput()">
                                <label class="form-check-label" for="struktur1">Keputusan Ditangan Seorang</label>
                            </div>
                            <div id="pemegang-keputusan-input" style="display: none; margin-bottom: 10px;">
                                <label>Keputusan dipegang oleh</label>
                                <input type="text" class="form-control" name="pemegang_keputusan" placeholder="Nama pemegang keputusan" value="{{ old('pemegang_keputusan') }}" oninput="updatePreview()">
                                <div id="preview-keputusan" style="margin-top:5px; color: #555;"></div>
                            </div>
                            @error('struktur')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <h4 class="mt-4">KAPITAL PERUSAHAAN</h4>
                    <hr>
                    <h6 class="text-center m-3">HASIL PENJUALAN</h6>
                    <div class="form-group row">
                        <label for="rata_rata_per_bulan" class="col-sm-2 col-form-label">Rata-Rata Per Bulan</label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Rp</span>
                                </div>
                                <input type="number" class="form-control" id="rata_rata_per_bulan" name="rata_rata_per_bulan" value="{{ old('rata_rata_per_bulan') }}">
                            </div>
                            @error('rata_rata_per_bulan')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="jumlah_hasil_penjualan_per_tahun" class="col-sm-2 col-form-label">Jumlah Per Tahun</label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">Rp</span>
                                </div>
                                <input type="number" class="form-control" id="jumlah_hasil_penjualan_per_tahun" name="jumlah_hasil_penjualan_per_tahun" value="{{ old('jumlah_hasil_penjualan_per_tahun') }}">
                            </div>
                            @error('jumlah_hasil_penjualan_per_tahun')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <h6 class="text-center"> CARA PEMBAYARAN ATAS PEKERJAAN YANG TELAH SELESAI</h6>
                    <div class="row mb-3">
                        <div class="col-md-12">
                            <div class="form-check mb-2">
                                <input class="form-check-input" type="radio" name="cara_pembayaran" id="tunai" value="TUNAI" {{ old('cara_pembayaran') == 'TUNAI' ? 'checked' : '' }}>
                                <label class="form-check-label" for="tunai">Tunai</label>
                            </div>
                            <div class="form-check mb-2">
                                <input class="form-check-input" type="radio" name="cara_pembayaran" id="prestasi_kerja" value="ATAS DASAR PRESTASI KERJA" {{ old('cara_pembayaran') == 'ATAS DASAR PRESTASI KERJA' ? 'checked' : '' }}>
                                <label class="form-check-label" for="prestasi_kerja">Atas Dasar Prestasi Kerja</label>
                            </div>
                            <div class="form-check mb-2">
                                <input class="form-check-input" type="radio" name="cara_pembayaran" id="kredit" value="KREDIT" {{ old('cara_pembayaran') == 'KREDIT' ? 'checked' : '' }} onclick="toggleKreditTerm()">
                                <label class="form-check-label" for="kredit">Kredit</label>
                                <div id="kredit_term_container" style="display: {{ old('cara_pembayaran') == 'KREDIT' ? 'block' : 'none' }}; margin-left: 20px; margin-top: 10px;">
                                    <div class="form-group">
                                        <label for="kredit_term">Kredit Term</label>
                                        <input type="number" class="form-control" id="kredit_term" name="kredit_term" placeholder="Masukkan kredit term" value="{{ old('kredit_term') }}">
                                        @error('kredit_term')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            @error('cara_pembayaran')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <h6 class="text-center"> MODEL TRANSAKSI PERUSAHAAN DENGAN CUSTOMERNYA</h6>
                    <div class="form-group row">
                        <label for="jenis_pembayaran" class="col-sm-12 col-form-label">Jenis Pembayaran</label>
                        <div class="col-sm-10">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="jenis_pembayaran" id="penjualan_lokal" value="PENJUALAN LOKAL" {{ old('jenis_pembayaran') == 'PENJUALAN LOKAL' ? 'checked' : '' }}>
                                <label class="form-check-label" for="penjualan_lokal">Penjualan Lokal</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="jenis_pembayaran" id="ekspor" value="EKSPOR" {{ old('jenis_pembayaran') == 'EKSPOR' ? 'checked' : '' }}>
                                <label class="form-check-label" for="ekspor">Ekspor</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="jenis_pembayaran" id="melalui_bank_exim" value="MELALUI BANK EXIM" {{ old('jenis_pembayaran') == 'MELALUI BANK EXIM' ? 'checked' : '' }}>
                                <label class="form-check-label" for="melalui_bank_exim">Melalui Bank Exim</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="jenis_pembayaran" id="proyek_pemerintah" value="PROYEK PEMERINTAH" {{ old('jenis_pembayaran') == 'PROYEK PEMERINTAH' ? 'checked' : '' }}>
                                <label class="form-check-label" for="proyek_pemerintah">Proyek Pemerintah</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="jenis_pembayaran" id="swasta_sektor_proyek" value="SWASTA SEKTOR PROYEK / BIDANG" {{ old('jenis_pembayaran') == 'SWASTA SEKTOR PROYEK / BIDANG' ? 'checked' : '' }} onclick="toggleSwastaSektor()">
                                <label class="form-check-label" for="swasta_sektor_proyek">Swasta Sektor Proyek / Bidang</label>
                                <div id="swasta_sektor_container" style="display: {{ old('jenis_pembayaran') == 'SWASTA SEKTOR PROYEK / BIDANG' ? 'block' : 'none' }}; margin-left: 20px; margin-top: 10px;">
                                    <div class="form-group">
                                        <label for="nama_proyek">Nama Proyek/Bidang</label>
                                        <input type="text" class="form-control" id="nama_proyek" name="nama_proyek" placeholder="Masukkan nama proyek/bidang" value="{{ old('nama_proyek') }}">
                                        @error('nama_proyek')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            @error('jenis_pembayaran')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
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
                                        <td><button type="button" class="btn btn-danger" onclick="removeFasilitasRow(this)">Hapus</button></td>
                                    </tr>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="4">
                                            <button type="button" class="btn btn-green" onclick="addFasilitasRow()">Tambah Baris</button>
                                        </td>
                                    </tr>
                                </tfoot>
                            </table>
                            @error('nama_fasilitas')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                            @error('jumlah_fasilitas')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                            @error('keterangan_fasilitas')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <!-- Submit Button -->
                    <div class="form-group text-center mt-4">
                        <button type="submit" class="btn btn-green">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    function addRow() {
        const tableBody = document.getElementById('jumlah-susunan');
        const newRow = document.createElement('tr');

        newRow.innerHTML = `
            <td>${tableBody.children.length + 1}</td>
            <td><input type="text" class="form-control" name="nama_susunan[]"></td>
            <td><input type="text" class="form-control" name="jabatan_susunan[]"></td>
            <td><input type="number" class="form-control" name="jumlah_saham[]"></td>
            <td><input type="text" class="form-control" name="nilai_saham[]"></td>
            <td><button type="button" class="btn btn-danger" onclick="removeRow(this)">Hapus</button></td>
        `;

        tableBody.appendChild(newRow);
    }

    function removeRow(button) {
        const row = button.parentNode.parentNode;
        row.parentNode.removeChild(row);

        // Re-number the rows
        const tableBody = document.getElementById('jumlah-susunan');
        Array.from(tableBody.children).forEach((row, index) => {
            row.children[0].textContent = index + 1;
        });
    }

    function updateLainLainValue(input) {
        const checkbox = document.getElementById('lain-lain');
        if (input.value.trim() !== '') {
            checkbox.value = input.value;
        } else {
            checkbox.value = 'Lain-lain';
        }
    }

    function togglePemegangInput() {
        var struktur = document.querySelector('input[name="struktur"]:checked').value;
        var inputDiv = document.getElementById('pemegang-keputusan-input');
        if (struktur === 'Keputusan Ditangan Seorang') {
            inputDiv.style.display = 'block';
        } else {
            inputDiv.style.display = 'none';
            inputDiv.querySelector('input').value = '';
        }
    }

    function updatePreview() {
        var val = document.querySelector('input[name="pemegang_keputusan"]').value;
        document.getElementById('preview-keputusan').innerText = val ? 'Keputusan dipegang oleh ' + val : '';
    }

    // Jalankan saat halaman dimuat untuk set kondisi awal
    document.addEventListener('DOMContentLoaded', function() {
        togglePemegangInput();
    });

    function addFasilitasRow() {
        const tableBody = document.getElementById('jumlah-fasilitas');
        const newRow = document.createElement('tr');
        newRow.innerHTML = `
            <td>${tableBody.children.length + 1}</td>
            <td><input type="text" class="form-control" name="nama_fasilitas[]"></td>
            <td><input type="number" class="form-control" name="jumlah_fasilitas[]"></td>
            <td><input type="text" class="form-control" name="keterangan_fasilitas[]"></td>
            <td><button type="button" class="btn btn-danger" onclick="removeFasilitasRow(this)">Hapus</button></td>
        `;
        tableBody.appendChild(newRow);
    }

    function removeFasilitasRow(button) {
        const row = button.parentNode.parentNode;
        row.parentNode.removeChild(row);
        // Re-number the rows
        const tableBody = document.getElementById('jumlah-fasilitas');
        Array.from(tableBody.children).forEach((row, index) => {
            row.children[0].textContent = index + 1;
        });
    }

    function toggleKreditTerm() {
        var kreditChecked = document.getElementById('kredit').checked;
        document.getElementById('kredit_term_container').style.display = kreditChecked ? 'block' : 'none';
    }

    function toggleSwastaSektor() {
        var swastaChecked = document.getElementById('swasta_sektor_proyek').checked;
        document.getElementById('swasta_sektor_container').style.display = swastaChecked ? 'block' : 'none';
    }

    document.addEventListener('DOMContentLoaded', function() {
        toggleKreditTerm();
        toggleSwastaSektor();
        // ... existing code ...
    });
</script>

@if(old('struktur') == 'Keputusan Ditangan Seorang' && old('pemegang_keputusan'))
    <div>
        Keputusan dipegang oleh {{ old('pemegang_keputusan') }}@if(old('jabatan_pemegang_keputusan')) - {{ old('jabatan_pemegang_keputusan') }}@endif
    </div>
@endif
@endsection