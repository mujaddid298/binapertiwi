@extends('layouts.admin.app_admin')

@section('title', 'Pemberitahuan Meeting')

@section('content')
<!-- [ breadcrumb ] start -->
<div class="page-header">
    <div class="page-block">
        <div class="row align-items-center">
            <div class="col-md-12">
                <div class="page-header-title">
                    <h5 class="m-b-10">Form Pemberitahuan Meeting</h5>
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
                <h5>{{ isset($meeting) ? 'Edit' : 'Tambah' }} Meeting</h5>
            </div>
            <div class="card-body">
                <form
                    action="{{ isset($meeting) ? route('admin.meeting.update', $meeting->id) : route('admin.meeting.store') }}"
                    method="POST">
                    @csrf
                    @if(isset($meeting))
                    @method('PUT')
                    @endif

                    <div class="row">
                        <div class="col-md-12 form-group">
                            <label for="judul">Judul Meeting</label>
                            <input type="text" class="form-control @error('judul') is-invalid @enderror" id="judul"
                                name="judul" value="{{ isset($meeting) ? $meeting->judul : old('judul') }}" required>
                            @error('judul')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6 form-group">
                            <label for="tanggal">Tanggal Meeting</label>
                            <input type="date" class="form-control @error('tanggal') is-invalid @enderror" id="tanggal"
                                name="tanggal"
                                value="{{ isset($meeting) ? date('Y-m-d', strtotime($meeting->tanggal)) : old('tanggal') }}"
                                required>
                            @error('tanggal')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-6 form-group">
                            <label for="jam">Jam Meeting</label>
                            <input type="time" class="form-control @error('jam') is-invalid @enderror" id="jam"
                                name="jam"
                                value="{{ isset($meeting) ? date('H:i', strtotime($meeting->tanggal)) : old('jam') }}"
                                required>
                            @error('jam')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col-md-12 form-group">
                            <label for="link">Link Meeting (Microsoft Teams/Zoom)</label>
                            <input type="url" class="form-control @error('link') is-invalid @enderror" id="link"
                                name="link" value="{{ isset($meeting) ? $meeting->link : old('link') }}"
                                placeholder="https://teams.microsoft.com/... atau https://zoom.us/..." required>
                            <small class="form-text text-muted">Masukkan link Microsoft Teams atau Zoom Meeting</small>
                            @error('link')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group">
                        <button type="submit"
                            class="btn btn-primary">{{ isset($meeting) ? 'Update' : 'Submit' }}</button>
                        <a href="{{ route('admin.meeting.index') }}" class="btn btn-secondary">Kembali</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- [ Main Content ] end -->
@endsection