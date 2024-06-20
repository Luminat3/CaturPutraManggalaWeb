<?php

namespace App\Http\Controllers;

use App\Charts\Last30DaysChart;
use App\Models\HistoryBarang;
use App\Models\Customer;
use App\Models\PPN;
use App\Models\Transaksi;
use App\Models\Stock;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index(Last30DaysChart $chart): View
    {
        $total_customer['total'] = Customer::all()->count();
        $transaki_berlangsung = Transaksi::where('status', 0)->count();
        $transaki_selesai = Transaksi::where('status', 1)->count();
        $jumlah_pengguna = User::all()->count();
        $historyData = HistoryBarang::all()->take(10);
        return view('dashboard.index', [
            'total_customer' => $total_customer, 
            'transaksi_berlangsung' => $transaki_berlangsung, 
            "jumlah_pengguna" => $jumlah_pengguna,
            'transaksi_selesai' => $transaki_selesai, 
            'historyData' => $historyData,
            'chart' => $chart->build()]);
    }

    public function show_settings(): View
    {
        $data = DB::table('pajak_ppn')->first();
        $ppn = $data ? ($data->ppn * 100) : null;
        return view('dashboard.settings', ['ppn' => $ppn]);
    }

    public function update_settings(Request $request)
    {
        $request->validate([
            'ppn' => 'required',
        ]);

        $new_ppn = $request->input('ppn') / 100.0;
        DB::table('pajak_ppn')->update(['ppn' => $new_ppn]);
        return redirect()->back()->with('success', 'PPN value updated successfully.');
    }
}
