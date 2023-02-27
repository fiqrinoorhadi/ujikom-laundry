<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use App\Models\Outlet;
use App\Models\Paket;
use App\Models\Member;
use App\Models\Transaksi;
use Carbon\Carbon; // format waktu
use Illuminate\Support\Facades\Auth; // untuk ambil data dari data login
use RealRashid\SweetAlert\Facades\Alert;

class TransaksiController extends Controller
{
    public function index()
    {
        $outlet     = Outlet::all();
        $paket      = Paket::all();
        $member     = Member::all();
        $transaksi  = Transaksi::all();
        return view('transaksi.transaksi',['page'=>'transaksi','transaksi'=>$transaksi,'outlet'=>$outlet,'paket'=>$paket,'member'=>$member]);
    }

    public function create()
    {
        $outlet     = Outlet::all();
        $paket      = Paket::all();
        $member     = Member::all();
        $waktu      = Carbon::now();
        return view('transaksi.transaksi_create',['page'=>'transaksi','outlet'=>$outlet,'member'=>$member,'paket'=>$paket, 'waktu'=>$waktu
        ]);
    }

    public function store(Request $request)
    {

        $year_datetime = Carbon::now()->format('y');
        $members_id = $request->members_id;
        $users_id = Auth::user()->id;
        $outlets_id = Auth::user()->outlets_id;

        //hitung jumlah data transaksi yg ada di tabel transaksis
        $count_transaksi = Transaksi::all()->count() + 1 ;

        $kode_invoice = $year_datetime.$users_id.$members_id.$count_transaksi;

        $validasi = $request->validate([
            'members_id'    => 'required',
            'tgl'           => 'required',
            'batas_waktu'   => 'required',
            'tgl_bayar'     => 'required',
            'diskon'        => '',
            'pajak'         => 'required',
            'status_laundry'=> 'required',
            'status_dibayar'=> 'required',
            'user_id'       => '',
        ]);

        $validasi['outlets_id']      = $outlets_id;
        $validasi['kode_invoice']    = $kode_invoice;
        $validasi['users_id']        = $users_id;


        Transaksi::create($validasi);
        $transaksis_id = Transaksi::where('kode_invoice',$kode_invoice)->first();
        return redirect()->route('admin.transaksidetail.create',$transaksis_id->id);
    }


    public function show(string $id)
    {
        //
    }


    public function edit(string $id)
    {
        //
    }


    public function update(Request $request, string $id)
    {
        //
    }

    public function destroy(string $id)
    {
        Transaksi::find($id)->delete();
        Alert::success('Data Berhasil di Hapus','Silahkan cek kembali datanya!');
        return back();
    }
}
