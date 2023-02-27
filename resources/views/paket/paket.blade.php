@extends('layout.admin')
@section('title','Paket')
@section('judul','Paket')
@section('isi')
<div class="card mb-4">
    <div class="card-header">
        <a href="{{ route('admin.paket.create') }}"><button class="btn btn-success mx-2">Tambah</button></a>
        <i class="fas fa-table me-1"></i>
         DataTable
    </div>
    <div class="card-body">
        <table id="datatablesSimple">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Outlet</th>
                    <th>Jenis</th>
                    <th>Nama Paket</th>
                    <th>Harga</th>
                    <th>Keterangan</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ( $paket as $data)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $data->outlet->nama }}</td>
                    <td>{{ $data->jenis }}</td>
                    <td>{{ $data->nama_paket }}</td>
                    <td>{{ $data->harga }}</td>
                    <td>{{ $data->keterangan }}</td>
                    <td>
                        <a href="{{ route('admin.paket.edit', $data->id) }}">
                            <button class="btn btn-warning">edit</button>
                        </a>
                        <a href="{{ route('admin.paket.destroy', $data->id) }}">
                            <button class="btn btn-danger">delete</button>
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
