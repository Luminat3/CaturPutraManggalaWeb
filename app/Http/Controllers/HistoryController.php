<?php

namespace App\Http\Controllers;

use App\Models\Riwayat;
use Illuminate\Http\Request;
use Illuminate\View\View;

class HistoryController extends Controller
{
    public function show(): View
    {
        $riwayat = Riwayat::all();
        return view('dashboard.history', ['riwayat'=>$riwayat]);
    }
}
