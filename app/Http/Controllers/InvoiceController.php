<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Member;
use App\Models\Outlet;
use App\Models\Paket;
use App\Models\Transaksi;
use App\Models\TransaksiDetail;

class InvoiceController extends Controller
{
    public function index($id)
    {
        $transaksi = Transaksi::find($id);
        $transaksi_detail = TransaksiDetail::where('transaksis_id',$id)->get();
        return view('invoice.invoice',['transaksi'=> $transaksi, 'transaksi_detail'=> $transaksi_detail]);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
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
        //
    }
}
