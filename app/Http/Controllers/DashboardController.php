<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Outlet;
use App\Models\User;
use App\Models\Paket;
use App\Models\Member;
use App\Models\Transaksi;

class DashboardController extends Controller
{

    public function index()
    {
        $outlet = Outlet::all()->count();
        $user = User::all()->count();
        $paket = Paket::all()->count();
        $member = Member::all()->count();
        $transaksi = Transaksi::all()->count();
        return view('dashboard.dashboard',[
            'outlet'    => $outlet,
            'user'    => $user,
            'paket'    => $paket,
            'member'    => $member,
            'transaksi'    => $transaksi
        ]);
    }

    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
