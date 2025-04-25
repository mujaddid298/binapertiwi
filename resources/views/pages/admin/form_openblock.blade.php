@extends('layouts.admin.app_admin')

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
                            <h5>Total Potensi Buka Blok <input type="month" name="bulan_tahun"> </h5>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>open blok</th>
                                        <th>Nominal (Amount)</th>
                                        <th>Total (YTD)</th>
                                        <th>Tanggal/Bulan/Tahun</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Pembukaan blok 1</td>
                                        <td><input type="text" class="form-control" name="block1_amount"></td>
                                        <td><input type="text" class="form-control" name="block1_total"></td>
                                        <td><input type="date" class="form-control" name="block1_date"></td>
                                    </tr>
                                    <tr>
                                        <td>Pembukaan blok 2</td>
                                        <td><input type="text" class="form-control" name="block2_amount"></td>
                                        <td><input type="text" class="form-control" name="block2_total"></td>
                                        <td><input type="date" class="form-control" name="block2_date"></td>
                                    </tr>
                                    <tr>
                                        <td>Pembukaan blok 3</td>
                                        <td><input type="text" class="form-control" name="block3_amount"></td>
                                        <td><input type="text" class="form-control" name="block3_total"></td>
                                        <td><input type="date" class="form-control" name="block3_date"></td>
                                    </tr>
                                    <tr>
                                        <td>Pembukaan blok 4</td>
                                        <td><input type="text" class="form-control" name="block4_amount"></td>
                                        <td><input type="text" class="form-control" name="block4_total"></td>
                                        <td><input type="date" class="form-control" name="block4_date"></td>
                                    </tr>
                                    <tr>
                                        <td><strong>TOTAL</strong></td>
                                        <td><input type="text" class="form-control" name="total_amount" readonly></td>
                                        <td><input type="text" class="form-control" name="total_ytd" readonly></td>
                                        <td></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-md-12">
                            <h5>Mohon untuk dibukakan block agar bisa melakukan transaksi kembali.</h5>
                            <div class="form-group">
                                <label>Status PKPS:</label>
                                <input type="text" class="form-control" name="status_pkps" required>
                            </div>
                            <div class="form-group">
                                <label>Jenis/Bidang Bisnis Customer:</label>
                                <input type="text" class="form-control" name="business_type" required>
                            </div>
                            <div class="form-group">
                                <label>Bouwhere:</label>
                                <input type="text" class="form-control" name="bouwhere" required>
                            </div>
                            <div class="form-group">
                                <label>Trend pembayaran dr Bouher (Hari):</label>
                                <input type="number" class="form-control" name="payment_trend" required>
                            </div>
                            <div class="form-group">
                                <label>Potensi Commodity yang dibeli:</label>
                                <input type="text" class="form-control" name="commodity_potential" required>
                            </div>
                            <div class="form-group">
                                <label>Prospek Bisnis:</label>
                                <textarea class="form-control" name="business_prospect" rows="3" required></textarea>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-md-12">
                            <h5>Paym, Pending Bil, Pending Clearing & Total Sales</h5>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>PAYMENT BLN LALU</th>
                                        <th>Nominal (Amount)</th>
                                        <th>Total (YTD)</th>
                                        <th>TANGGAL (CUT OFF PENGAJUAN/ ACTUAL)</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>PAYMENT BLN LALU</td>
                                        <td>:</td>
                                        <td>-</td>
                                        <td>-</td>
                                    </tr>
                                    <tr>
                                        <td>ACTUAL PAYMENT BLN INI (SUDAH MASUK)</td>
                                        <td>:</td>
                                        <td>-</td>
                                        <td>-</td>
                                    </tr>
                                    <tr>
                                        <td>PLAN PAYMENT BLN INI</td>
                                        <td>:</td>
                                        <td>792.000.000</td>
                                        <td>-</td>
                                    </tr>
                                    <tr>
                                        <td>PENDING BILLING (CUT OFF PENGAJUAN)</td>
                                        <td>:</td>
                                        <td>-</td>
                                        <td>-</td>
                                    </tr>
                                    <tr>
                                        <td>TOTAL SALES (CUT OFF PENGAJUAN)</td>
                                        <td>:</td>
                                        <td>-</td>
                                        <td>-</td>
                                    </tr>
                                    <tr>
                                        <td>TOTAL POTENSI BILLING</td>
                                        <td>:</td>
                                        <td>-</td>
                                        <td>-</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <h4 class="mt-4">TANDA TANGAN</h4>
                    <hr>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>BC/MSDH</th>
                                <th>Cs HO</th>
                                <th>Manager Sales</th>
                                <th>GM Sales</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><img src="path/to/default-signature.png" alt="Tanda Tangan BM" style="width: 100px; height: auto;"></td>
                                <td><img src="path/to/default-signature.png" alt="Tanda Tangan ADH" style="width: 100px; height: auto;"></td>
                                <td><img src="path/to/default-signature.png" alt="Tanda Tangan MSRH" style="width: 100px; height: auto;"></td>
                                <td><img src="path/to/default-signature.png" alt="Tanda Tangan CAR" style="width: 100px; height: auto;"></td>
                            </tr>
                        </tbody>
                    </table>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Credit & Collection</th>
                                <th>Manager Finance</th>
                                <th>GM Finance</th>
                                <th>Presiden Direktur</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><img src="path/to/default-signature.png" alt="Tanda Tangan CAR" style="width: 100px; height: auto;"></td>
                                <td><img src="path/to/default-signature.png" alt="Tanda Tangan CAR" style="width: 100px; height: auto;"></td>
                                <td><img src="path/to/default-signature.png" alt="Tanda Tangan CAR" style="width: 100px; height: auto;"></td>
                                <td><img src="path/to/default-signature.png" alt="Tanda Tangan CAR" style="width: 100px; height: auto;"></td>
                            </tr>
                        </tbody>
                    </table>

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