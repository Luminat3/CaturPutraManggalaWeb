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

    public function show_history(): View
    {
        $transaction = Transaksi::where('status', 1)->get();
        return view('dashboard.history', ['transaction' => $transaction]);
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
        return redirect()->route('transaction')->with("success", "Transaksi baru telah dibuat");
    }

    public function show_detail(): View
    {
        $transaction = Transaksi::latest()->first();
        $stock = Stock::all();
        $data = DetailTransaksi::query()->where('id_transaksi', $transaction['id'])->get();
        return view('dashboard.transaction.detail', ["data" => $data, "stock" => $stock, "transaksi"=>$transaction]);
    }


    public function create_akumulasi(Request $request, $id)
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
            $nama_barang = Stock::query()->where('id', $value['id_barang'])->pluck('nama_barang')->first();
            $harga_modal = Stock::query()->where('id', $value['id_barang'])->pluck('harga_modal')->first();
            $value['id_transaksi'] = $id;
            $value['nama_barang'] = $nama_barang;
            $value['harga_modal'] = $harga_modal;
            DetailTransaksi::create($value);
            Stock::where('id', $value['id_barang'])->decrement("jumlah", $value['jumlah']);
        }
        return redirect()->route('detail_transaksi', $id)->with("success", "Produk Baru Telah Dimasukkan");
    }
}

//DB::table("Machines")->select(DB::raw('(SUM(cantidad)*SUM(cantidad_actual)) as total'))->get() untuk dapetin total harga modal
