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
                <form action="{{ route('openblok.store') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            
                            <div class="form-group">
                                <label>Tanggal</label>
                                <input type="date" class="form-control" name="tanggal" value="{{ date('Y-m-d') }}"
                                    required>
                            </div>
                            <div class="form-group">
                                <label>Diajukan oleh/ jabatan</label>
                                <input type="text" class="form-control" name="diajukan" required>
                            </div>
                            <div class="form-group">
                                <label>Cabang</label>
                                <select class="form-control" name="cabang" required>
                                    <option value="">Pilih Cabang</option>
                                    <option value="Pekanbaru">Pekanbaru</option>
                                    <option value="Palembang">Palembang</option>
                                    <option value="Tanjung Enim">Tanjung Enim</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Customer Code</label>
                                <input type="text" class="form-control" name="customer_code" value="{{ $customer->id }}" required>
                            </div>
                            <div class="form-group">
                                <label>TIER/S (T) dan RISK (R)</label>
                                <input type="text" class="form-control" name="tier_risk" value="{{ $agingar->risk_rating . ' dan ' . $agingar->tiers }}" required>
                            </div>
                           
                           
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Nama Customer Group</label>
                                <input type="text" class="form-control" name="customer_group" value="{{ $customer->nama }}" required>
                            </div>
                            <div class="form-group">
                                <label>Plafond</label>
                                <input type="text" class="form-control" name="plafond" value="" required>
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

                            <div class="form-group">
                                <label>Nilai Total Piutang</label>
                                <input type="text" class="form-control" name="nilai_piutang" value="IDR {{ number_format($totalNilai, 0, ',', '.') }}"
                                    required>
                            </div>
                        </div>
                    </div>

                    <hr>

                    <p><strong>AGING AR DITARIK HINGGA AKHIR BULAN ({{ \Carbon\Carbon::now()->endOfMonth()->translatedFormat('d F Y') }})</strong></p>
                    <div class="table-responsive mt-3">
                        <table class="table table-bordered">
                            <thead class="table-light">
                                <tr>
                                    <th>Aging</th>
                                    <th>Nilai</th>
                                    <th>Nominal Plan Pay</th>
                                    <th>D/M/Y</th> 
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($excelData as $aging => $data)
                                    <tr>
                                        <td>{{ $aging }}</td>
                                        <td>{{ $data['nilai'] ? number_format($data['nilai'], 0, ',', '.') : '' }}</td>
                                        <td>{{ $data['plan'] ? number_format($data['plan'], 0, ',', '.') : '' }}</td>
                                        <td>{{ $data['tanggal'] }}</td> 
                                    </tr>
                
                                    <!-- Masukkan data tersembunyi untuk setiap baris -->
                                    <input type="hidden" name="data[{{ $aging }}][nilai]" value="{{ $data['nilai'] }}">
                                    <input type="hidden" name="data[{{ $aging }}][plan]" value="{{ $data['plan'] }}">
                                    <input type="hidden" name="data[{{ $aging }}][tanggal]" value="{{ $data['tanggal'] }}"> 
                                @endforeach
                                <tr class="table-secondary fw-bold">
                                    <td>Total</td>
                                    <td>IDR {{ number_format($totalNilai, 0, ',', '.') }}</td>
                                    <td>{{ number_format($totalPlan, 0, ',', '.') }}</td>
                                    <td>-</td> 
                                </tr>
                                <!-- Jika total juga perlu dikirim -->
                                <input type="hidden" name="totalNilai" value="{{ $totalNilai }}">
                                <input type="hidden" name="totalPlan" value="{{ $totalPlan }}">
                            </tbody>
                        </table>
                    </div>
                



