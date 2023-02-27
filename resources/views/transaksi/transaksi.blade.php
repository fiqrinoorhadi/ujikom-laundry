@extends('layout.admin')
@section('title','Transaksi')
@section('judul','Transaksi')
@section('isi')
<div class="card mb-4">
    <div class="card-header">
        <a href="{{ route('admin.transaksi.create') }}"><button class="btn btn-success mx-2">Tambah</button></a>
        <i class="fas fa-table me-1"></i>
         DataTable
    </div>
    <div class="card-body">
        <table id="datatablesSimple">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Kode Invoice</th>
                    <th>Member</th>
                    <th>Status Laundry</th>
                    <th>Status Bayar</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ( $transaksi as $data)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $data->kode_invoice }}</td>
                    <td>{{ $data->member->nama }}</td>
                    <td>
                        @if ($data->status_laundry == 'proses')
                            <button class="btn btn-warning">proses</button>
                        @elseif ($data->status_laundry == 'selesai')
                            <button class="btn btn-success">selesai</button>
                        @elseif ($data->status_laundry == 'diambil')
                            <button class="btn btn-primary">diambil</button>
                        @else
                            <button class="btn btn-secondary">baru</button>
                        @endif
                    </td>
                    <td>
                        @if ($data->status_dibayar == 'dibayar' )
                            <button class="btn btn-primary">dibayar</button>
                        @else
                            <button class="btn btn-warning">belum dibayar</button>
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('admin.transaksidetail.create',$data->id) }}">
                            <button class="btn btn-success">Detail</button>
                        </a>
                        <a href="{{ route('admin.transaksi.destroy',$data->id) }}">
                            <button class="btn btn-danger">Delete</button>
                        </a>
                        <a href="{{ route('admin.invoice',$data->id) }}">
                            <button class="btn btn-primary">Cetak</button>
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
