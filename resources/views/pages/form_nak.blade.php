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
                    <li class="breadcrumb-item"><a href="#">Daftar Pengguna</a></li>
                </ul>
            </div>
        </div>
    </div>
</div>

<div class="container p-4" style="font-size: 13px; border: 1px solid #000;">
    <h5 class="text-center mb-3">NOTA APLIKASI KREDIT PKPS</h5>
    <table class="table table-bordered">
        <tr>
            <td><strong>CABANG</strong></td>
            <td><input type="text" class="form-control"></td>
            <td><strong>TANGGAL</strong></td>
            <td><input type="date" class="form-control"></td>
            <td><strong>Nama BC</strong></td>
            <td><input type="text" class="form-control"></td>
        </tr>
    </table>

    <h6 class="mt-4">PERUSAHAAN PELANGGAN</h6>
    <table class="table table-bordered">
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
    <table class="table table-bordered">
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
    <table class="table table-bordered">
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
    <table class="table table-bordered">
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
    <table class="table table-bordered">
        <tr>
            <td><strong>RATA-RATA PER BULAN</strong></td>
            <td><input type="text" class="form-control"></td>
        </tr>
        <tr>
            <td><strong>JUMLAH HASIL PENJUALAN PER TAHUN</strong></td>
            <td><input type="text" class="form-control"></td>
        </tr>
    </table>

    <h6 class="mt-4">FASILITAS YANG DIMILIKI</h6>
    <table class="table table-bordered">
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