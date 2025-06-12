@extends('layouts.komite.app')

@section('content')
<div class="container">

    <!-- Detail Customer Section -->
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Detail Customer</h5>
                    <hr>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="text-muted">Nama Customer</label>
                                <p>PT. Maju Bersama</p>
                            </div>
                            <div class="mb-3">
                                <label class="text-muted">Alamat</label>
                                <p>Jl. Raya Kedung Baruk No. 98, Surabaya</p>
                            </div>
                            <div class="mb-3">
                                <label class="text-muted">Industri</label>
                                <p>Manufaktur</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="text-muted">Bidang Usaha</label>
                                <p>Manufaktur</p>
                            </div>
                            <div class="mb-3">
                                <label class="text-muted">Group Perusahaan</label>
                                <p>Group A</p>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Status Blok Section -->
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Status Customer</h5>
                    <hr>
                    <div class="mb-3">
                        <label class="text-muted">Status</label>
                        <p>Blok</p>
                    </div>
                    <div class="mb-3">
                        <label class="text-muted">Tanggal Terblokir</label>
                        <p>20 Maret 2024</p>
                    </div>
                    <a href="{{ route('bc.form_openblock') }}" class="btn btn-danger w-100">Open Blok</a>
                    <br>
                </div>
            </div>
        </div>


        <div class="row">
            <!-- Platform Chart Section -->
            <div class="col-md-8">
                <div class="card mt-6">
                    <div class="card-body">
                        <h5 class="card-title">Plant</h5>
                        <hr>
                        <div class="text-center">
                            <img src="{{ asset('assets/images/image.png') }}" width="600px" alt="Plant Image"
                                class="img-fluid">
                        </div>
                        <div id="chart"></div>
                        <h5 class="text-center">Keterangan</h5>
                        <p>Tanggal PKPS Dibuat: 1 Januari 2024</p>
                        <p>Tanggal Habis: <span class="text-danger">1 Januari 2025</span></p>
                        <p>Sisa Waktu Sebelum Perpanjang: <span class="text-danger">20 hari</span></p>
                        <p><strong>Prediksi Bulan Ini:</strong> Pembelian Pada bulan ini berpotensi akan naik sebanyak
                            <span>600Jt</span>.
                        </p>

                    </div>
                </div>

            </div>

            <div class="col-md-4">
                <div class="card mt-6">
                    <div class="card-body">
                        <h5 class="card-title">Informasi</h5>
                        <hr>
                        <div class="mb-3">
                            <ul>
                                <li>Customer ini telat membayar Aging AR diatas 30 hari, telah melewati batas waktu yang
                                    ditentukan untuk melakukan pembayaran.</li>
                                <li>PKPS tersisi <span class="text-danger">20 hari</span> masa berlakunya. Silakan
                                    sarankan untuk melakukan perpanjang untuk menghindari customer terblokir.</li>
                                <li><strong>Prediksi Bulan Ini:</strong>
                                    Pembelian Pada bulan ini berpotensi akan naik sebanyak <span>600Jt</span>.</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-12">
            <div class="card mt-6">
                <div class="card-body">
                    <h5 class="card-title">Customer Aging AR</h5>
                    <hr>
                    {{-- <div class="mb-3">
                    <label class="text-muted">Status</label>
                    <p class="text-danger fw-bold">Danger</p>
                </div> --}}
                    <div class="mb-3">
                        <label class="text-muted">Tanggal Terakhir</label>
                        <p>15 Maret 2024</p>
                    </div>
                    <div class="mt-3">
                        <div class="table-responsive">
                            <table class="table table-sm">
                                <thead>
                                    <tr>
                                        <th>Sales Organization</th>
                                        <th>CURRENT</th>
                                        <th>1 - 30</th>
                                        <th>31 - 60</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>UNIT</td>
                                        <td>11,292,030,000</td>
                                        <td>785,880,000</td>
                                        <td>-</td>
                                    </tr>
                                    <tr>
                                        <td>RENT</td>
                                        <td>439,048,200</td>
                                        <td>135,433,500</td>
                                        <td>12,765,000</td>
                                    </tr>
                                    <tr>
                                        <td>PART</td>
                                        <td>19,777,681,127</td>
                                        <td>5,379,760,762</td>
                                        <td>4,257,344,353</td>
                                    </tr>
                                    <tr>
                                        <td>SERV</td>
                                        <td>4,288,932,648</td>
                                        <td>1,471,242,673</td>
                                        <td>2,051,724,199</td>
                                    </tr>
                                    <tr class="table-active fw-bold">
                                        <td>Grand Total</td>
                                        <td>35,797,691,975</td>
                                        <td>7,772,316,935</td>
                                        <td>6,321,833,552</td>
                                    </tr>
                                    {{-- <tr class="table-light">
                                    <td></td>
                                    <td><small>Current</small></td>
                                    <td><small class="text-warning">Overdue</small></td>
                                    <td><small class="text-warning">Overdue</small></td>
                                    <td><small class="text-danger">Critical</small></td>
                                    <td><small class="text-danger">Critical</small></td>
                                </tr> --}}
                                </tbody>
                            </table>
                        </div>
                        <div class="mt-3">
                            <div class="d-flex justify-content-between">
                                <small class="text-muted">Total Outstanding</small>
                                <small class="fw-bold">Rp 49,976,455,512</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>



            <!-- Transaction Table -->
            <div class="card mt-4">
                <div class="card-body">

                    <h5 class="card-title">Invoice Customer</h5>
                    <hr>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Invoice ID</th>
                                <th>Sales Org</th>
                                <th>Tanggal</th>
                                <th>Amount</th>
                                <th>Status</th>
                                <th>Aging</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- UNIT -->
                            <tr>
                                <td>INV202403001</td>
                                <td>UNIT</td>
                                <td>20 Maret 2024</td>
                                <td>11,292,030,000</td>
                                <td><span class="badge bg-success">Current</span></td>
                                <td>0 hari</td>
                            </tr>
                            <tr>
                                <td>INV202402002</td>
                                <td>UNIT</td>
                                <td>15 Feb 2024</td>
                                <td>785,880,000</td>
                                <td><span class="badge bg-warning">Overdue</span></td>
                                <td>25 hari</td>
                            </tr>
                            <!-- RENT -->
                            <tr>

                                <td>INV202403003</td>
                                <td>RENT</td>
                                <td>10 Maret 2024</td>
                                <td>439,048,200</td>
                                <td><span class="badge bg-success">Current</span></td>
                                <td>0 hari</td>
                            </tr>
                            <tr>

                                <td>INV202401004</td>
                                <td>RENT</td>
                                <td>15 Jan 2024</td>
                                <td>29,806,000</td>
                                <td><span class="badge bg-warning">Overdue</span></td>

                                <td>75 hari</td>
                            </tr>
                            <!-- PART -->
                            <tr>

                                <td>INV202403005</td>
                                <td>PART</td>
                                <td>5 Maret 2024</td>
                                <td>19,777,681,127</td>
                                <td><span class="badge bg-success">Current</span></td>
                                <td>0 hari</td>
                            </tr>
                            <!-- SERV -->
                            <tr>

                                <td>INV202312006</td>
                                <td>SERV</td>
                                <td>1 Des 2023</td>
                                <td>70,000</td>
                                <td><span class="badge bg-warning">Overdue</span></td>

                                <td>110 hari</td>
                            </tr>
                        </tbody>

                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
const ctx = document.getElementById('chart').getContext('2d');
const chart = new Chart(ctx, {
    type: 'doughnut',
    data: {
        labels: ['Jumlah', 'Sisa'],
        datasets: [{
            label: 'Total Count',
            data: [300, 700],
            backgroundColor: ['#6a0dad', '#e0e0e0'],
            borderWidth: 0
        }]
    },
    options: {
        cutout: '70%',
        plugins: {
            legend: {
                display: false
            }
        }
    }
});
</script>
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
@endpush
@endsection