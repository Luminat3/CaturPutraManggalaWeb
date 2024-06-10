<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use Illuminate\Http\Request;
use App\Models\Stock;
use App\Models\Customer;
use App\Models\DetailTransaksi;

class AkumulasiController extends Controller
{
    public function show(): View
    {
        $stock_barang = Stock::all();
        $customer = Customer::all();
        return view('dashboard.akumulasi', ['stock' => $stock_barang, 'customer' => $customer]);
    }

    public function create(Request $request)
    {
        $request->validate(
            [
                'input.*.id_barang' => 'required',
                'input.*.jumlah' => 'required',
                'id_customer' => 'required'
            ],
            [
                'input.*.id_barang' => 'Barang Tidak Boleh Kosong',
                'input.*.jumlah' => 'Jumlah Tidak Boleh Kosong',
                'id_customer' => 'Nama Pelanggan Tidak Boleh Kosong'
            ]
        );
        foreach ($request->input as $key => $value) {
            $value['id_customer'] = $request->id_customer;
            DetailTransaksi::create($value);
            Stock::where('id', $value['id_barang'])->decrement("jumlah", $value['jumlah']);
        }
        return back()->with('success', 'Pengeluaran sudah tercatat');
    }
}
