@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Form Persetujuan NAK</h2>

    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif

    <form action="{{ route('persetujuan_nak.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="nak_id" class="form-label">NAK ID</label>
            <input type="text" class="form-control" id="nak_id" name="nak_id" required>
        </div>

        <div class="mb-3">
            <label for="komite_id" class="form-label">Komite ID</label>
            <input type="text" class="form-control" id="komite_id" name="komite_id" required>
        </div>

        <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <select class="form-control" id="status" name="status" required>
                <option value="disetujui">Disetujui</option>
                <option value="tertunda">Tertunda</option>
                <option value="disetujui dengan syarat">Disetujui dengan Syarat</option>
                <option value="ditolak">Ditolak</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="komentar" class="form-label">Komentar</label>
            <textarea class="form-control" id="komentar" name="komentar" rows="3"></textarea>
        </div>

        <div class="mb-3">
            <label for="tanggal_persetujuan" class="form-label">Tanggal Persetujuan</label>
            <input type="date" class="form-control" id="tanggal_persetujuan" name="tanggal_persetujuan" required>
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection