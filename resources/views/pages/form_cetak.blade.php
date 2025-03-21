@extends('layouts.app')

@section('title', 'Form Pengajuan Kredit')

@section('content')
<!-- [ breadcrumb ] start -->
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
<!-- [ breadcrumb ] end -->

<!-- [ Main Content ] start -->
<div class="card">
    <div class="card-body">
        <form action="#" method="POST" target="_blank">

            @csrf

            <!-- A. Customer Profile -->
            <h6 class="mb-3"><strong>A. CUSTOMER PROFILE</strong></h6>
            <div class="row mb-3">
                <div class="col-md-6">
                    <label>Kategori</label>
                    <input type="text" class="form-control" name="kategori" placeholder="New Customer/T1/T2/T3/T4">
                </div>
                <div class="col-md-6">
                    <label>Group</label>
                    <input type="text" class="form-control" name="group">
                </div>
                <div class="col-md-6">
                    <label>Relation Customer</label>
                    <input type="text" class="form-control" name="relation_customer"
                        placeholder="Lama transaksi dengan BP">
                </div>
                <div class="col-md-6">
                    <label>Karakter Customer</label>
                    <input type="text" class="form-control" name="karakter_customer"
                        placeholder="Excellent, Good, Fair, Poor">
                </div>
                <div class="col-md-6">
                    <label>Posisi AR Aging</label>
                    <input type="text" class="form-control" name="ar_aging" placeholder="Current, 1-30, 31–60UP, 90UP">
                </div>
                <div class="col-md-6">
                    <label>Jenis Sektor/Industry</label>
                    <input type="text" class="form-control" name="sektor">
                </div>
                <div class="col-md-6">
                    <label>Bidang Usaha</label>
                    <input type="text" class="form-control" name="bidang_usaha">
                </div>
                <div class="col-md-6">
                    <label>Lokasi Kerja Customer</label>
                    <select class="form-control" name="lokasi_kerja">
                        <option value="">-- Pilih Lokasi --</option>
                        <option value="Pulau Jawa">Pulau Jawa</option>
                        <option value="Sulawesi">Sulawesi</option>
                        <option value="Kalimantan">Kalimantan</option>
                        <option value="Papua">Papua</option>
                        <option value="Sumatera">Sumatera</option>
                    </select>
                </div>

                <div class="col-md-6">
                    <label>Luas Area/Lahan</label>
                    <input type="text" class="form-control" name="luas_area">
                </div>
                <div class="col-md-6">
                    <label>Mulai Berdiri/Beroperasi</label>
                    <input type="text" class="form-control" name="berdiri" placeholder="Sesuai dalam akta pendirian">
                </div>
                <div class="col-md-6">
                    <label>Modal Disetor</label>
                    <input type="text" class="form-control" name="modal_disetor"
                        placeholder="Sesuai dalam akta pendirian">
                </div>
                <div class="col-md-6">
                    <label>Modal Dasar</label>
                    <input type="text" class="form-control" name="modal_dasar"
                        placeholder="Sesuai dalam akta pendirian">
                </div>
                <div class="col-md-6">
                    <label>Total Produksi</label>
                    <input type="text" class="form-control" name="produksi">
                </div>
                <div class="col-md-6">
                    <label>Pendapatan per tahun</label>
                    <input type="text" class="form-control" name="pendapatan">
                </div>
                <div class="col-md-6">
                    <label>Website</label>
                    <input type="text" class="form-control" name="website">
                </div>
                <div class="col-md-6">
                    <label>Plafond Existing</label>
                    <input type="text" class="form-control" name="plafond_existing">
                </div>
                <div class="col-md-6">
                    <label>TOP Existing</label>
                    <input type="text" class="form-control" name="top_existing">
                </div>
                <div class="col-md-6">
                    <label>Transaksi</label>
                    <select class="form-control" name="transaksi">
                        <option value="">-- Pilih Transaksi --</option>
                        <option value="unit">Unit</option>
                        <option value="part">Part</option>
                        <option value="serv">Serv</option>
                        <option value="rental">Rental</option>
                    </select>
                </div>

            </div>

            <!-- B. Rekomendasi Pengajuan Kredit -->
            <h6 class="mb-3"><strong>B. REKOMENDASI PENGAJUAN KREDIT</strong></h6>
            <div class="row mb-3">
                <div class="col-md-6">
                    <h6><strong>UNIT</strong></h6>
                    <label>Model Unit</label>
                    <input type="text" class="form-control" name="model_unit">
                    <label>Harga Unit</label>
                    <input type="number" class="form-control" name="harga_unit">
                    <label>TOP</label>
                    <input type="text" class="form-control" name="top_unit">
                    <label>Jaminan</label>
                    <input type="text" class="form-control" name="jaminan_unit">
                </div>
                <div class="col-md-6">
                    <h6><strong>PART & SERVICE</strong></h6>
                    <label>Plafond</label>
                    <input type="number" class="form-control" name="plafond_part">
                    <label>TOP</label>
                    <input type="text" class="form-control" name="top_part">
                    <label>Jaminan</label>
                    <input type="text" class="form-control" name="jaminan_part">
                </div>
            </div>

            <!-- C. Historycall Customer -->
            <h6 class="mb-2"><strong>C. HISTORYCALL CUSTOMER</strong></h6>
            <div class="mb-3">
                <label class="form-label"><strong>• HISTORYCALL AMK/BP (Upload Screenshot)</strong></label>
                <input type="file" class="form-control" name="historycall_amk">
                <small class="text-muted">(Di Screen Shoot Historycall SAP BP)</small>
            </div>

            <div class="mb-3">
                <label class="form-label"><strong>• HISTORYCALL UT (Upload Screenshot)</strong></label>
                <input type="file" class="form-control" name="historycall_ut">
                <small class="text-muted">(Di Screen Shoot Historycall di SAP UT cabang masing-masing)</small>
            </div>


            <!-- D. Populasi Unit -->
            <h6 class="mb-3"><strong>D. POPULASI UNIT</strong></h6>
            <div class="row mb-3">
                <div class="col-md-12">
                    <p>(Dilampirkan Informasi Seluruh Populasi Unit sesuai dengan Analisa dan Survei dari Sales)</p>
                    <textarea class="form-control" name="populasi_unit" rows="4"></textarea>
                </div>
            </div>

            <!-- E. Plan Sales -->
            <h6 class="mb-3"><strong>E. PLAN SALES (PENGAJUAN UNIT, PART & SERVICE)</strong></h6>
            <div class="row mb-3">
                <div class="col-md-12">
                    <p>(Dilampirkan Plan Sales secara detail pertahun by komoditi)</p>
                    <textarea class="form-control" name="plan_sales" rows="4"></textarea>
                </div>
            </div>

            <!-- Submit Button -->
            <div class="text-end">
                <button type="submit" class="btn btn-primary">Submit Form</button>
            </div>

        </form>
    </div>
</div>
<!-- [ Main Content ] end -->
@endsection