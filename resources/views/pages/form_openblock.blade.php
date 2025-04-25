@extends('layouts.app')

@section('title', 'Pembukaan Block')

@section('content')
<!-- [ breadcrumb ] start -->
<div class="page-header">
    <div class="page-block">
        <div class="row align-items-center">
            <div class="col-md-12">
                <div class="page-header-title">
                    <h5 class="m-b-10">Formulir Pembukaan Block</h5>
                </div>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Pembukaan Block</a></li>
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
            <div class="card-header">
                <h5>Form Permohonan Pembukaan Block</h5>
            </div>
            <div class="card-body">
                <form action="#" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Tanggal</label>
                                <input type="date" class="form-control" name="tanggal" value="{{ date('Y-m-d') }}"
                                    required>
                            </div>
                            <div class="form-group">
                                <label>Cabang</label>
                                <input type="text" class="form-control" name="cabang" placeholder="nama cabang"
                                    required>
                            </div>
                            <div class="form-group">
                                <label>Customer Code</label>
                                <input type="text" class="form-control" name="customer_code" value="4184" required>
                            </div>
                            <div class="form-group">
                                <label>TIER/S (T) dan RISK (R)</label>
                                <input type="text" class="form-control" name="tier_risk" value="T2 dan R2" required>
                            </div>
                            <div class="form-group">
                                <label>Nama Customer Group</label>
                                <input type="text" class="form-control" name="customer_group" value="PT CAPELLA MEDAN"
                                    required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Plafond</label>
                                <input type="text" class="form-control" name="plafond" value="IDR 792.000.000" required>
                            </div>
                            <div class="form-group">
                                <label>Nominal Pembayaran</label>
                                <div class="row">
                                    <div class="col-md-4">
                                        <select class="form-control" name="payment_period">
                                            <option value="1-30">1-30 Hari</option>
                                            <option value="31-60">31-60 Hari</option>
                                            <option value="90-up">90 Hari ke Atas</option>
                                        </select>
                                    </div>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control" name="payment_amount"
                                            value="792.000.000" required>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Cara Bayar</label>
                                <select class="form-control" name="payment_method">
                                    <option value="transfer">Transfer</option>
                                    <option value="tunai">Tunai</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Tanggal Pembayaran</label>
                                <input type="date" class="form-control" name="payment_date" value="{{ date('Y-m-d') }}"
                                    required>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-md-12">
                            <h6>Catatan Tambahan</h6>
                            <textarea class="form-control" name="notes" rows="3"
                                placeholder="Catatan tambahan (opsional)"></textarea>
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-green">Ajukan Pembukaan Block</button>
                            <button type="reset" class="btn btn-secondary ml-2">Reset</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- [ Main Content ] end -->
@endsection

@section('scripts')
<script>
// Optional: Add any client-side validation or dynamic form behavior
$(document).ready(function() {
    // Example: Format currency input
    $('input[name="payment_amount"]').on('input', function() {
        // Add currency formatting logic
    });
});
</script>
@endsection