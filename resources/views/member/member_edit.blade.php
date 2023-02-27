@extends('layout.admin')
@section('title','Member')
@section('judul','Member')
@section('isi')

<form action="{{ route('admin.member.update',$member->id) }}" method="post">
    @csrf
    <div class="form-group mb-3">
        <label for="nama">Nama Member</label>
        <input value="{{ $member->nama }}" id="nama" name="nama" type="text" class="form-control @error('nama') is-invalid @enderror">
        @error('nama')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group mb-3">
        <label for="alamat">Alamat</label>
        <input value="{{ $member->alamat }}" id="alamat" name="alamat" type="text" class="form-control @error('alamat') is-invalid @enderror">
        @error('alamat')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group mb-3">
        <label for="jk">Gender</label>
        <select name="jk" class="form-control @error('jk') is-invalid @enderror">
            <option value="{{ $member->jk }}"> @if ($member->jk == 'L') Laki-laki @else Perempuan @endif</option>
            <option value="L">Laki-laki</option>
            <option value="P">Perempuan</option>
        </select>
        @error('jk')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group mb-3">
        <label for="tlp">Telepon</label>
        <input value="{{ $member->tlp }}" id="tlp" name="tlp" type="text" class="form-control @error('tlp') is-invalid @enderror">
        @error('tlp')
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
