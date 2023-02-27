<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\Outlet;

class OutletController extends Controller
{
    public function index()
    {
        $outlet = Outlet::all();
        return view('outlet.outlet',['page' => 'outlet', 'outlet' => $outlet]);
    }

    public function create()
    {
        return view('outlet.outlet_create');
    }

    public function store(Request $request)
    {
        $validasi = $request->validate([
            'nama'      => 'required|unique:outlets',
            'alamat'    => 'required',
            'tlp'       => 'required',
        ]);

        Outlet::create($validasi);
        Alert::success('Data Berhasil di Tambah','Silahkan cek kembali datanya!');
        return redirect()->route('admin.outlet');
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        $outlet = Outlet::find($id);
        return view('outlet.outlet_edit',['page' => 'edit outlet', 'outlet' => $outlet]);
    }

    public function update(Request $request, string $id)
    {

        $validasi = $request->validate([
            'nama'      => 'required',
            'alamat'    => 'required',
            'tlp'       => 'required',
        ]);

        Outlet::whereId($id)->update($validasi);
        Alert::success('Data Berhasil di Edit','Silahkan cek kembali datanya!');
        return redirect()->route('admin.outlet');
    }

    public function destroy(string $id)
    {
        Outlet::find($id)->delete();
        Alert::success('Data Berhasil di Hapus','Silahkan cek kembali datanya!');
        return back();
    }
}
