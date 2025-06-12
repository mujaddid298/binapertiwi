@extends('layouts.admin.app_admin')

@section('title', 'Daftar User')

@section('content')
<style>
    .nav-pills .nav-link.active {
        background-color: #2b9028 !important;
        color: #fff !important;
    }
    .nav-pills .nav-link { 
        color: #333 !important;
    }
</style>
  <!-- [ breadcrumb ] start -->
  <div class="page-header">
    <div class="page-block">
      <div class="row align-items-center">
        <div class="col-md-12">
          <div class="page-header-title">
            <h5 class="m-b-10">Daftar Pelanggan</h5>
          </div>
          <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('admin.daftaruser') }}">Daftar Pelanggan</a></li>
            {{-- <li class="breadcrumb-item" aria-current="page">Dashboard</li> --}}
          </ul>
        </div>
      </div>
    </div>
  </div>
  <!-- [ breadcrumb ] end -->

  <!-- [ Upload Excel Button ] start -->
  <div class="col-md-12">
    <!-- Button to Open the Modal -->
  

    <!-- Card Penjelasan Upload Excel -->
    <div class="card mb-4">
      <div class="card-body">
        <h5 class="card-title">Cara Memasukkan Data Melalui Excel</h5>
        <ol class="mb-0">
          <li>Unduh template Excel yang telah disediakan (pastikan format kolom sesuai dengan sistem).</li>
          <li>Isi data pelanggan pada file Excel sesuai dengan kolom yang tersedia.</li>
          <li>Upload file Excel yang sudah diisi melalui tombol <b>Upload Excel</b> di bawah.</li>
        </ol>

        <button type="button" class="btn mt-4 btn-warning mb-3" data-toggle="modal" data-target="#uploadModal">
          Upload Excel
        </button>
      </div>
    </div>

    <!-- The Modal -->
    <div class="modal fade" id="uploadModal" tabindex="-1" role="dialog" aria-labelledby="uploadModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="uploadModalLabel">Upload Excel File</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="border: none; background: none; font-size: 1.5rem; color: #000;">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form action="{{ route('admin.uploadExcel') }}" method="POST" enctype="multipart/form-data">
              @csrf
              <div class="form-group">
                <label for="excelFile">Select Excel File:</label>
                <input type="file" class="form-control" id="excelFile" name="excelFile" accept=".xls,.xlsx" required>
              </div>
              <button type="submit" class="btn btn-green">Upload</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- [ Upload Excel Button ] end -->
  <div class="card mb-4">
    <div class="card-body">
  <!-- [ Tab Pills ] start -->
  <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
    <li class="nav-item" role="presentation">
      <button class="nav-link active" id="pills-progress-tab" data-toggle="pill" data-target="#pills-progress" type="button" role="tab" aria-controls="pills-progress" aria-selected="true">On Progress</button>
    </li>
    <li class="nav-item" role="presentation">
      <button class="nav-link" id="pills-selesai-tab" data-toggle="pill" data-target="#pills-selesai" type="button" role="tab" aria-controls="pills-selesai" aria-selected="false">Data Customer</button>
    </li>
  </ul>
  <div class="tab-content" id="pills-tabContent">
    <div class="tab-pane fade show active" id="pills-progress" role="tabpanel" aria-labelledby="pills-progress-tab">
      <div class="table-responsive">
        <table class="table table-hover table-borderless mb-0">
          <thead>
            <tr>
              <th>NO</th>
              <th>CUSTOMER ID</th>
              <th>NAMA</th>
              <th>ALAMAT</th>
              <th>INDUSTRI</th>
              <th>BIDANG USAHA</th>
              <th>GROUP PERUSAHAAN</th>
              <th>PENANGGUNG JAWAB</th>
              <th>AKSI</th>
            </tr>
          </thead>
          <tbody>
            @foreach($customers as $index => $customer)
            <tr>
                <td>{{ $index + 1 }}</td> <!-- This will display the row number -->
                <td>{{ $customer->id ?? '-' }}</td>
                <td>{{ $customer->nama ?? '-' }}</td>
                <td>{{ $customer->alamat ?? '-' }}</td>
                <td>{{ $customer->industry ?? '-' }}</td>
                <td>{{ $customer->bidang_usaha ?? '-' }}</td>
                <td>{{ $customer->group_perusahaan ?? '-' }}</td>
                <td>{{ $customer->penanggung_jawab ?? '-' }}</td>
                <td>
                    <a href="{{ route('admin.detail', $customer->id) }}" class="btn btn-secondary">Detail</a>
                </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
    
    </div>
  </div>
  </div>
  <!-- [ Tab Pills ] end -->
@endsection