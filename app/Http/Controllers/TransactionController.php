<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Stock;
use App\Models\Customer;
use App\Models\DetailTransaksi;
use Illuminate\Support\Facades\DB;

class TransactionController extends Controller
{
    
    public function show(): View
    {
        $stock_barang = Stock::all();
        $customer = Customer::all();
        $detail_transaksi = DetailTransaksi::all();
        return view('dashboard.transaction',['stock'=>$stock_barang, 'customer' => $customer, 'detail_transaksi'=>$detail_transaksi]);
    }
}
