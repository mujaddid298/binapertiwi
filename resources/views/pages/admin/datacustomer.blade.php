@extends('layouts.admin.app_admin')

@section('title', 'Daftar User')

@section('content')
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
    <button type="button" class="btn mb-3 btn-primary" data-toggle="modal" data-target="#uploadModal">
      Upload Excel
    </button>

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
              <button type="submit" class="btn btn-primary">Upload</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- [ Upload Excel Button ] end -->

  <!-- [ Main Content ] start -->
  <div class="col-md-12 col-xl-12"> 
    <div class="card tbl-card">
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-hover table-borderless mb-0">
            <thead>
              <tr>
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
              @foreach($customers as $customer)
              <tr>
                <td>{{ $customer->nama }}</td>
                <td>{{ $customer->alamat }}</td>
                <td>{{ $customer->industry }}</td>
                <td>{{ $customer->bidang_usaha }}</td>
                <td>{{ $customer->group_perusahaan }}</td>
                <td>{{ $customer->penanggung_jawab }}</td> 
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
  <!-- [ Main Content ] end -->
@endsection