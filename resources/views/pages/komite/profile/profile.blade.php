@extends('layouts.komite.app')

@section('content')
<div class="container py-5">
    <div class="row">
        <div class="col-lg-4">
            <div class="card" style="background-color: #28a745;">
                <div class="card-body text-center">
                    <img src="../assets/images/user/avatar-2.jpg" alt="avatar" class="rounded-circle img-fluid"
                        style="width: 150px;">
                    <h2 class="my-3 text-white">{{ $user->nama }}</h2>
                    <p class="mb-1 text-white">{{ $user->jabatan }}</p>
                    <p class="text-white">{{ $user->cabang }}</p>
                </div>
            </div>
        </div>
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header" style="background-color: #34ce57;">
                    <h3 class="mb-0 text-white">Informasi Pengguna</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-3">
                            <p class="mb-0 text-muted">ID</p>
                        </div>
                        <div class="col-sm-9">
                            <p class="mb-0">{{ $user->id }}</p>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <p class="mb-0 text-muted">Email</p>
                        </div>
                        <div class="col-sm-9">
                            <p class="mb-0">{{ $user->email }}</p>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <p class="mb-0 text-muted">Alamat</p>
                        </div>
                        <div class="col-sm-9">
                            <p class="mb-0">{{ $user->alamat }}</p>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <p class="mb-0 text-muted">Role</p>
                        </div>
                        <div class="col-sm-9">
                            <p class="mb-0"><span class="badge"
                                    style="background-color: #28a745;">{{ $user->role }}</span></p>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <p class="mb-0 text-muted">No HP</p>
                        </div>
                        <div class="col-sm-9">
                            <p class="mb-0">{{ $user->no_hp }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection