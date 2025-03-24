@extends('layouts.app')

@section('title', 'Jadwal Meeting')

@section('content')
<!-- [ breadcrumb ] start -->
<div class="page-header">
    <div class="page-block">
        <div class="row align-items-center">
            <div class="col-md-12">
                <div class="page-header-title">
                    <h5 class="m-b-10">Jadwal Meeting</h5>
                </div>
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Jadwal Meeting</a></li>
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
            <h5 class="card-title">Tambah Jadwal Meeting</h5>
            <!-- Form Input Jadwal Meeting -->
            <form action="#" method="POST">
                @csrf
                <div class="form-group">
                    <label for="judul">Judul Meeting</label>
                    <input type="text" class="form-control" id="judul" name="judul" placeholder="Masukkan Judul Meeting"
                        required>
                </div>
                <div class="form-group">
                    <label for="tanggal">Tanggal Meeting</label>
                    <input type="date" class="form-control" id="tanggal" name="tanggal" required>
                </div>
                <div class="form-group">
                    <label for="deskripsi">Deskripsi</label>
                    <textarea class="form-control" id="deskripsi" name="deskripsi" rows="3"
                        placeholder="Masukkan Deskripsi Meeting" required></textarea>
                </div>
                <div class="form-group">
                    <label for="status">Status</label>
                    <select class="form-control" id="status" name="status" required>
                        <option value="tertunda">Tertunda</option>
                        <option value="disetujui">Disetujui</option>
                        <option value="ditolak">Ditolak</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Simpan Meeting</button>
            </form>

            <hr>
            <div class="table-responsive">
                <table class="table table-hover table-borderless mb-0">
                    <thead>
                        <tr>
                            <th>Judul</th>
                            <th>Tanggal</th>
                            <th>Deskripsi</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Data Meeting Akan Ditampilkan Di Sini -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- [ Main Content ] end -->
@endsection