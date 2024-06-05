<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Stock;
use App\Models\Customer;

class TransactionController extends Controller
{
    
    public function show(): View
    {
        $stock_barang = Stock::all();
        $customer = Customer::all();
        return view('dashboard.transaction',['stock'=>$stock_barang, 'customer' => $customer]);
    }
}
