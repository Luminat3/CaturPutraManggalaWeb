<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Stock;

class StockController extends Controller
{
    public function show(): View
    {
        $stock_barang = Stock::all();
        return view('dashboard.stock.index', ['stock'=>$stock_barang]);
    }

    public function create(Request $request)
    {
        Stock::create($request->all());
        return redirect()->route('stocks');
    }

    public function create_view(): View
    {
        return view('dashboard.stock.create');
    }
}


