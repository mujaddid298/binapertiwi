@extends('layouts.admin.app_admin')

@section('title', 'Komentar Level 1')

@section('content')
<div class="container">
    <h4 class="text-center">Komentar dari Level 1</h4>
    <div class="comments-section">
        <!-- Tampilkan komentar di sini -->
        <p>Komentar 1: "Komentar dari level 1 tentang form ini."</p>
        <p>Komentar 2: "Komentar tambahan dari level 1."</p>
        <!-- Tambahkan lebih banyak komentar sesuai kebutuhan -->
    </div>
    <div class="row mt-4">
        <div class="col-md-12 text-center">
            <button type="button" class="btn btn-green" onclick="continueToNextForm()">Lanjutkan ke Form Berikutnya</button>
        </div>
    </div>
</div>

<script>
function continueToNextForm() {
    window.location.href = '/admin/form-berikutnya'; // Ganti dengan URL form berikutnya
}
</script>
@endsection 