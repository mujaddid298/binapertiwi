@extends('layouts.admin.app_admin')

@section('title', 'Detail Customer')

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
                                <p>{{ $customer->nama }}</p>
                            </div>
                            <div class="mb-3">
                                <label class="text-muted">Alamat</label>
                                <p>{{ $customer->alamat }}</p>
                            </div>
                            @php
                                $industry = trim($customer->industry, '[]');
                                $industry = str_replace('"', '', $industry);
                                $industry = preg_replace('/"\s+"/', ', ', $industry);
                                if (strpos($industry, ',') === false) {
                                    $industry = preg_replace('/\s+/', ', ', $industry);
                                }
                            @endphp
                            <div class="mb-3">
                                <label class="text-muted">Industri</label>
                                <p>{{ $industry }}</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="text-muted">Bidang Usaha</label>
                                <p>{{ $customer->bidang_usaha }}</p>
                            </div>
                            <div class="mb-3">
                                <label class="text-muted">Group Perusahaan</label>
                                <p>{{ $customer->group_perusahaan }}</p>
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
                        <p>{{ $customer->status }}</p>
                    </div>
                    <div class="mb-3">
                        <label class="text-muted">Tanggal Terblokir</label>
                        <p>{{ $customer->tanggal_terblokir }}</p>
                    </div>
                    <a href="{{ route('admin.form_openblock', ['id' => $customer->id]) }}" class="btn btn-danger w-100">Open Blok</a>
                    <br>
                </div>
            </div>
        </div>
    </div>
    <!-- Platform Chart Section -->
    <div class="row">
        <div class="col-md-8">
            <div class="card mt-6">
                <div class="card-body">
                    <h5 class="card-title">Plant</h5>
                    <hr>
                    <div class="text-center">
                        <img src="{{ asset('assets/images/image.png') }}" width="600px" alt="Plant Image" class="img-fluid">
                    </div>
                    <div id="chart"></div>
                    <h5 class="text-center">Keterangan</h5>
                    <p>Tanggal PKPS Dibuat: {{ $customer->tanggal_pkps_dibuat }}</p>
                    <p>Tanggal Habis: <span class="text-danger">{{ $customer->tanggal_habis }}</span></p>
                    <p>Sisa Waktu Sebelum Perpanjang: <span class="text-danger">{{ $customer->sisa_waktu_sebelum_perpanjang }} hari</span></p>
                    <p><strong>Prediksi Bulan Ini:</strong> Pembelian Pada bulan ini berpotensi akan naik sebanyak <span>{{ $customer->prediksi_bulan_ini }}</span>.</p>

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
                            @foreach($invoices as $inv)
    @if($inv->days_late > 30)
        <li>
            Customer ini telat membayar invoice <strong>{{ $inv->id }}</strong> 
            selama <strong>{{ $inv->days_late }} hari</strong>, 
            telah melewati batas waktu yang ditentukan.
        </li>
    @endif
