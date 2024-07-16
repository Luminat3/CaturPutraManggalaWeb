<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Stock;
use App\Models\HistoryBarang;
use Illuminate\Support\Facades\DB;

class StockController extends Controller
{
    public function show(): View
    {
        $stock_barang = Stock::all();
        return view('dashboard.stock.index', ['stock'=>$stock_barang]);
    }

    public function create_view(): View
    {
        return view('dashboard.stock.create');
    }

    public function create(Request $request)
    {
        $request->validate(
            [
                "nama_barang" => "required|string|max:70",
                "jumlah" => "required",
                "harga_modal" => "required"
            ],
            [
                'nama_barang.required' => 'Nama pelanggan wajib diisi.',
                'nama_barang.max' => 'Nama pelanggan tidak boleh lebih dari 40 karakter.',
                "jumlah" => "Jumlah Barang tidak boleh kosong",
                "harga_modal" => "Harga Modal Tidak Boleh Kosong"
            ]
        );

        $data = $request->all();
        $data['is_unlimited'] = $request->has('is_unlimited') ? 1 : 0;

        Stock::create($data);
        return redirect()->route('stocks')->with("success", "Produk Baru Telah Dimasukkan");
    }

    public function show_history(): View
    {
        $historyData = HistoryBarang::all();
        return view('dashboard.stock.history', ['data'=>$historyData]);
    }

    public function add(Request $request){
        $request->validate(
            [
                'input.*.id_barang' => 'required',
                'input.*.jumlah' => 'required',
                'image_bukti' => 'required|image|max:10240',
            ],
            [
                'input.*.id_barang' => 'Barang Tidak Boleh Kosong',
                'input.*.jumlah' => 'Jumlah Tidak Boleh Kosong',
                'image_bukti.required' => 'Masukkan Bukti Penambahan Barang',
                'image_bukti.image' => 'File harus berupa gambar',
                'image_bukti.max' => 'Ukuran gambar tidak boleh lebih dari 10MB',
                'input.*.jumlah.integer' => 'Jumlah harus berupa angka',
                'input.*.jumlah.min' => 'Jumlah minimal adalah 1',
            ]
        );
        foreach ($request->input as $key => $value) {
            $nama_barang = Stock::query()->where('id', $value['id_barang'])->pluck('nama_barang')->first();
            $value['nama_barang'] = $nama_barang;
            Stock::where('id', $value['id_barang'])->increment("jumlah", $value['jumlah']);

            $historyData = [
                'id_barang' => $value['id_barang'],
                'nama_barang' => $nama_barang,
                'jumlah' => $value['jumlah'],
                'image_bukti' => $request->file('image_bukti')->store('bukti', 'public'), // assuming you want to store the image and save the path
                'keterangan' => $request['keterangan']
            ];

            HistoryBarang::create($historyData);
        }

        return redirect()->route('stocks')->with("success", "Stock telah ditambahkan");
    }


    public function decrease(Request $request){
        $request->validate(
            [
                'inputPengurangan.*.id_barang' => 'required',
                'inputPengurangan.*.jumlah' => 'required',
            ],
            [
                'inputPengurangan.*.id_barang' => 'Barang Tidak Boleh Kosong',
                'inputPengurangan.*.jumlah' => 'Jumlah Tidak Boleh Kosong',
                'inputPengurangan.*.jumlah.integer' => 'Jumlah harus berupa angka',
                'inputPengurangan.*.jumlah.min' => 'Jumlah minimal adalah 1',
            ]
        );

        DB::beginTransaction();

    try {

        foreach ($request->inputPengurangan as $key => $value) {
            $stock = Stock::find($value['id_barang']);

            if (!$stock) {
                return redirect()->route('stocks')->with("error", "Barang dengan ID {$value['id_barang']} tidak ditemukan.");
            }

            if (!$stock->is_unlimited && $stock->jumlah < $value['jumlah']) {
                return redirect()->route('stocks')->with("error", "Jumlah stok barang {$stock->nama_barang} tidak mencukupi.");
            }

            $nama_barang = Stock::query()->where('id', $value['id_barang'])->pluck('nama_barang')->first();
            $value['nama_barang'] = $nama_barang;

            $historyData = [
                'id_barang' => $value['id_barang'],
                'nama_barang' => $nama_barang,
                'jumlah' => $value['jumlah'],
                'keterangan' => $request['keterangan']
            ];

            HistoryBarang::create($historyData);
            if ($stock['is_unlimited'] == false) {
                Stock::where('id', $value['id_barang'])->decrement("jumlah", $value['jumlah']);
            }
        }
        DB::commit();
        return redirect()->route('stocks')->with("success", "Stock telah dikurang");
    }
    catch (\Exception $e) {
        DB::rollBack();

        return redirect()->route('stocks')->with("error", $e->getMessage());
    }

    }
}
