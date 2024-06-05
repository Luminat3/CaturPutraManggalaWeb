<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Transaksi;

class HistoryController extends Controller
{
    public function show(): View
    {
        $transaksi = Transaksi::all();
        return view('dashboard.history', ['transaksi'=>$transaksi]);
    }
}
