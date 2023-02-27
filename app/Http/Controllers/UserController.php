<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Models\Outlet;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class UserController extends Controller
{
    public function index()
    {

        $user = User::all();
        return view('user.user',['user'=>$user]);
    }

    public function create()
    {
        $outlet = Outlet::all();
        return view('user.user_create',['outlet'=>$outlet]);
    }

    public function store(Request $request)
    {
        $validasi = $request->validate([
            'nama'      => 'required',
            'username'  => 'required|unique:users',
            'password'  => 'required',
            'outlets_id'=> 'required',
            'role'      => 'required'
        ]);
        $validasi['password'] = Hash::make($request->password);
        User::create($validasi);
        Alert::success('Data Berhasil di Tambah','Silahkan cek kembali datanya!');
        return redirect()->route('admin.user');
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        $user = User::find($id);
        $outlet = Outlet::all();
        return view('user.user_edit',['user'=>$user,'outlet'=>$outlet]);
    }

    public function update(Request $request, string $id)
    {
        $user = User::find($id);
        // jika username tidak dirubah
        if ($user->username == $request->username) {
            // jika password dirubah
            if ($request->password) {
                $validasi = $request->validate([
                    'nama'      => 'required',
                    'password'  => 'required',
                    'outlets_id'=> 'required',
                    'role'      => 'required'
                ]);
                $validasi['password'] = Hash::make($request->password);
                User::whereId($id)->update($validasi);
            }
            // jika password tidak dirubah
            else{
                $validasi = $request->validate([
                    'nama'      => 'required',
                    'outlets_id'=> 'required',
                    'role'      => 'required'
                ]);
                $validasi['password'] = User::find($id)->password;
                User::whereId($id)->update($validasi);
            }
        }
        // jika username dirubah
        else
        {
            // jika password dirubah
            if ($request->password) {
                $validasi = $request->validate([
                    'nama'      => 'required',
                    'username'  => 'required|min:3|unique:users',
                    'password'  => 'required',
                    'outlets_id'=> 'required',
                    'role'      => 'required'
                ]);
                $validasi['password'] = Hash::make($request->password);
                User::whereId($id)->update($validasi);
            }
            // jika password tidak dirubah
            else{
                $validasi = $request->validate([
                    'nama'      => 'required',
                    'username'  => 'required|unique:users',
                    'outlets_id'=> 'required',
                    'role'      => 'required'
                ]);
                $validasi['password'] = User::find($id)->password;
                User::whereId($id)->update($validasi);
            }
        }

        Alert::success('Data Berhasil di Tambah','Silahkan cek kembali datanya!');
        return redirect()->route('admin.user');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        User::find($id)->delete();
        Alert::success('Data Berhasil di Hapus','Silahkan cek kembali datanya!');
        return back();
    }
}
