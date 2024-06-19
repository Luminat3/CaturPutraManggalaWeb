<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $table = 'customer';

    protected $guarded = [];


    public function transactions()
    {
        return $this->hasMany(Transaksi::class, 'id_customer', 'id');
    }
}
