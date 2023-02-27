<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\Member;

class MemberController extends Controller
{
    public function index()
    {
        $member = Member::all();
        return view('member.member',['page' => 'member', 'member' => $member]);
    }

    public function create()
    {
        return view('member.member_create');
    }

    public function store(Request $request)
    {
        $validasi = $request->validate([
            'nama'      => 'required',
            'alamat'    => 'required',
            'jk'        => 'required',
            'tlp'       => 'required'
        ]);

        Member::create($validasi);

        Alert::success('Data Berhasil di Tambah','Silahkan cek kembali datanya!');

        return redirect()->route('admin.member');
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        $member = Member::find($id);
        return view('member.member_edit',['page' => 'edit member', 'member' => $member]);
    }

    public function update(Request $request, string $id)
    {
        $validasi = $request->validate([
            'nama'      => 'required',
            'alamat'    => 'required',
            'jk'        => 'required',
            'tlp'       => 'required'
        ]);

        Member::whereId($id)->update($validasi);
        Alert::success('Data Berhasil di Edit','Silahkan cek kembali datanya!');
        return redirect()->route('admin.member');
    }

    public function destroy(string $id)
    {
        Member::find($id)->delete();
        Alert::success('Data Berhasil di Hapus','Silahkan cek kembali datanya!');
        return back();
    }
}