<hr>
                    <div class="row mt-3">
                        <div class="col-md-12">
                            <h5>
                                Total Potensi Buka Blok
                                <input type="month" name="bulan_tahun" value="{{ $bulanTahun ?? date('Y-m') }}" onchange="this.form.submit()" required>
                            </h5>
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
                                        <td><input type="text" class="form-control" name="block1_amount" value="{{ $blocks->block1_amount ?? '' }}"></td>
                                        <td><input type="text" class="form-control" name="block1_total" value="{{ $blocks->block1_total ?? '' }}"></td>
                                        <td><input type="date" class="form-control" name="block1_date" value="{{ $blocks->block1_date ?? '' }}"></td>
                                    </tr>
                                    <tr>
                                        <td>Pembukaan blok 2</td>
                                        <td><input type="text" class="form-control" name="block2_amount" value="{{ $blocks->block2_amount ?? '' }}"></td>
                                        <td><input type="text" class="form-control" name="block2_total" value="{{ $blocks->block2_total ?? '' }}"></td>
                                        <td><input type="date" class="form-control" name="block2_date" value="{{ $blocks->block2_date ?? '' }}"></td>
                                    </tr>
                                    <tr>
                                        <td>Pembukaan blok 3</td>
                                        <td><input type="text" class="form-control" name="block3_amount" value="{{ $blocks->block3_amount ?? '' }}"></td>
                                        <td><input type="text" class="form-control" name="block3_total" value="{{ $blocks->block3_total ?? '' }}"></td>
                                        <td><input type="date" class="form-control" name="block3_date" value="{{ $blocks->block3_date ?? '' }}"></td>
                                    </tr>
                                    <tr>
                                        <td>Pembukaan blok 4</td>
                                        <td><input type="text" class="form-control" name="block4_amount" value="{{ $blocks->block4_amount ?? '' }}"></td>
                                        <td><input type="text" class="form-control" name="block4_total" value="{{ $blocks->block4_total ?? '' }}"></td>
                                        <td><input type="date" class="form-control" name="block4_date" value="{{ $blocks->block4_date ?? '' }}"></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    
                    <div class="table-responsive mt-5">
                        <table class="table table-bordered">
                            <thead>
                                <tr class="text-white text-center" style="background-color: #d7dad9;">
                                    <th colspan="2">paym, pending bil, pending clearing & total sales</th>
                                    <th>Nominal (Amount)</th>
                                    <th>Total (YTD)</th>
                                    <th>TANGGAL (CUT OFF PENGAJUAN / ACTUAL)</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td colspan="2">PAYMENT BLN LALU</td>
                                    <td><input type="text" name="payment_last_month" class="form-control"></td>
                                    <td><input type="text" name="payment_last_month_ytd" class="form-control"></td>
                                    <td><input type="date" name="payment_last_month_date" class="form-control"></td>
                                </tr>
                                <tr>
                                    <td colspan="2">ACTUAL PAYMENT BLN INI (SUDAH MASUK)</td>
                                    <td><input type="text" name="actual_payment" class="form-control"></td>
                                    <td><input type="text" name="actual_payment_ytd" class="form-control"></td>
                                    <td><input type="date" name="actual_payment_date" class="form-control"></td>
                                </tr>
                                <tr>
                                    <td colspan="2">PLAN PAYMENT BLN INI</td>
                                    <td><input type="text" name="plan_payment" class="form-control"></td>
                                    <td><input type="text" name="plan_payment_ytd" class="form-control"></td>
                                    <td><input type="date" name="plan_payment_date" class="form-control"></td>
                                </tr>
                                <tr>
                                    <td colspan="2">PENDING BILLING (CUT OFF PENGAJUAN)</td>
                                    <td><input type="text" name="pending_billing" class="form-control"></td>
                                    <td><input type="text" name="pending_billing_ytd" class="form-control"></td>
                                    <td><input type="date" name="pending_billing_date" class="form-control"></td>
                                </tr>
                                <tr>
                                    <td colspan="2">TOTAL SALES (CUT OFF PENGAJUAN)</td>
                                    <td><input type="text" name="total_sales" class="form-control"></td>
                                    <td><input type="text" name="total_sales_ytd" class="form-control"></td>
                                    <td><input type="date" name="total_sales_date" class="form-control"></td>
                                </tr>
                                <tr style="background-color: #cccfd1;">
                                    <td colspan="2"><strong>TOTAL POTENSI BILLING</strong></td>
                                    <td><p ></p></td>
                                    <td><p ></p></td>
                                    <td><p ></p></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    
                    <div class="row mt-3">
                        <div class="col-md-12">
                            <h5>Mohon untuk dibukakan block agar bisa melakukan transaksi kembali.</h5>
                            <div class="form-group row align-items-center">
                                <label class="col-md-4 col-form-label">Status PKPS:</label>
                                <div class="col-md-8">
                                    <input type="text" class="form-control" name="status_pkps" required>
                                </div>
                            </div>
                            <div class="form-group row align-items-center">
                                <label class="col-md-4 col-form-label">Jenis/Bidang Bisnis Customer:</label>
                                <div class="col-md-8">
                                    <input type="text" class="form-control" name="business_type" value="{{$customer->bidang_usaha}}" required>
                                </div>
                            </div>
                            <div class="form-group row align-items-center">
                                <label class="col-md-4 col-form-label">Bouwhere:</label>
                                <div class="col-md-8">
                                    <input type="text" class="form-control" name="bouwhere" required>
                                </div>
                            </div>
                            <div class="form-group row align-items-center">
                                <label class="col-md-4 col-form-label">Trend pembayaran dr Bouher (Hari):</label>
                                <div class="col-md-8">
                                    <input type="number" class="form-control" name="payment_trend" required>
                                </div>
                            </div>
                            <div class="form-group row align-items-center">
                                <label class="col-md-4 col-form-label">Potensi Commodity yang dibeli:</label>
                                <div class="col-md-8">
                                    <input type="text" class="form-control" name="commodity_potential" required>
                                </div>
                            </div>
                            <div class="form-group row align-items-center">
                                <label class="col-md-4 col-form-label">Prospek Bisnis:</label>
                                <div class="col-md-8">
                                    <textarea class="form-control" name="business_prospect" rows="3" required></textarea>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- <h4 class="mt-4">TANDA TANGAN</h4>
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
                    </table> --}}

                    <div class="row mt-3">
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-green">Ajukan Pembukaan Block</button>
                           
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