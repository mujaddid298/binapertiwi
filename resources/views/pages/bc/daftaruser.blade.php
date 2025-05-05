@extends('layouts.bc.app_admin')

@section('title', 'Daftar User')

@section('content')
<!-- [ breadcrumb ] start -->
<div class="page-header">
    <div class="page-block">
        <div class="row align-items-center">
            <div class="col-md-12">
                <div class="page-header-title">
                    <h5 class="m-b-10">Daftar Pengguna</h5>
                </div>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('bc.daftaruser') }}">Daftar Pengguna</a></li>
                    {{-- <li class="breadcrumb-item" aria-current="page">Dashboard</li> --}}
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- [ breadcrumb ] end -->

<!-- [ Main Content ] start -->
<div class="col-md-12 col-xl-12">
    <div class="card tbl-card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover table-borderless mb-0">
                    <thead>
                        <tr>
                            <th>NAMA</th>
                            <th>EMAIL</th>
                            <th>ALAMAT</th>
                            <th>ROLE</th>
                            <th>JABATAN</th>
                            <th>NO HP</th>
                            <th>CABANG</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                        <tr>
                            <td>{{ $user->nama }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->alamat }}</td>
                            <td>{{ $user->role }}</td>
                            <td>{{ $user->jabatan }}</td>
                            <td>{{ $user->no_hp }}</td>
                            <td>{{ $user->cabang }}</td>
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