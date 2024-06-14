<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Stock;
use App\Models\HistoryBarang;

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

    public function show_history(): View
    {
        $historyData = HistoryBarang::all();
        return view('dashboard.stock.history', ['data'=>$historyData]);
    }

    public function add(Request $request){
        $request->validate(
            [
                'input.*.id_barang' => 'required',
                'input.*.jumlah' => 'required',
                'image_bukti' => 'required',
            ],
            [
                'input.*.id_barang' => 'Barang Tidak Boleh Kosong',
                'input.*.jumlah' => 'Jumlah Tidak Boleh Kosong',
                'image_bukti' => 'Masukkan Bukti Penambahan Barang',
            ]
        );
        foreach ($request->input as $key => $value) {
            $nama_barang = Stock::query()->where('id', $value['id_barang'])->pluck('nama_barang')->first();
            $value['nama_barang'] = $nama_barang;
            Stock::where('id', $value['id_barang'])->increment("jumlah", $value['jumlah']);

            $historyData = [
                'id_barang' => $value['id_barang'],
                'nama_barang' => $nama_barang,
                'jumlah' => $value['jumlah'],
                'image_bukti' => $request->file('image_bukti')->store('bukti', 'public'), // assuming you want to store the image and save the path
                'keterangan' => $request['keterangan']
            ];
            
            HistoryBarang::create($historyData);
        }

        return redirect()->route('stocks')->with("success", "Stock Produk telah ditambahkan");
    }
}
