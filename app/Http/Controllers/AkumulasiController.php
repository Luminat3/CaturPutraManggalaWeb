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
        return view('dashboard.akumulasi',['stock'=>$stock_barang, 'customer' => $customer]);
    }

    public function create(Request $request)
    {
        $request->validate([
            'input.*.nama_barang' => 'required',
            'input.*.jumlah' => 'required'
        ],
        [
            'input.*.nama_barang' => 'Barang Tidak Boleh Kosong',
            'input.*.jumlah' => 'Jumlah Tidak Boleh Kosong'
        ]
        );

        foreach($request->input as $key => $value)
        {
            DetailTransaksi::create($value);

        }
        return back()-> with('success', 'Pengeluaran sudah tercatat');
    }
}
