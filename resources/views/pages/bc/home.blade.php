@extends('layouts.bc.app')

@section('title', 'Home')

@section('content')
<!-- [ breadcrumb ] start -->

<style>
    .news-list .news-item {
    transition: box-shadow 0.2s;
}
.news-list .news-item:hover {
    box-shadow: 0 2px 8px rgba(0,0,0,0.04);
}
.sidebar-search-input {
    background-color: #e6f9ec; /* hijau muda */
    border-color: #28a745;
    color: #155724;
}
.sidebar-search-input:focus {
    border-color: #218838;
    box-shadow: 0 0 0 0.2rem rgba(40,167,69,.25);
}
.sidebar-search-btn {
    border-color: #28a745;
    background-color: #28a745;
    color: #fff;
}
.sidebar-search-btn:hover {
    background-color: #218838;
    border-color: #1e7e34;
    color: #fff;
}
.sidebar-link.active,
.sidebar-link.active a {
    background-color: #28a745 !important; /* hijau */
    color: #fff !important;
    border-color: #218838 !important;
}
.sidebar-link.active a i {
    color: #fff !important;
}
</style>
<div class="page-header">
    <div class="page-block">
        <div class="row align-items-center">
            <div class="card" style="margin: 1.1%">
                <div class="col-md-12">
                    <div class="col-md-6">
                    <form method="GET" action="{{ route('bc.home') }} " class="p-4">
                        <select name="plant" class="form-control" onchange="this.form.submit()">
                            <option value="">Select Plant</option>
                            <option value="PKB" {{ request('plant') == 'pkb' ? 'selected' : '' }}>Pekanbaru</option>
                            <option value="PLB" {{ request('plant') == 'plb' ? 'selected' : '' }}>Palembang</option>
                            <option value="tje" {{ request('plant') == 'tje' ? 'selected' : '' }}>Tanjung Enim</option>
                        </select>
                    </form>
                    </div>
                    
                    <canvas id="customerChart" style="height: 400px;" class="p-4"></canvas>
                        <div class="card-header">
                            <h5>Aging AR Report</h5>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped">
                                    <thead class="thead-dark">
                                        <tr>
                                            <th>Sales Organization</th>
                                            @foreach($agingCategories as $aging)
                                                <th>{{ $aging }}</th>
                                            @endforeach
                                            <th>Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($matrix as $org => $agingValues)
                                            <tr>
                                                <td>{{ $org }}</td>
                                                @foreach($agingCategories as $aging)
                                                    <td>{{ number_format($agingValues[$aging] ?? 0, 2) }}</td>
                                                @endforeach
                                                <td><b>{{ number_format($agingValues['total'] ?? 0, 2) }}</b></td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>Grand Total</th>
                                            @foreach($agingCategories as $aging)
                                                <th>{{ number_format($grandTotals[$aging] ?? 0, 2) }}</th>
                                            @endforeach
                                            <th><b>{{ number_format($grandTotals['total'] ?? 0, 2) }}</b></th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            <div class="col-md-12">
                <div class="page-header-title">
                    <h5 class="m-b-10">Home</h5>
                </div>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('bc.home') }}">Home</a></li>
                    {{-- <li class="breadcrumb-item" aria-current="page">Dashboard</li> --}}
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- [ breadcrumb ] end -->

<!-- [ Main Content ] start -->
<div class="row">
    <!-- Sidebar Start -->
    
    <div class="col-md-3">
        <div class="card " style="border-radius: 5px;">
            <div class="card-body p-0">
                <div class="sidebar-title p-3 border-bottom">
                    <h5 class="mb-0" style="font-weight: 600;">Nama Customer</h5>
                </div>
                <!-- Search Bar Start -->
                <div class="p-3 border-bottom">
                    <form action="#" method="GET">
                        <div class="input-group">
                           
                            <input type="text" class="form-control sidebar-search-input" placeholder="Cari menu..." name="search_menu">
                            <button class="btn sidebar-search-btn" type="submit">
                                <i class="ti ti-search"></i>
                            </button>
                        </div>
                    </form>
                </div>
                <!-- Search Bar End -->
                <ul class="list-group list-group-flush">
                    @foreach($customers as $customer)
                        <li class="list-group-item sidebar-link {{ isset($selectedCustomer) && $selectedCustomer->id == $customer->id ? 'active' : '' }} m-2" style="border-radius: 5px;">
                            <a href="{{ route('bc.home', ['id' => $customer->id]) }}" class="d-flex align-items-center text-decoration-none text-dark ">
                                <i class="ti ti-user me-2"></i> {{ $customer->nama }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
    <!-- Sidebar End -->

    <!-- Main Content Start -->
    <div class="col-md-9">
        <div class="row">
            <!-- [ sample-page ] start -->
            <div class="col-md-6 col-xl-3">
                <div class="card">
                    <div class="card-body">
                        <h6 class="mb-2 f-w-400 text-muted">Total Customer</h6>
                        <h4 class="mb-3">{{ $totalCustomer ?? 0 }}</h4>
                        <p class="mb-0 text-muted text-sm">Customer Aktif</p>
                    </div>
                </div>
            </div>
            {{-- <div class="col-md-6 col-xl-3">
                <div class="card">
                    <div class="card-body">
                        <h6 class="mb-2 f-w-400 text-muted">Total Penjualan</h6>
                        <h4 class="mb-3">78,250 <span class="badge bg-light-success border border-success"><i
                                    class="ti ti-trending-up"></i> 70.5%</span></h4>
                        <p class="mb-0 text-muted text-sm">Perkembangan <span class="text-success">8,900</span> hari ini
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-xl-3">
                <div class="card">
                    <div class="card-body">
                        <h6 class="mb-2 f-w-400 text-muted">Total Order</h6>
                        <h4 class="mb-3">18,000 <span class="badge bg-light-warning border border-warning"><i
                                    class="ti ti-trending-up"></i> 27.4%</span></h4>
                        <p class="mb-0 text-muted text-sm"> Perkembangan <span class="text-warning">1,943</span> hari
                            ini</p>
                    </div>
                </div>
            </div> --}}

{{-- chart --}}

            <div class="col-md-6 col-xl-3">
                <div class="card">
                    <div class="card-body">
                        <h6 class="mb-2 f-w-400 text-muted">Total AR</h6>
                        <h4 class="mb-3">{{ number_format($totalAR ?? 0, 2) }}</h4>
                        <p class="mb-0 text-muted text-sm">Outstanding AR</p>
                    </div>
                </div>
            </div>

            

            <div class=" text-right">
                <a href="{{ route('admin.formTingkat3') }}" class="btn btn-green mr-1 btn-a" style="float: left;">Tambah
                    Nota Kredit</a>
            </div>
{{-- chart --}}
</div>
   

 
    </div>
    <!-- Main Content End -->
</div>

<!-- Add Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    const ctx = document.getElementById('customerChart').getContext('2d');
    const customerNames = @json($customerNames);
    const customerARs = @json($customerARs);

    const customerChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: customerNames,
            datasets: [{
                label: 'Outstanding AR',
                data: customerARs,
                borderColor: 'rgba(75, 192, 192, 1)',
                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                borderWidth: 2,
                fill: true,
            }]
        },
        options: {
            responsive: true,
            scales: {
                y: {
                    beginAtZero: true,
                    title: {
                        display: true,
                        text: 'Outstanding AR'
                    }
                },
                x: {
                    title: {
                        display: true,
                        text: 'Customer'
                    }
                }
            }
        }
    });
</script>

@endsection
