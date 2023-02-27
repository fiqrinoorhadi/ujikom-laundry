@extends('layout.admin')
@section('title','Transaksi')
@section('judul','Transaksi')
@section('isi')

<form action="{{ route('admin.transaksi.store') }}" method="post">
    @csrf
            <div class="form-group mb-1">
                <label for="members_id">Member</label>
                <select name="members_id" class="form-control @error('members_id') is-invalid @enderror">
                        <option value="">--Pilih Member--</option>
                    @foreach ( $member as $data )
                        <option value="{{ $data->id }}">{{ $data->nama }}</option>
                    @endforeach
                </select>
                @error('members_id')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group mb-1">
                <label for="tgl">Tanggal</label>
                <input value="{{ $waktu }}" id="tgl" name="tgl" type="datetime-local" class="form-control @error('tgl') is-invalid @enderror" readonly>
                @error('tgl')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group mb-1">
                <label for="batas_waktu">Batas Waktu</label>
                <input id="batas_waktu" name="batas_waktu" type="datetime-local" class="form-control @error('batas_waktu') is-invalid @enderror">
                @error('batas_waktu')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group mb-1">
                <label for="tgl_bayar">Tanggal Bayar</label>
                <input id="tgl" name="tgl_bayar" type="datetime-local" class="form-control @error('tgl_bayar') is-invalid @enderror">
                @error('tgl_bayar')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group mb-1">
                <label for="diskon">Diskon</label>
                <div class="input-group">
                    <input id="diskon" value="0" name="diskon" type="number" class="form-control @error('diskon') is-invalid @enderror">
                    <span class="input-group-text" id="inputGroupPrepend">%</span>
                </div>
                @error('diskon')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group mb-1">
                <label for="pajak">Pajak</label>
                <div class="input-group">
                    <input value="10" id="pajak" name="pajak" type="number" class="form-control @error('pajak') is-invalid @enderror">
                    <span class="input-group-text" id="inputGroupPrepend">%</span>
                </div>
                @error('pajak')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group mb-1">
                <label for="status_laundry">Status Laundry</label>
                <select name="status_laundry" class="form-control @error('status_laundry') is-invalid @enderror">
                        <option value="baru">Baru</option>
                        <option value="proses">Proses</option>
                        <option value="selesai">Selesai</option>
                        <option value="diambil">Diambil</option>
                </select>
                @error('status_laundry')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group mb-1">
                <label for="status_dibayar">Status Bayar</label>
                <select name="status_dibayar" class="form-control @error('status_dibayar') is-invalid @enderror">
                    <option value="belum_dibayar">Belum Dibayar</option>
                    <option value="dibayar">Dibayar</option>
                </select>
                @error('status_dibayar')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>
    <div class="form-group mb-1">
        <input id="users_id" name="users_id" type="hidden" class="form-control @error('users_id') is-invalid @enderror">
        @error('users_id')
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
