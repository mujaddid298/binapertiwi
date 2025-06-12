@extends('layouts.komite.app')

@section('content')
<div class="container">
    <h1>Notifikasi Meeting</h1>
    <div class="list-group">
        @foreach($meetings as $meeting)
        <a href="{{ route('komite.meeting.show', $meeting->id) }}" class="list-group-item list-group-item-action">
            <h5 class="mb-1">{{ $meeting->judul }}</h5>
            <p class="mb-1">Date: {{ $meeting->tanggal }}</p>
            <small>Status: {{ $meeting->status }}</small>
        </a>
        @endforeach
    </div>
</div>
@endsection