@extends('layouts.bc.app')

@section('title', 'Detail Meeting')

@section('content')
<!-- [ breadcrumb ] start -->
<div class="page-header">
    <div class="page-block">
        <div class="row align-items-center">
            <div class="col-md-12">
                <div class="page-header-title">
                    <h5 class="m-b-10">Detail Meeting</h5>
                </div>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('bc.meeting.index') }}">Meeting</a></li>
                    <li class="breadcrumb-item">Detail</li>
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
                <h5>Detail Meeting</h5>
                <div class="card-header-right">
                    <a href="{{ route('bc.meeting.index') }}" class="btn btn-secondary btn-sm">Kembali</a>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="judul">Judul Meeting</label>
                            <p class="form-control-static">{{ $meeting->judul }}</p>
                        </div>
                        <div class="form-group">
                            <label for="tanggal">Tanggal & Jam</label>
                            <p class="form-control-static">{{ date('d F Y H:i', strtotime($meeting->tanggal)) }}</p>
                        </div>
                        <div class="form-group">
                            <label for="link">Link Meeting</label>
                            <p class="form-control-static">{{ $meeting->link }}</p>
                        </div>
                        <div class="form-group">
                            <label for="status">Status</label>
                            <p class="form-control-static">
                                @if($meeting->status == 'scheduled')
                                <span class="badge badge-info">Dijadwalkan</span>
                                @elseif($meeting->status == 'completed')
                                <span class="badge badge-success">Selesai</span>
                                @elseif($meeting->status == 'cancelled')
                                <span class="badge badge-danger">Dibatalkan</span>
                                @endif
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- [ Main Content ] end -->
@endsection