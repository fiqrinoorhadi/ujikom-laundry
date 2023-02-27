<?php

namespace Database\Seeders;
use App\Models\Outlet;
use App\Models\User;
use App\Models\Paket;
use App\Models\Member;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Outlet::create(['nama'=>'Cabang VIP','alamat'=>'Perumahan VIP Residence','tlp'=>'02169835684' ]);
        Outlet::create(['nama'=>'Cabang Permata','alamat'=>'Perumahan Permata Residence','tlp'=> '02169835684']);
        Outlet::create(['nama'=>'Cabang Babelan','alamat'=>'Perumahan Babelan Residence','tlp'=>'02169835684'
        ]);

        Paket::create([
            'outlets_id'=> '1',
            'jenis'     => 'pakaian',
            'nama_paket'=> 'Paket Pakaian 1',
            'harga'     => '15000',
            'keterangan'=> 'harga tersebut untuk perkilo timbangan'
        ]);

        Paket::create([
            'outlets_id'=> '1',
            'jenis'     => 'selimut',
            'nama_paket'=> 'Paket Selimut 1',
            'harga'     => '20000',
            'keterangan'=> 'harga tersebut untuk perkilo timbangan'
        ]);

        Member::create([
            'nama'      => 'John Pantau',
            'alamat'    => 'Villa Mutiara Gading Timur Regensi, No 17',
            'jk'        => 'L',
            'tlp'       => '087878562860'
        ]);

        User::create([
            'nama'=>'Fiqri Noor Hadi',
            'username'  => 'admin',
            'password'  => Hash::make('admin'),
            'outlets_id'=> 1,
            'role'      => 'admin'
        ]);
    }
}
