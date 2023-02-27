<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paket extends Model
{
    use HasFactory;
    protected $fillable = ['outlets_id','jenis','nama_paket','harga','keterangan'];
    public function outlet(){
        return $this->hasOne(Outlet::class,'id','outlets_id');
    }
}
