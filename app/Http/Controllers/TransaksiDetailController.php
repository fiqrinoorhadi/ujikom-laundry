<?php

namespace App\Http\Controllers;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\Paket;
use App\Models\Transaksi;
use App\Models\TransaksiDetail;

class TransaksiDetailController extends Controller
{
    public function index()
    {
        //
    }

    public function create($id)
    {
        $paket = Paket::all();
        $transaksi = Transaksi::find($id);
        $transaksi_detail = TransaksiDetail::where('transaksis_id',$id)->get();
        return view('transaksi_detail.transaksi_detail_create',['paket'=>$paket, 'transaksi'=> $transaksi, 'transaksi_detail'=> $transaksi_detail]);
    }

    public function store(Request $request)
    {
        $validasi1 = $request->validate([
            'transaksis_id' => 'required',
            'pakets_id'     => 'required',
            'qty'           => 'required'
        ]);

        $validasi2 = $request->validate([
            'biaya_tambahan' => 'required'
        ]);

        TransaksiDetail::create($validasi1);
        Transaksi::whereId($validasi1['transaksis_id'])->update($validasi2);

        Alert::success('Data Berhasil di Tambah','Silahkan cek kembali datanya!');
        return redirect()->route('admin.transaksidetail.create',$validasi1['transaksis_id']);
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

        TransaksiDetail::find($id)->delete();
        Alert::success('Data Berhasil di Hapus','Silahkan cek kembali datanya!');
        return back();
    }
}
