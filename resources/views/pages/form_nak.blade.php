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
    <form action="#" method="POST">
        @csrf
        <h5 class="text-center mb-3">NOTA APLIKASI KREDIT PKPS</h5>
        <table class="table table-bordered">
            <tr>
                <td><strong>CABANG</strong></td>
                <td><input type="text" name="cabang" class="form-control"></td>
                <td><strong>TANGGAL</strong></td>
                <td><input type="date" name="tanggal" class="form-control"></td>
                <td><strong>Nama BC</strong></td>
                <td><input type="text" name="nama_bc" class="form-control"></td>
            </tr>
        </table>

        <h6 class="mt-4">PERUSAHAAN PELANGGAN</h6>
        <table class="table table-bordered">
            <tr>
                <td><strong>NAMA</strong></td>
                <td colspan="4"><input type="text" name="nama_perusahaan" class="form-control"></td>
                <td><strong>BIDANG USAHA</strong></td>
                <td><input type="text" name="bidang_usaha" class="form-control"></td>
            </tr>

            <tr>
                <td><strong>ALAMAT</strong></td>
                <td colspan="4"><input type="text" name="alamat" class="form-control"></td>
                <td><strong>GROUP PERUSAHAAN</strong></td>
                <td><input type="text" name="group_perusahaan" class="form-control"></td>
            </tr>
            <tr>
                <td><strong>PENANGGUNG JAWAB</strong></td>
                <td colspan="3"><input type="text" name="penanggung_jawab" class="form-control"></td>
                <td><strong>INDUSTRY</strong></td>
                <td colspan="8">
                    @php
                    $industries = ['Oil & Gas', 'Mining', 'Electricity', 'Construction', 'Property', 'Transportasi',
                    'Fishery', 'Banking', 'Agro'];
                    @endphp
                    @foreach ($industries as $industry)
                    <label><input type="checkbox" name="industry[]" value="{{ $industry }}"> {{ $industry }}</label>
                    @endforeach
                </td>
            </tr>
        </table>

        <h6 class="mt-4">PENGAJUAN KREDIT</h6>
        <table class="table table-bordered">
            <tr>
                <td><strong>NILAI KREDIT</strong></td>
                <td><input type="text" name="nilai_kredit" class="form-control"></td>
                <td><strong>TERM OF PAYMENT</strong></td>
                <td><input type="text" name="top" class="form-control"></td>
            </tr>
            <tr>
                <td><strong>BUNGA</strong></td>
                <td><input type="text" name="bunga" class="form-control"></td>
                <td><strong>JAMINAN</strong></td>
                <td>
                    @foreach (['Transfer', 'Bank Garansi', 'Deposito'] as $jaminan)
                    <label><input type="checkbox" name="jaminan[]" value="{{ $jaminan }}"> {{ $jaminan }}</label>
                    @endforeach
                </td>
            </tr>
        </table>

        <h6 class="mt-4">KARAKTER PERUSAHAAN</h6>
        <table class="table table-bordered">
            <tr>
                <td><strong>BENTUK PERUSAHAAN</strong></td>
                <td colspan="4">
                    @foreach (['Perseroan Terbatas', 'Firma (FA)', 'Perusahaan Negara (PN)', 'Perusahaan Komanditer
                    (CV)', 'Perorangan'] as $bentuk)
                    <label><input type="checkbox" name="bentuk_perusahaan[]" value="{{ $bentuk }}">
                        {{ $bentuk }}</label>
                    @endforeach
                    <label><input type="checkbox" name="bentuk_perusahaan[]" value="Lain-lain"> Lain-lain: <input
                            type="text" name="lain_lain" class="form-control"
                            style="width: 200px; display:inline-block;"></label>
                </td>
            </tr>
        </table>
        <table class="table table-bordered">
            <tr>
                <td><strong>WAKTU DIDIRIKAN</strong></td>
                <td><input type="text" name="waktu_didirikan" class="form-control"></td>
                <td><strong>DOMISILI</strong></td>
                <td><input type="text" name="domisili" class="form-control"></td>
            </tr>
            <tr>
                <td><strong>NOMOR AKTE PENDIRIAN</strong></td>
                <td><input type="text" name="akte_pendirian" class="form-control"></td>
                <td><strong>NOTARIS</strong></td>
                <td><input type="text" name="notaris" class="form-control"></td>
            </tr>
            <tr>
                <td><strong>AKTE PERUBAHAN</strong></td>
                <td><input type="text" name="akte_perubahan" class="form-control"></td>
                <td colspan="2"></td>
            </tr>
            <tr>
                <td><strong>PENGESAHAN</strong></td>
                <td><input type="text" name="pengesahan" class="form-control"></td>
                <td colspan="2"></td>
            </tr>
            <tr>
                <td><strong>MODAL DASAR</strong></td>
                <td colspan="2">Rp <input type="text" name="modal_dasar" class="form-control"></td>
                <td><strong>MODAL DISETOR</strong></td>
                <td>Rp <input type="text" name="modal_disetor" class="form-control"></td>
            </tr>
        </table>

        <table border="1" width="100%" cellspacing="0" cellpadding="5">
            <tr>
                <th colspan="4">LAMA PERUSAHAAN BEROPERASI DIBIDANG USAHANYA</th>
            </tr>
            <tr>
                @foreach (['< 1 THN', '0 - 5 THN' , '5 - 10 THN' , '> 10 THN' ] as $operasi) <td><input type="checkbox"
                        name="lama_operasi[]" value="{{ $operasi }}"> {{ $operasi }}</td>
                    @endforeach
            </tr>
            <tr>
                <th colspan="4">STRUKTUR ORGANISASI & MANAGEMENT</th>
            </tr>
            @foreach ([
            'Keputusan di tangan seorang',
            'Direksi terdiri dari anggota keluarga',
            'Manajemen profesional'
            ] as $struktur)
            <tr>
                <td colspan="4"><input type="checkbox" name="struktur_organisasi[]" value="{{ $struktur }}">
                    {{ strtoupper($struktur) }}
                </td>
            </tr>
            @endforeach
        </table>

        <h6 class="mt-4">KAPITAL PERUSAHAAN</h6>
        <table class="table table-bordered">
            <tr>
                <td><strong>RATA-RATA PER BULAN</strong></td>
                <td><input type="text" name="kapital_bulanan" class="form-control"></td>
            </tr>
            <tr>
                <td><strong>JUMLAH HASIL PENJUALAN PER TAHUN</strong></td>
                <td><input type="text" name="kapital_tahunan" class="form-control"></td>
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
                <td><input type="text" name="fasilitas[{{ $i }}][nama]" class="form-control"></td>
                <td><input type="text" name="fasilitas[{{ $i }}][jumlah]" class="form-control"></td>
                <td><input type="text" name="fasilitas[{{ $i }}][keterangan]" class="form-control"></td>
                </tr>
                @endfor
        </table>

        <div class="text-end mt-3">
            <button type="submit" class="btn btn-primary">Simpan Pengajuan</button>
        </div>
    </form>
</div>
@endsection