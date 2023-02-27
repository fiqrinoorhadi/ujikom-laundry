<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;

    protected $fillable = [
        'outlets_id',
        'kode_invoice',
        'members_id',
        'tgl',
        'batas_waktu',
        'tgl_bayar',
        'biaya_tambahan',
        'diskon',
        'pajak',
        'status_laundry',
        'status_dibayar',
        'users_id',
    ];

    public function outlet(){
        return $this->hasOne(Outlet::class,'id','outlets_id');
    }
    public function user(){
        return $this->hasOne(User::class,'id','users_id');
    }
    public function member(){
        return $this->hasOne(Member::class,'id','members_id');
    }
}
