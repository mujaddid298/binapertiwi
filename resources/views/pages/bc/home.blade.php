 @extends('layouts.bc.app_admin')

 @section('title', 'Home')

 @section('content')
 <!-- [ breadcrumb ] start -->
 <div class="page-header">
     <div class="page-block">
         <div class="row align-items-center">
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
     <div class="col-sm-12">
         <div class="row">
             <!-- [ sample-page ] start -->
             <div class="col-md-6 col-xl-3">
                 <div class="card">
                     <div class="card-body">
                         <h6 class="mb-2 f-w-400 text-muted">Total Customer</h6>
                         <h4 class="mb-3">100 <span class="badge bg-light-primary border border-primary"><i
                                     class="ti ti-trending-up"></i> 0,05%</span></h4>
                         <p class="mb-0 text-muted text-sm">Perkembangan<span class="text-primary"> 5 </span> hari ini
                         </p>
                     </div>
                 </div>
             </div>
             <div class="col-md-6 col-xl-3">
                 <div class="card">
                     <div class="card-body">
                         <h6 class="mb-2 f-w-400 text-muted">Total Penjualan</h6>
                         <h4 class="mb-3">78,250 <span class="badge bg-light-success border border-success"><i
                                     class="ti ti-trending-up"></i> 70.5%</span></h4>
                         <p class="mb-0 text-muted text-sm">Perkembangan <span class="text-success">8,900</span> hari
                             ini</p>
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
             </div>
             <div class="col-md-6 col-xl-3">
                 <div class="card">
                     <div class="card-body">
                         <h6 class="mb-2 f-w-400 text-muted">Total AR</h6>
                         <h4 class="mb-3">35,078 <span class="badge bg-light-danger border border-danger"><i
                                     class="ti ti-trending-up"></i> 27.4%</span></h4>
                         <p class="mb-0 text-muted text-sm">Perkembangan <span class="text-danger">20,395</span> hari
                             ini
                         </p>
                     </div>
                 </div>
             </div>

             <div class=" text-right">
                 <a href="{{ route('bc.persetujuan3') }}" class="btn btn-green mr-1 btn-a" style="float: left;">Tambah
                     Nota Kredit</a>
             </div>

             <div class="card" style="margin: 1.1%">
                 <div class="card-header">
                     <h5>Aging AR Report</h5>
                 </div>
                 <div class="card-body">
                     <!-- Table Section -->
                     <div class="table-responsive mb-4">
                         <table class="table table-bordered table-striped" id="arTable">
                             <thead class="bg-light">
                                 <tr>
                                     <th class="sortable" onclick="sortTable(0)">Sales Organization <i
                                             class="ti ti-arrows-sort"></i></th>
                                     <th class="sortable" onclick="sortTable(1)">Current <i
                                             class="ti ti-arrows-sort"></i></th>
                                     <th class="sortable" onclick="sortTable(2)">1-30 Days <i
                                             class="ti ti-arrows-sort"></i></th>
                                     <th class="sortable" onclick="sortTable(3)">31-60 Days <i
                                             class="ti ti-arrows-sort"></i></th>
                                     <th class="sortable" onclick="sortTable(4)">61-90 Days <i
                                             class="ti ti-arrows-sort"></i></th>
                                     <th class="sortable" onclick="sortTable(5)">91-120 Days <i
                                             class="ti ti-arrows-sort"></i></th>
                                 </tr>
                             </thead>
                             <tbody>
                                 <tr>
                                     <td>PT Maju Bersama</td>
                                     <td>11,250,000,000</td>
                                     <td>785,880,000</td>
                                     <td>425,650,000</td>
                                     <td>125,000,000</td>
                                     <td>50,000,000</td>
                                 </tr>
                                 <tr>
                                     <td>PT Sukses Mandiri</td>
                                     <td>9,875,000,000</td>
                                     <td>655,430,000</td>
                                     <td>385,750,000</td>
                                     <td>98,500,000</td>
                                     <td>45,000,000</td>
                                 </tr>
                                 <tr>
                                     <td>PT Karya Utama</td>
                                     <td>8,450,000,000</td>
                                     <td>545,670,000</td>
                                     <td>298,450,000</td>
                                     <td>87,600,000</td>
                                     <td>35,000,000</td>
                                 </tr>
                                 <tr>
                                     <td>PT Jaya Abadi</td>
                                     <td>7,980,000,000</td>
                                     <td>498,750,000</td>
                                     <td>265,800,000</td>
                                     <td>76,400,000</td>
                                     <td>28,000,000</td>
                                 </tr>
                             </tbody>
                         </table>
                     </div>

                     <!-- Chart Section -->
                     <div class="row mb-3">
                         <div class="col-md-3">
                             <select id="companyFilter" class="form-select" multiple>
                                 <option value="all" selected>Semua PT</option>
                                 <option value="PT Maju Bersama">PT Maju Bersama</option>
                                 <option value="PT Sukses Mandiri">PT Sukses Mandiri</option>
                                 <option value="PT Karya Utama">PT Karya Utama</option>
                                 <option value="PT Jaya Abadi">PT Jaya Abadi</option>
                             </select>
                         </div>
                     </div>
                     <div>
                         <canvas id="agingARChart"></canvas>
                     </div>
                 </div>
             </div>
         </div>
     </div>
     <!-- [ Main Content ] end -->

     <!-- Add Chart.js -->
     <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
     <script>
     document.addEventListener('DOMContentLoaded', function() {
         const ctx = document.getElementById('agingARChart').getContext('2d');
         let myChart;

         const chartData = {
             'PT Maju Bersama': {
                 data: [11250000000, 785880000, 425650000, 125000000, 50000000],
                 backgroundColor: 'rgba(75, 192, 192, 0.5)',
                 borderColor: 'rgba(75, 192, 192, 1)'
             },
             'PT Sukses Mandiri': {
                 data: [9875000000, 655430000, 385750000, 98500000, 45000000],
                 backgroundColor: 'rgba(255, 99, 132, 0.5)',
                 borderColor: 'rgba(255, 99, 132, 1)'
             },
             'PT Karya Utama': {
                 data: [8450000000, 545670000, 298450000, 87600000, 35000000],
                 backgroundColor: 'rgba(54, 162, 235, 0.5)',
                 borderColor: 'rgba(54, 162, 235, 1)'
             },
             'PT Jaya Abadi': {
                 data: [7980000000, 498750000, 265800000, 76400000, 28000000],
                 backgroundColor: 'rgba(255, 206, 86, 0.5)',
                 borderColor: 'rgba(255, 206, 86, 1)'
             }
         };

         function createChart(selectedCompanies) {
             if (myChart) {
                 myChart.destroy();
             }

             const datasets = [];
             if (selectedCompanies.includes('all')) {
                 Object.entries(chartData).forEach(([company, data]) => {
                     datasets.push({
                         label: company,
                         data: data.data,
                         backgroundColor: data.backgroundColor,
                         borderColor: data.borderColor,
                         borderWidth: 1
                     });
                 });
             } else {
                 selectedCompanies.forEach(company => {
                     if (chartData[company]) {
                         datasets.push({
                             label: company,
                             data: chartData[company].data,
                             backgroundColor: chartData[company].backgroundColor,
                             borderColor: chartData[company].borderColor,
                             borderWidth: 1
                         });
                     }
                 });
             }

             const config = {
                 type: 'bar',
                 data: {
                     labels: ['Current', '1-30 Days', '31-60 Days', '61-90 Days', '91-120 Days'],
                     datasets: datasets
                 },
                 options: {
                     responsive: true,
                     scales: {
                         y: {
                             beginAtZero: true,
                             ticks: {
                                 callback: function(value) {
                                     return new Intl.NumberFormat('id-ID', {
                                         style: 'currency',
                                         currency: 'IDR',
                                         minimumFractionDigits: 0,
                                         maximumFractionDigits: 0
                                     }).format(value);
                                 }
                             }
                         }
                     },
                     plugins: {
                         title: {
                             display: true,
                             text: 'Aging AR per Company'
                         },
                         legend: {
                             position: 'top'
                         }
                     }
                 }
             };

             myChart = new Chart(ctx, config);
         }

         // Create initial chart
         createChart(['all']);

         // Handle company filter change
         document.getElementById('companyFilter').addEventListener('change', function(e) {
             const selectedCompanies = Array.from(this.selectedOptions).map(option => option.value);
             createChart(selectedCompanies);
         });
     });
     </script>

     <script>
     function sortTable(n) {
         var table, rows, switching, i, x, y, shouldSwitch, dir, switchcount = 0;
         @endsection