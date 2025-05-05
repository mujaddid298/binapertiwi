@extends('layouts.bc.app_admin')

@section('title', 'Daftar Meeting')

@section('content')
<!-- [ breadcrumb ] start -->
<div class="page-header">
    <div class="page-block">
        <div class="row align-items-center">
            <div class="col-md-12">
                <div class="page-header-title">
                    <h5 class="m-b-10">Daftar Meeting</h5>
                </div>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Meeting</a></li>
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
                <h5>Daftar Meeting</h5>
                <div class="card-header-right">
                    <a href="{{ route('bc.meeting.create') }}" class="btn btn-primary btn-sm">Tambah Meeting</a>
                </div>
            </div>
            <div class="card-body">
                @if(session('success'))
                <div class="alert alert-success" role="alert">
                    {{ session('success') }}
                </div>
                @endif

                <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Judul Meeting</th>
                                <th>Tanggal & Jam</th>
                                <th>Link Meeting</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($meetings as $key => $meeting)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $meeting->judul }}</td>
                                <td>{{ date('d F Y H:i', strtotime($meeting->tanggal)) }}</td>
                                <td>{{ $meeting->link }}</td>
                                <td>
                                    @if($meeting->status == 'scheduled')
                                    <span class="badge badge-info text-success">Dijadwalkan</span>
                                    @elseif($meeting->status == 'completed')
                                    <span class="badge badge-secondary text-secondary">Selesai</span>
                                    @elseif($meeting->status == 'cancelled')
                                    <span class="badge badge-danger text-danger">Dibatalkan</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('bc.meeting.edit', $meeting->id) }}"
                                        class="btn btn-sm btn-warning">Edit</a>
                                    <form action="{{ route('bc.meeting.destroy', $meeting->id) }}" method="POST"
                                        class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger"
                                            onclick="return confirm('Apakah Anda yakin ingin menghapus meeting ini?')">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="6" class="text-center">Tidak ada data meeting</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- [ Main Content ] end -->
@endsection