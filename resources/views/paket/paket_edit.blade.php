@extends('layout.admin')
@section('title','Paket')
@section('judul','Paket')
@section('isi')

<form action="{{ route('admin.paket.update', $paket->id) }}" method="post">
    @csrf
    <div class="form-group mb-3">
        <label for="outlets_id">Outlet</label>
        <select name="outlets_id" class="form-control @error('outlets_id') is-invalid @enderror">
                <option value="{{ $paket->outlets_id }}">{{ $paket->outlet->nama }}</option>
            @foreach ( $outlet as $data )
                <option value="{{ $data->id }}">{{ $data->nama }}</option>
            @endforeach
        </select>
        @error('outlets_id')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group mb-3">
        <label for="jenis">Jenis</label>
        <select name="jenis" class="form-control @error('jenis') is-invalid @enderror">
            <option value="{{ $paket->jenis }}">{{ $paket->jenis }}</option>
            <option value="pakaian">Pakaian</option>
            <option value="selimut">Selimut</option>
            <option value="bed_cover">Bed Cover</option>
        </select>
        @error('jenis')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group mb-3">
        <label for="nama_paket">Nama Paket</label>
        <input value="{{ $paket->nama_paket }}" id="nama_paket" name="nama_paket" type="text" class="form-control @error('nama_paket') is-invalid @enderror">
        @error('nama_paket')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group mb-3">
        <label for="harga">Harga</label>
        <input value="{{ $paket->harga }}" id="harga" name="harga" type="number" class="form-control @error('harga') is-invalid @enderror">
        @error('harga')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group mb-3">
        <label for="keterangan">Keterangan</label>
        <input value="{{ $paket->keterangan }}" id="keterangan" name="keterangan" type="text" class="form-control @error('keterangan') is-invalid @enderror">
        @error('keterangan')
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
