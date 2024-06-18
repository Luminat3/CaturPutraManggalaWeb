<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Stock;
use App\Models\Customer;
use App\Models\DetailTransaksi;
use App\Models\HistoryBarang;
use App\Models\Transaksi;
use Illuminate\Support\Facades\DB;

class TransactionController extends Controller
{
    
    public function show(): View
    {
        $transaction = Transaksi::where('status', 0)->get();
        $customer = Customer::all();
        return view('dashboard.transaction.index', ['transaction' => $transaction, 'customer'=>$customer]);
    }



    public function show_history(): View
    {
        $transaction = Transaksi::where('status', 1)->get();
        return view('dashboard.history.index', ['transaction' => $transaction]);
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



    public function show_detail($id): View
    {
        $transaction = Transaksi::find($id);
        $stock = Stock::all();
        $data = DetailTransaksi::query()->where('id_transaksi', $transaction['id'])->get();
        $total_modal['modal']= DB::table('detail_transaksi') ->where('id_transaksi', $transaction['id'])->sum(DB::raw('jumlah * harga_modal'));
        return view('dashboard.transaction.detail', ["data" => $data, "stock" => $stock, "transaksi"=>$transaction, 'modal' => $total_modal]);
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
                'input.*.jumlah.integer' => 'Jumlah harus berupa angka',
                'input.*.jumlah.min' => 'Jumlah minimal adalah 1',
            ]
        );

        DB::beginTransaction();

        try{
            foreach ($request->input as $key => $value) {
                $stock = Stock::find($value['id_barang']);
                
                if (!$stock) {
                    return redirect()->route('detail_transaksi', $id)->with("error", "Barang dengan ID {$value['id_barang']} tidak ditemukan.");
                }
        
                if (!$stock->is_unlimited && $stock->jumlah < $value['jumlah']) {
                    return redirect()->route('detail_transaksi', $id)->with("error", "Jumlah stok barang {$stock->nama_barang} tidak mencukupi.");
                }

                $nama_barang = $stock->nama_barang;
                $harga_modal = $stock->harga_modal;
                // $nama_barang = Stock::query()->where('id', $value['id_barang'])->pluck('nama_barang')->first();
                // $harga_modal = Stock::query()->where('id', $value['id_barang'])->pluck('harga_modal')->first();
                $value['id_transaksi'] = $id;
                $value['nama_barang'] = $nama_barang;
                $value['harga_modal'] = $harga_modal;

                $historyData = [
                    'id_barang' => $value['id_barang'],
                    'nama_barang' => $nama_barang,
                    'jumlah' => $value['jumlah'],
                    'keterangan' => "Pengeluaran barang untuk transaksi dengan ID $id"
                ];
                HistoryBarang::create($historyData);
                DetailTransaksi::create($value);
                if ($stock['is_unlimited'] == false) {
                    Stock::where('id', $value['id_barang'])->decrement("jumlah", $value['jumlah']);
                }
            }
            DB::commit();
            return redirect()->route('detail_transaksi', $id)->with("success", "Produk Baru Telah Dimasukkan");
        }
        catch (\Exception $e) {
            DB::rollBack();
    
            return redirect()->route('detail_transaksi', $id)->with("error", $e->getMessage());
        }
    }


    public function finish_transaction(Request $request, $id){
        DB::table('transaksi')->where('id', $id)->update(['status' => 1]);
        return redirect()->route('transaction');
    }
}

//DB::table("Machines")->select(DB::raw('(SUM(cantidad)*SUM(cantidad_actual)) as total'))->get() untuk dapetin total harga modal
// $historyData = [
//     'id_barang' => $value['id_barang'],
//     'nama_barang' => $nama_barang,
//     'jumlah' => $value['jumlah'],
//     'image_bukti' => $request->file('image_bukti')->store('bukti', 'public'), // assuming you want to store the image and save the path
//     'keterangan' => $request['keterangan']
// ];