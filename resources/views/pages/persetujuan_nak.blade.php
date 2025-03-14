@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">Daftar Persetujuan NAK</h2>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>NAK ID</th>
                <th>Nama Komite</th>
                <th>Level</th>
                <th>Status</th>
                <th>Komentar</th>
                <th>Tanggal Persetujuan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($persetujuan as $index => $item)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $item->nak_id }}</td>
                <td>{{ $item->komite->name ?? 'N/A' }}</td>
                <td>{{ $item->level }}</td>
                <td>
                    <span class="badge 
                        @if($item->status == 'disetujui') bg-success
                        @elseif($item->status == 'tertunda') bg-warning
                        @elseif($item->status == 'disetujui dengan syarat') bg-info
                        @elseif($item->status == 'ditolak') bg-danger
                        @endif">
                        {{ ucfirst($item->status) }}
                    </span>
                </td>
                <td>{{ $item->komen ?? '-' }}</td>
                <td>{{ \Carbon\Carbon::parse($item->tanggal_persetujuan)->format('d M Y') }}</td>
                <td>
                    <a href="#" class="btn btn-primary btn-sm">Lihat Detail</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection