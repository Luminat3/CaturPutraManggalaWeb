<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailTransaksi extends Model
{
    protected $table = 'detail_transaksi';
    protected $fillable = [
        'id_customer',
        'id_barang',
        'nama_customer',
        'nama_barang',
        'jumlah'
    ];
}
