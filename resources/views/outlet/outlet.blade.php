@extends('layout.admin')
@section('title','Outlet')
@section('judul','Outlet')
@section('isi')
<div class="card mb-4">
    <div class="card-header">
        <a href="{{ route('admin.outlet.create') }}"><button class="btn btn-success mx-2">Tambah</button></a>
        <i class="fas fa-table me-1"></i>
         DataTable
    </div>
    <div class="card-body">
        <table id="datatablesSimple">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Nama Outlet</th>
                    <th>Alamat</th>
                    <th>Tlp</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ( $outlet as $data)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $data->nama }}</td>
                    <td>{{ $data->alamat }}</td>
                    <td>{{ $data->tlp }}</td>
                    <td>
                        <a href="{{ route('admin.outlet.edit', $data->id) }}">
                            <button class="btn btn-warning">edit</button>
                        </a>
                        <a href="{{ route('admin.outlet.destroy', $data->id) }}">
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
