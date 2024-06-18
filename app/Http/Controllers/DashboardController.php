<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Transaksi;
use App\Models\Stock;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(): View
    {
        $total_customer['total'] = Customer::all()->count();
        $transaki_berlangsung = Transaksi::where('status', 0)->count();
        $transaki_selesai = Transaksi::where('status', 1)->count();
        $jumlah_pengguna = User::all()->count();
        return view('dashboard.index', ['total_customer' => $total_customer, 'transaksi_berlangsung' => $transaki_berlangsung, "jumlah_pengguna" => $jumlah_pengguna,'transaksi_selesai' => $transaki_selesai,]);
    }
}
