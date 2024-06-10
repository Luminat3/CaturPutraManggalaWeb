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
    
    public function create_view(): View
    {
        return view('dashboard.stock.create');
    }

    public function create(Request $request)
    {
        $request->validate(
            [
                "nama_barang" => "required",
                "jumlah" => "required",
                "harga_modal" => "required"
            ],
            [
                "nama_barang" => "Nama Barang Tidak Boleh Kosong",
                "jumlah" => "Jumlah Barang tidak boleh kosong",
                "harga_modal" => "Harga Modal Tidak Boleh Kosong"
            ]
        );
        Stock::create($request->all());
        return redirect()->route('stocks')->with("success", "Produk Baru Telah Dimasukkan");
    }

    public function add_view(): View
    {
        $stock_barang = Stock::all();
        return view('dashboard.stock.add', ['stock'=>$stock_barang]);
    }

    public function add(Request $request, $id)
    {
        $data = Stock::find($id);
        $data -> update($request->all());
        return redirect()->route('stocks');
    }
}
