@extends('layouts.komite.app')

@section('title', 'Persetujuan Open Block')

@section('content')
<div class="card p-4">

    <div class="container">
        <h2>Detail Pengajuan OpenBlock</h2> 
    <table class="table table-bordered">
        <tr>
            <th>Tanggal</th>
            <td>{{ $openblock->tanggal }}</td>
        </tr>
        <tr>
            <th>Diajukan oleh/Jabatan</th>
            <td>{{ $openblock->diajukan }}</td>
        </tr>
        <tr>
            <th>Cabang</th>
            <td>{{ $openblock->cabang }}</td>
        </tr>
        <tr>
            <th>Customer Code</th>
            <td>{{ $openblock->customer_code }}</td>
        </tr>
        <tr>
            <th>Nama Customer Group</th>
            <td>{{ $openblock->customer->nama ?? '-' }}</td>
        </tr>
        <tr>
            <th>TIER/S (T) dan RISK (R)</th>
            <td>{{ $openblock->tier_risk }}</td>
        </tr>
        <!-- Tambahkan field lain sesuai kebutuhan -->
    </table>

    <h4>Detail Aging</h4>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Aging</th>
                <th>Nilai</th>
                <th>Nominal Plan Pay</th>
                <th>D/M/Y</th>
            </tr>
        </thead>
        <tbody>
            @foreach($openblock->agings as $aging)
                <tr>
                    <td>{{ $aging->aging }}</td>
                    <td>{{ number_format($aging->nilai, 0, ',', '.') }}</td>
                    <td>{{ number_format($aging->plan, 0, ',', '.') }}</td>
                    <td>{{ $aging->tanggal_aging }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{-- Total Potensi Buka Blok --}}
    <h4>Total Potensi Buka Blok ({{ $openblock->bulan_tahun ?? '-' }})</h4>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Open Blok</th>
                <th>Nominal (Amount)</th>
                <th>Total (YTD)</th>
                <th>Tanggal/Bulan/Tahun</th>
            </tr>
        </thead>
        <tbody>
            @for ($i = 1; $i <= 4; $i++)
                <tr>
                    <td>Pembukaan blok {{ $i }}</td>
                    <td>{{ number_format($openblock->{'block'.$i.'_amount'}, 0, ',', '.') }}</td>
                    <td>{{ number_format($openblock->{'block'.$i.'_total'}, 0, ',', '.') }}</td>
                    <td>{{ $openblock->{'block'.$i.'_date'} }}</td>
                </tr>
            @endfor
            <tr>
                <td><strong>TOTAL</strong></td>
                <td>{{ number_format($openblock->total_amount, 0, ',', '.') }}</td>
                <td>{{ number_format($openblock->total_ytd, 0, ',', '.') }}</td>
                <td></td>
            </tr>
        </tbody>
    </table>

    {{-- paym, pending bil, pending clearing & total sales --}}
    <h4>Paym, Pending Billing, Pending Clearing & Total Sales</h4>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th colspan="2">Keterangan</th>
                <th>Nominal (Amount)</th>
                <th>Total (YTD)</th>
                <th>Tanggal</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td colspan="2">PAYMENT BLN LALU</td>
                <td>{{ number_format($openblock->payment_last_month, 0, ',', '.') }}</td>
                <td>{{ number_format($openblock->payment_last_month_ytd, 0, ',', '.') }}</td>
                <td>{{ $openblock->payment_last_month_date }}</td>
            </tr>
            <tr>
                <td colspan="2">ACTUAL PAYMENT BLN INI (SUDAH MASUK)</td>
                <td>{{ number_format($openblock->actual_payment, 0, ',', '.') }}</td>
                <td>{{ number_format($openblock->actual_payment_ytd, 0, ',', '.') }}</td>
                <td>{{ $openblock->actual_payment_date }}</td>
            </tr>
            <tr>
                <td colspan="2">PLAN PAYMENT BLN INI</td>
                <td>{{ number_format($openblock->plan_payment, 0, ',', '.') }}</td>
                <td>{{ number_format($openblock->plan_payment_ytd, 0, ',', '.') }}</td>
                <td>{{ $openblock->plan_payment_date }}</td>
            </tr>
            <tr>
                <td colspan="2">PENDING BILLING (CUT OFF PENGAJUAN)</td>
                <td>{{ number_format($openblock->pending_billing, 0, ',', '.') }}</td>
                <td>{{ number_format($openblock->pending_billing_ytd, 0, ',', '.') }}</td>
                <td>{{ $openblock->pending_billing_date }}</td>
            </tr>
            <tr>
                <td colspan="2">TOTAL SALES (CUT OFF PENGAJUAN)</td>
                <td>{{ number_format($openblock->total_sales, 0, ',', '.') }}</td>
                <td>{{ number_format($openblock->total_sales_ytd, 0, ',', '.') }}</td>
                <td>{{ $openblock->total_sales_date }}</td>
            </tr>
        </tbody>
    </table>

    {{-- Field Lain --}}
    <h4>Informasi Tambahan</h4>
    <table class="table table-bordered">
        <tr>
            <th>Status PKPS</th>
            <td>{{ $openblock->status_pkps }}</td>
        </tr>
        <tr>
            <th>Jenis/Bidang Bisnis Customer</th>
            <td>{{ $openblock->business_type }}</td>
        </tr>
        <tr>
            <th>Bouwhere</th>
            <td>{{ $openblock->bouwhere }}</td>
        </tr>
        <tr>
            <th>Trend pembayaran dr Bouher (Hari)</th>
            <td>{{ $openblock->payment_trend }}</td>
        </tr>
        <tr>
            <th>Potensi Commodity yang dibeli</th>
            <td>{{ $openblock->commodity_potential }}</td>
        </tr>
        <tr>
            <th>Prospek Bisnis</th>
            <td>{{ $openblock->business_prospect }}</td>
        </tr>
    </table>

    <h3>Form Persetujuan</h3>
    <form action="{{ route('openblock.approval', $openblock->id) }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="komentar">Komentar</label>
            <div class="form-check">
                <input class="form-check-input" type="radio" id="disetujui" name="status" value="disetujui">
                <label class="form-check-label" for="disetujui">Disetujui</label>
            </div>  
            <div class="form-check">
                <input class="form-check-input" type="radio" id="disetujui_dengan_syarat" name="status" value="disetujui bersyarat">
                <label class="form-check-label" for="disetujui_dengan_syarat">Disetujui dengan Syarat</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" id="ditolak" name="status" value="ditolak">
                <label class="form-check-label" for="ditolak">Ditolak</label>
            </div>
            <textarea name="komentar" class="form-control" rows="5"></textarea>
        </div>
        
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
<br><br>
    <h4>Riwayat Persetujuan</h4>
    @foreach ($persetujuan as $persetujuan)
        <div>
            <strong>{{ $persetujuan->user->name }} (Level {{ $persetujuan->level }})</strong> - 
            <span>{{ $persetujuan->status }}</span><br>
            <em>{{ $persetujuan->komentar }}</em>
        </div>
    @endforeach

</div>
@endsection