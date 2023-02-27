@extends('layout.admin')
@section('title','User')
@section('judul','User')
@section('isi')
<div class="card mb-4">
    <div class="card-header">
        <a href="{{ route('admin.user.create') }}"><button class="btn btn-success mx-2">Tambah</button></a>
        <i class="fas fa-table me-1"></i>
         DataTable
    </div>
    <div class="card-body">
        <table id="datatablesSimple">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Nama</th>
                    <th>Username</th>
                    <th>Password</th>
                    <th>Outlet</th>
                    <th>Role</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ( $user as $data)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $data->nama }}</td>
                    <td>{{ $data->username }}</td>
                    <td>********</td>
                    <td>{{ $data->outlet->nama }}</td>
                    <td>{{ $data->role }}</td>
                    <td>
                        <a href="{{ route('admin.user.edit', $data->id) }}">
                            <button class="btn btn-warning">edit</button>
                        </a>
                        <a href="{{ route('admin.user.destroy', $data->id) }}">
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
