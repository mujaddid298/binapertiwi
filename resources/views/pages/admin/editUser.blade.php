@extends('layouts.admin.app_admin')
@section('title', 'Edit Pengguna')
@section('content')
<div class="col-md-8">
    <div class="card">
        <div class="card-header">Edit Pengguna</div>
        <div class="card-body">
            <form action="{{ route('admin.daftaruser.update', $user->id) }}" method="POST">
                @csrf
                <div class="form-group">
                    <label>Nama</label>
                    <input type="text" name="nama" class="form-control" value="{{ $user->nama }}" required>
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" name="email" class="form-control" value="{{ $user->email }}" required>
                </div>
                <div class="form-group">
                    <label>Alamat</label>
                    <input type="text" name="alamat" class="form-control" value="{{ $user->alamat }}" required>
                </div>
                <div class="form-group">
                    <label>Role</label>
                    <select name="role" class="form-control" required>
                        <option value="bc" {{ $user->role == 'bc' ? 'selected' : '' }}>BC</option>
                        <option value="komite" {{ $user->role == 'komite' ? 'selected' : '' }}>Komite</option>
                        <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Admin</option>
                        <option value="user" {{ $user->role == 'user' ? 'selected' : '' }}>User</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Jabatan</label>
                    <input type="text" name="jabatan" class="form-control" value="{{ $user->jabatan }}" required>
                </div>
                <div class="form-group">
                    <label>No HP</label>
                    <input type="text" name="no_hp" class="form-control" value="{{ $user->no_hp }}" required>
                </div>
                <div class="form-group">
                    <label>Cabang</label>
                    <input type="text" name="cabang" class="form-control" value="{{ $user->cabang }}" required>
                </div>
                <div class="form-group">
                    <label>Password (isi jika ingin mengganti)</label>
                    <input type="password" name="password" class="form-control">
                </div>
                <button type="submit" class="btn btn-primary mt-2">Update</button>
            </form>
        </div>
    </div>
</div>
@endsection
