<?php

namespace App\Http\Controllers;
use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Models\Stock;
use App\Models\Customer;

class AkumulasiController extends Controller
{
    public function show(): View
    {
        $stock_barang = Stock::all();
        $customer = Customer::all();
        return view('dashboard.akumulasi',['stock'=>$stock_barang, 'customer' => $customer]);
    }
}
