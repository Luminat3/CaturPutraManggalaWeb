<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Stock;
use App\Models\Customer;
use App\Models\DetailTransaksi;
use App\Models\Transaksi;
use Illuminate\Support\Facades\DB;

class TransactionController extends Controller
{
    
    public function show(): View
    {
        $transaction = Transaksi::all();
        $customer = Customer::all();
        return view('dashboard.transaction.index', ['transaction' => $transaction, 'customer'=>$customer]);
    }

    public function create(Request $request) {
        $request->validate(
            [
                "id_customer"=>"required",
            ],
            [
                "id_customer"=>"Nama Pelanggan Tidak Boleh Kosong",
            ]);
        $nama_customer = Customer::query()->where('id', $request['id_customer'])->pluck('customer_name')->first();
        $request['nama_customer'] = $nama_customer;
        Transaksi::create($request->all());
        return redirect()->route('transaction')->with("success", "Produk Baru Telah Dimasukkan");
    }

    public function show_detail(): View
    {
        $transaction = Transaksi::latest()->first();
        $stock = Stock::all();
        $data = DetailTransaksi::query()->where('id_transaksi', $transaction['id']);
        return view('dashboard.transaction.detail', ["data" => $data, "stock" => $stock, "transaksi"=>$transaction]);
    }


    public function create_akumulasi(Request $request)
    {
        $request->validate(
            [
                'input.*.id_barang' => 'required',
                'input.*.jumlah' => 'required',
            ],
            [
                'input.*.id_barang' => 'Barang Tidak Boleh Kosong',
                'input.*.jumlah' => 'Jumlah Tidak Boleh Kosong',
            ]
        );
        foreach ($request->input as $key => $value) {
            $value['id_customer'] = $request->id_customer;
            $nama_barang = Stock::query()->where('id', $value['id_barang'])->pluck('nama_barang')->first();
            $value['nama_barang'] = $nama_barang;
            DetailTransaksi::create($value);
            Stock::where('id', $value['id_barang'])->decrement("jumlah", $value['jumlah']);
        }
        return back()->with('success', 'Pengeluaran sudah tercatat');
    }
}