@endforeach

                            <li>PKPS tersisi <span class="text-danger">{{ $customer->pkps_tersisi }} hari</span> masa berlakunya. Silakan sarankan untuk melakukan perpanjang untuk menghindari customer terblokir.</li>
                            <li><strong>Prediksi Bulan Ini:</strong>
                                Pembelian Pada bulan ini berpotensi akan naik sebanyak <span>{{ $customer->prediksi_bulan_ini }}</span>.</li>
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
                <p>{{ $customer->tanggal_terakhir }}</p>
            </div>
            <div class="mt-3">
                <div class="table-responsive">
                    <h5>Rekap Outstanding AR per Aging</h5>
                    <table class="table table-bordered table-sm" id="agingTable">
                        <thead class="table">
                            <tr>
                                <th onclick="sortTableaging(0)">Sales Organization &#x25B2;&#x25BC;</th>
                                @foreach ($agingCategories as $index => $aging)
                                    <th onclick="sortTableaging({{ $index + 1 }})">{{ $aging }} &#x25B2;&#x25BC;</th>
                                @endforeach
                                <th onclick="sortTable({{ count($agingCategories) + 1 }})">Grand Total &#x25B2;&#x25BC;</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($matrix as $org => $agingData)
                                <tr>
                                    <td>{{ $org }}</td>
                                    @foreach ($agingCategories as $aging)
                                        <td>{{ number_format($agingData[$aging] ?? 0, 0, ',', '.') }}</td>
                                    @endforeach
                                    <td><strong>{{ number_format($agingData['total'], 0, ',', '.') }}</strong></td>
                                </tr>
                            @endforeach
                            <tr class="table fw-bold" id="grandTotalRow">
                                <td>Grand Total</td>
                                @foreach ($agingCategories as $aging)
                                    <td>{{ number_format($grandTotals[$aging], 0, ',', '.') }}</td>
                                @endforeach
                                <td>{{ number_format($grandTotals['total'], 0, ',', '.') }}</td>
                            </tr>
                        </tbody>
                    </table>

                    <script>
                        let sortDirectionaging = {};
                        
                        function sortTableaging(colIndex) {
                            const table = document.getElementById("agingTable");
                            const tbody = table.tBodies[0];
                        
                            // Ambil semua baris kecuali baris Grand Total
                            const rows = Array.from(tbody.querySelectorAll("tr:not(#grandTotalRow)"));
                        
                            // Toggle arah sorting (asc / desc)
                            sortDirection[colIndex] = !sortDirection[colIndex];
                        
                            rows.sort((a, b) => {
                                let cellA = a.cells[colIndex].innerText.replace(/\./g, '').replace(',', '') || '';
                                let cellB = b.cells[colIndex].innerText.replace(/\./g, '').replace(',', '') || '';
                        
                                if (colIndex === 0) {
                                    // Sorting alfabet untuk kolom pertama
                                    cellA = cellA.toLowerCase();
                                    cellB = cellB.toLowerCase();
                                    if(cellA < cellB) return sortDirection[colIndex] ? -1 : 1;
                                    if(cellA > cellB) return sortDirection[colIndex] ? 1 : -1;
                                    return 0;
                                } else {
                                    // Sorting numerik untuk kolom lainnya
                                    cellA = parseInt(cellA) || 0;
                                    cellB = parseInt(cellB) || 0;
                                    return sortDirection[colIndex] ? cellA - cellB : cellB - cellA;
                                }
                            });
                        
                            // Pindahkan baris yang sudah disortir ke tbody (tanpa baris Grand Total)
                            rows.forEach(row => tbody.appendChild(row));
                        
                            // Pastikan baris Grand Total tetap di paling bawah (append sekali lagi)
                            const grandTotalRow = document.getElementById("grandTotalRow");
                            tbody.appendChild(grandTotalRow);
                        }
                        </script>

                </div>
                
                
                <div class="mt-3">
                    <div class="d-flex justify-content-between">
                        <small class="text-muted">Total Outstanding</small>
                        <small class="fw-bold">Rp {{ number_format($outstanding_total, 0, ',', '.') }}</small>
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
        <table class="table" id="invoiceTable">
            <thead>
                <tr> 
                    <th onclick="sortTable(0)">Invoice ID &#x25B2;&#x25BC;</th>
                    <th onclick="sortTable(1)">Sales Org &#x25B2;&#x25BC;</th>
                    <th onclick="sortTable(2)">Tanggal &#x25B2;&#x25BC;</th>
                    <th onclick="sortTable(3)">Amount &#x25B2;&#x25BC;</th>
                    <th onclick="sortTable(4)">Status &#x25B2;&#x25BC;</th>
                    <th onclick="sortTable(5)">Aging &#x25B2;&#x25BC;</th>
                </tr>
            </thead>
            <tbody>
                @foreach($agingInvoices as $invoice)
                <tr> 
                    <td>{{ $invoice->id }}</td>
                    <td>{{ $invoice->sales_organization }}</td>
                    <td>{{ $invoice->net_due_date }}</td>
                    <td>Rp {{ number_format($invoice->outstanding_ar, 0, ',', '.') }}</td>
                    <td>
                        @if($invoice->days_late > 0)
                            <span class="badge bg-warning">Overdue</span>
                        @else
                            <span class="badge bg-success">Current</span>
                        @endif
                    </td>
                    <td>{{ $invoice->days_late }} hari</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        
        <script>
        let sortDirection = {};
        
        function sortTable(colIndex) {
            const table = document.getElementById("invoiceTable");
            const tbody = table.tBodies[0];
            const rows = Array.from(tbody.querySelectorAll("tr"));
        
            // Toggle arah sorting (asc / desc)
            sortDirection[colIndex] = !sortDirection[colIndex];
        
            rows.sort((a, b) => {
                let cellA = a.cells[colIndex].innerText.trim();
                let cellB = b.cells[colIndex].innerText.trim();
        
                // Parsing berdasarkan tipe kolom
                if(colIndex === 0 || colIndex === 5) {
                    // Invoice ID dan Aging (hari) - angka (hapus kata "hari" di aging)
                    if(colIndex === 5) {
                        cellA = parseInt(cellA.replace(' hari', '').replace(/\./g, '')) || 0;
                        cellB = parseInt(cellB.replace(' hari', '').replace(/\./g, '')) || 0;
                    } else {
                        cellA = parseInt(cellA) || 0;
                        cellB = parseInt(cellB) || 0;
                    }
                    return sortDirection[colIndex] ? cellA - cellB : cellB - cellA;
                } else if (colIndex === 3) {
                    // Amount (Rp xxx.xxx)
                    cellA = cellA.replace('Rp', '').replace(/\./g, '').trim();
                    cellB = cellB.replace('Rp', '').replace(/\./g, '').trim();
                    cellA = parseInt(cellA) || 0;
                    cellB = parseInt(cellB) || 0;
                    return sortDirection[colIndex] ? cellA - cellB : cellB - cellA;
                } else if (colIndex === 2) {
                    // Tanggal (format tanggal bisa kamu sesuaikan, contoh YYYY-MM-DD assumed)
                    let dateA = new Date(cellA);
                    let dateB = new Date(cellB);
                    return sortDirection[colIndex] ? dateA - dateB : dateB - dateA;
                } else {
                    // Sales Org & Status (textual)
                    cellA = cellA.toLowerCase();
                    cellB = cellB.toLowerCase();
                    if(cellA < cellB) return sortDirection[colIndex] ? -1 : 1;
                    if(cellA > cellB) return sortDirection[colIndex] ? 1 : -1;
                    return 0;
                }
            });
        
            // Render ulang rows
            rows.forEach(row => tbody.appendChild(row));
        }
        </script>
        
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
