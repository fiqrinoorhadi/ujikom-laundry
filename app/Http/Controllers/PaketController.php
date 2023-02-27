<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\Outlet;
use App\Models\Paket;

class PaketController extends Controller
{

    public function index()
    {
        $paket = Paket::all();
        return view('paket.paket',['page' => 'paket', 'paket' => $paket]);
    }


    public function create()
    {
        $outlet = Outlet::all();
        return view('paket.paket_create',['outlet'=>$outlet]);
    }


    public function store(Request $request)
    {
        $validasi = $request->validate([
            'outlets_id'=> 'required',
            'jenis'     => 'required',
            'nama_paket'=> 'required',
            'harga'     => 'required',
            'keterangan'=> ''
        ]);

        Paket::create($validasi);
        Alert::success('Data Berhasil di Tambah','Silahkan cek kembali datanya!');
        return redirect()->route('admin.paket');
    }


    public function show(string $id)
    {
        //
    }


    public function edit(string $id)
    {
        $paket = Paket::find($id);
        $outlet = Outlet::all();
        return view('paket.paket_edit',['page' => 'edit paket', 'paket' => $paket, 'outlet'=>$outlet]);
    }


    public function update(Request $request, string $id)
    {
        $validasi = $request->validate([
            'outlets_id'=> 'required',
            'jenis'     => 'required',
            'nama_paket'=> 'required',
            'harga'     => 'required',
            'keterangan'=> ''
        ]);

        Paket::whereId($id)->update($validasi);
        Alert::success('Data Berhasil di Edit','Silahkan cek kembali datanya!');
        return redirect()->route('admin.paket');
    }


    public function destroy(string $id)
    {
        Paket::find($id)->delete();
        Alert::success('Data Berhasil di Hapus','Silahkan cek kembali datanya!');
        return back();
    }
}
