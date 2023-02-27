@extends('layout.admin')
@section('title','User')
@section('judul','User')
@section('isi')

<form action="{{ route('admin.user.update',$user->id) }}" method="post">
    @csrf
    <div class="form-group mb-3">
        <label for="nama">Nama</label>
        <input value="{{ $user->nama }}" id="nama" name="nama" type="text" class="form-control @error('nama') is-invalid @enderror">
        @error('nama')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group mb-3">
        <label for="username">Username</label>
        <input value="{{ $user->username }}" id="username" name="username" type="text" class="form-control @error('username') is-invalid @enderror">
        @error('username')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group mb-3">
        <label for="password">Password</label>
        <input id="password" name="password" type="text" class="form-control @error('password') is-invalid @enderror">
        <div class="form-text">Jika password tidak dirubah, kosongkan saja</div>
        @error('password')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group mb-3">
        <label for="outlets_id">Outlet</label>
        <select name="outlets_id" class="form-control @error('outlets_id') is-invalid @enderror">
                <option value="{{ $user->outlets_id }}">{{ $user->outlet->nama }}</option>
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
            <option value="{{ $user->role }}">{{ $user->role }}</option>
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
