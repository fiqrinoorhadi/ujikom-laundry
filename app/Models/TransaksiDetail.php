<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransaksiDetail extends Model
{
    use HasFactory;
    protected $fillable = [
        'transaksis_id',
        'pakets_id',
        'qty'
    ];

    public function transaksi(){
        return $this->hasOne(Transaksi::class,'id','transaksis_id');
    }
    public function paket(){
        return $this->hasOne(Paket::class,'id','pakets_id');
    }
}
