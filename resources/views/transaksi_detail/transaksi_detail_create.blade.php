@extends('layout.admin')
@section('title','Transaksi Detail')
@section('judul','Transaksi Detail')
@section('isi')
<div class="row">
    <div class="col-5">
        <form action="{{ route('admin.transaksidetail.store') }}" method="post">
            @csrf
                <input class="form-control" type="hidden" value="{{ $transaksi->id }}" name="transaksis_id">
                    <div class="form-group mb-1">
                        <label>Kode Invoice</label>
                        <input class="form-control" type="text" value="{{ $transaksi->kode_invoice }}" disabled>
                    </div>
                    <div class="form-group mb-1">
                        <label for="pakets_id">Paket</label>
                        <select name="pakets_id" class="form-control @error('pakets_id') is-invalid @enderror">
                                <option value="">--Pilih Paket--</option>
                            @foreach ( $paket as $data )
                                <option value="{{ $data->id }}">{{ $data->nama_paket }}</option>
                            @endforeach
                        </select>
                        @error('pakets_id')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group mb-1">
                        <label for="qty">Qty</label>
                        <input id="qty" name="qty" type="number" class="form-control @error('qty') is-invalid @enderror">
                        @error('qty')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group mb-1">
                        <label for="biaya_tambahan">Rubah/Tambah Biaya Tambahan</label>
                        <input id="biaya_tambahan" value="0" name="biaya_tambahan" type="number" class="form-control @error('biaya_tambahan') is-invalid @enderror">
                        <div class="form-text">Diisi terakhir ketika paket yang dipilih sudah semua, sebelum klik tombol selesai </div>
                        @error('biaya_tambahan')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">
                            simpan
                        </button>
                    </div>
        </form>
    </div>
    <div class="col-7">
        <h6>Biaya tambahan : {{ $tambah = $transaksi->biaya_tambahan }}</h6>
        <table class="table table-striped">
            <tr>
                <th>No.</th>
                <th>Paket</th>
                <th>Qty</th>
                <th>Harga</th>
                <th>Total Harga</th>
                <th>Action</th>
            </tr>
            <?php $sum = 0; ?>
            @foreach ( $transaksi_detail as $data )
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $data->paket->nama_paket }}</td>
                <td>{{ $data->qty }}</td>
                <td>Rp {{ $data->paket->harga }}</td>
                <td>Rp {{ $total_harga = $data->paket->harga * $data->qty }}</td>
                <td>
                    <a href="{{ route('admin.transaksidetail.destroy',$data->id) }}">
                        <button class="btn btn-danger">Delete</button>
                    </a>
                </td>
            </tr>
            <?php $sum += $total_harga ?>
            @endforeach
            <tr>
                <td colspan="3"></td>
                <td><b>Sub Total</b></td>
                <td colspan="2"><b>: Rp {{ $sum + $tambah }}</b></td>
            </tr>
            <tr>
                <td colspan="3"></td>
                <td><b>Pajak</b></td>
                <td colspan="2"><b>: Rp {{ $pajak = $sum*($transaksi->pajak/100) }}</b></td>
            </tr>
            <tr>
                <td colspan="3"></td>
                <td><b>Diskon</b></td>
                <td colspan="2"><b>: Rp {{ $diskon = $sum*($transaksi->diskon/100) }}</b></td>
            </tr>
            <tr>
                <td colspan="3"></td>
                <td><b>Tambahan</b></td>
                <td colspan="2"><b>: Rp {{ $tambahan = $transaksi->biaya_tambahan }}</b></td>
            </tr>
            <tr>
                <td colspan="3"></td>
                <td><b>Drand Total</b></td>
                <td colspan="2"><b>: Rp {{ $sum + $tambahan + $pajak + $diskon}}</b></td>
            </tr>
            <tr>
                <td><a href="{{ route('admin.transaksi') }}"><button class="btn btn-primary">Selesai</button></a></td>
            </tr>

        </table>
    </div>
</div>
@endsection
