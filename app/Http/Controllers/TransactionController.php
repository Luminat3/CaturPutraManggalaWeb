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
        $data = DetailTransaksi::query()->where('id_transaksi', $transaction['id']);
        return view('dashboard.transaction.detail', compact('data'));
    }
}
