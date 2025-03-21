@extends('layouts.app')

@section('title', 'Form Cetak Pengajuan Kredit')

@section('content')
<div class="card p-4">

    <!-- KOP SURAT -->
    <div class="text-center mb-4">
        <div class="d-flex justify-content-between align-items-center">
            <!-- Logo Kiri -->
            <div style="text-align: left;">
                <img src="{{ asset('assets/images/logo/logo.png') }}" alt="Bina Pertiwi Logo" height="50">
            </div>
            <!-- Judul SOP -->
            <div style="text-align: center; flex: 1;">
                <h5 class="mb-0"><strong>STANDARD OPERATING PROCEDURE</strong></h5>
                <p class="mb-0">SOP 002-FIN-2021 | REVISI 00</p>
            </div>
            <!-- Judul Credit Management -->
            <div style="text-align: right;">
                <h5 class="mb-0"><strong>Credit Management</strong></h5>
            </div>
        </div>
        <hr style="border: 1px solid #000; margin-top: 10px;">
    </div>


    <!-- A. CUSTOMER PROFILE -->
    <h6><strong>A. CUSTOMER PROFILE</strong></h6>
    <table class="table table-borderless">
        <tr>
            <td>Kategori</td>
            <td>: {{ $data['kategori'] ?? '-' }}</td>
        </tr>
        <tr>
            <td>Group</td>
            <td>: {{ $data['group'] ?? '-' }}</td>
        </tr>
        <tr>
            <td>Relation Customer</td>
            <td>: {{ $data['relation_customer'] ?? '-' }}</td>
        </tr>
        <tr>
            <td>Karakter Customer</td>
            <td>: {{ $data['karakter_customer'] ?? '-' }}</td>
        </tr>
        <tr>
            <td>Posisi AR Aging</td>
            <td>: {{ $data['ar_aging'] ?? '-' }}</td>
        </tr>
        <tr>
            <td>Jenis Sektor/Industry</td>
            <td>: {{ $data['sektor'] ?? '-' }}</td>
        </tr>
        <tr>
            <td>Bidang Usaha</td>
            <td>: {{ $data['bidang_usaha'] ?? '-' }}</td>
        </tr>
        <tr>
            <td>Lokasi Kerja Customer</td>
            <td>: {{ $data['lokasi_kerja'] ?? '-' }}</td>
        </tr>
        <tr>
            <td>Luas Area/Lahan</td>
            <td>: {{ $data['luas_area'] ?? '-' }}</td>
        </tr>
        <tr>
            <td>Mulai Berdiri/Beroperasi</td>
            <td>: {{ $data['berdiri'] ?? '-' }}</td>
        </tr>
        <tr>
            <td>Modal Disetor</td>
            <td>: {{ $data['modal_disetor'] ?? '-' }}</td>
        </tr>
        <tr>
            <td>Modal Dasar</td>
            <td>: {{ $data['modal_dasar'] ?? '-' }}</td>
        </tr>
        <tr>
            <td>Total Produksi</td>
            <td>: {{ $data['produksi'] ?? '-' }}</td>
        </tr>
        <tr>
            <td>Pendapatan per Tahun</td>
            <td>: {{ $data['pendapatan'] ?? '-' }}</td>
        </tr>
        <tr>
            <td>Website</td>
            <td>: {{ $data['website'] ?? '-' }}</td>
        </tr>
        <tr>
            <td>Plafond Existing</td>
            <td>: {{ $data['plafond_existing'] ?? '-' }}</td>
        </tr>
        <tr>
            <td>TOP Existing</td>
            <td>: {{ $data['top_existing'] ?? '-' }}</td>
        </tr>
        <tr>
            <td>Transaksi</td>
            <td>: {{ $data['transaksi'] ?? '-' }}</td>
        </tr>
    </table>

    <!-- B. REKOMENDASI PENGAJUAN KREDIT -->
    <h6><strong>B. REKOMENDASI PENGAJUAN KREDIT</strong></h6>
    <div class="row">
        <div class="col-md-6">
            <h6><strong>UNIT</strong></h6>
            <table class="table table-borderless">
                <tr>
                    <td>Model Unit</td>
                    <td>: {{ $data['model_unit'] ?? '-' }}</td>
                </tr>
                <tr>
                    <td>Harga Unit</td>
                    <td>: Rp {{ number_format($data['harga_unit'] ?? 0, 0, ',', '.') }}</td>
                </tr>
                <tr>
                    <td>TOP</td>
                    <td>: {{ $data['top_unit'] ?? '-' }}</td>
                </tr>
                <tr>
                    <td>Jaminan</td>
                    <td>: {{ $data['jaminan_unit'] ?? '-' }}</td>
                </tr>
            </table>
        </div>
        <div class="col-md-6">
            <h6><strong>PART & SERVICE</strong></h6>
            <table class="table table-borderless">
                <tr>
                    <td>Plafond</td>
                    <td>: Rp {{ number_format($data['plafond_part'] ?? 0, 0, ',', '.') }}</td>
                </tr>
                <tr>
                    <td>TOP</td>
                    <td>: {{ $data['top_part'] ?? '-' }}</td>
                </tr>
                <tr>
                    <td>Jaminan</td>
                    <td>: {{ $data['jaminan_part'] ?? '-' }}</td>
                </tr>
            </table>
        </div>
    </div>

    <!-- C. HISTORYCALL CUSTOMER -->
    <h6><strong>C. HISTORYCALL CUSTOMER</strong></h6>
    <p><strong>• HISTORYCALL AMK/BP:</strong> File terlampir (frontend only)</p>
    <p><strong>• HISTORYCALL UT:</strong> File terlampir (frontend only)</p>

    <!-- D. POPULASI UNIT -->
    <h6><strong>D. POPULASI UNIT</strong></h6>
    <p>{{ $data['populasi_unit'] ?? '-' }}</p>

    <!-- E. PLAN SALES -->
    <h6><strong>E. PLAN SALES (PENGAJUAN UNIT, PART & SERVICE)</strong></h6>
    <p>{{ $data['plan_sales'] ?? '-' }}</p>

    <!-- Tombol Cetak PDF -->
    <div class="text-end mt-4">
        <form action="#" method="POST" target="_blank">
            @csrf
            @foreach($data as $key => $value)
            <input type="hidden" name="{{ $key }}" value="{{ $value }}">
            @endforeach
            <button type="submit" class="btn btn-danger">Cetak PDF</button>
        </form>
    </div>
</div>
@endsection