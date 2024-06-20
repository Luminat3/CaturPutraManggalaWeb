<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        DB::table('barang')->insert([
            ['id' => '001', 'nama_barang'=> 'Papan Panel', 'jumlah' => rand(0,100), 'harga_modal' => 10000],
            ['id' => '002', 'nama_barang'=> 'Tiang 4,4m', 'jumlah' => rand(0,100), 'harga_modal' => 440000],
            ['id' => '003', 'nama_barang'=> 'Tiang 3,9m', 'jumlah' => rand(0,100), 'harga_modal' => 390000],
            ['id' => '004', 'nama_barang'=> 'Tiang 3,6m', 'jumlah' => rand(0,100), 'harga_modal' => 360000],
            ['id' => '005', 'nama_barang'=> 'Tiang 2,8m', 'jumlah' => rand(0,100), 'harga_modal' => 280000],
            ['id' => '006', 'nama_barang'=> 'Tiang 2,1m', 'jumlah' => rand(0,100), 'harga_modal' => 210000],
            ['id' => '007', 'nama_barang'=> 'Semen', 'jumlah' => rand(0,100), 'harga_modal' => 8000],
            ['id' => '008', 'nama_barang'=> 'Batu Bata', 'jumlah' => rand(0,100), 'harga_modal' => 1000],
            ['id' => '009', 'nama_barang'=> 'Box Culvert 1m', 'jumlah' => rand(0,100), 'harga_modal' => 1000000],
            ['id' => '010', 'nama_barang'=> 'Box Culvert 0,8m', 'jumlah' => rand(0,100), 'harga_modal' => 800000],
            ['id' => '011', 'nama_barang'=> 'U-Ditch', 'jumlah' => rand(0,100), 'harga_modal' => 1000000],
            ['id' => '012', 'nama_barang'=> 'U-Ditch kecil', 'jumlah' => rand(0,100), 'harga_modal' => 800000],
        ]);
    
        DB::table('users')->insert(['id'=> '01', 'name'=>'admin', 'email'=>'admin@gmail.com', 'password'=>bcrypt('admin'), 'is_admin'=>true]);

        DB::table('pajak_ppn')->insert(['id'=>'01', 'ppn'=> '0.11']);

        DB::table('customer')->insert(['id'=> '01', 'customer_name'=>'Adrian Chen', 'lokasi'=>'KM.7', 'nomor_telepon'=>"081274060857"]);
    }

    
}
