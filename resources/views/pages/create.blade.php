@extends('layouts.app')

@section('content')
<h1>Buat Jadwal Meeting</h1>

<form action="{{ route('meetings.store') }}" method="POST">
    @csrf
    <label for="title">Judul Meeting:</label>
    <input type="text" id="title" name="title" required>

    <label for="date">Tanggal dan Waktu:</label>
    <input type="datetime-local" id="date" name="date" required>

    <label for="description">Deskripsi:</label>
    <textarea id="description" name="description" required></textarea>

    <button type="submit">Simpan Jadwal</button>
</form>
@endsection