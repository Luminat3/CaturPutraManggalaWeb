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
            ['id' => '001', 'nama_barang'=> 'beton', 'jumlah' => rand(0,100)],
            ['id' => '002', 'nama_barang'=> 'pagar', 'jumlah' => rand(0,100)],
            ['id' => '003', 'nama_barang'=> 'semen', 'jumlah' => rand(0,100)],
            ['id' => '004', 'nama_barang'=> 'dinding', 'jumlah' => rand(0,100)],
            ['id' => '005', 'nama_barang'=> 'batu bata', 'jumlah' => rand(0,100)],
        ]);
    
        DB::table('users')->insert(['id'=> '01', 'name'=>'admin', 'email'=>'admin@gmail.com', 'password'=>bcrypt('admin')]);
    }

    
}
