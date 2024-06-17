<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\DetailTransaksi;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Transaksi;

class HistoryController extends Controller
{
    public function show(): View
    {
        $detail_transaksi = DetailTransaksi::all();
        return view('dashboard.history.index', ['detail_transaksi'=>$detail_transaksi]);
    }
}
