@extends('layout.admin')
@section('title','User')
@section('judul','User')
@section('isi')

<form action="{{ route('admin.user.store') }}" method="post">
    @csrf
    <div class="form-group mb-3">
        <label for="nama">Nama</label>
        <input id="nama" name="nama" type="text" class="form-control @error('nama') is-invalid @enderror">
        @error('nama')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group mb-3">
        <label for="username">Username</label>
        <input id="username" name="username" type="text" class="form-control @error('username') is-invalid @enderror">
        @error('username')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group mb-3">
        <label for="password">Password</label>
        <input id="password" name="password" type="text" class="form-control @error('password') is-invalid @enderror">
        @error('password')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group mb-3">
        <label for="outlets_id">Outlet</label>
        <select name="outlets_id" class="form-control @error('outlets_id') is-invalid @enderror">
                <option value="">--Pilih Outlet--</option>
            @foreach ( $outlet as $data )
                <option value="{{ $data->id }}">{{ $data->nama }}</option>
            @endforeach
        </select>
        @error('outlets_id')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group mb-3">
        <label for="role">Roler</label>
        <select name="role" class="form-control @error('role') is-invalid @enderror">
            <option value="">--Pilih Role--</option>
            <option value="Admin">Admin</option>
            <option value="Kasir">Kasir</option>
            <option value="Owner">Owner</option>
        </select>
        @error('role')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group">
        <button type="submit" class="btn btn-primary">
            simpan
        </button>
    </div>
</form>
@endsection
