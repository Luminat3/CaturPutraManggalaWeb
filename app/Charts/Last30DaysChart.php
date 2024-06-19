<?php

namespace App\Charts;
use Illuminate\Support\Facades\DB; 
use ArielMejiaDev\LarapexCharts\LarapexChart;

class Last30DaysChart
{
    protected $chart;

    public function __construct(LarapexChart $chart)
    {
        $this->chart = $chart;
    }

    public function build(): \ArielMejiaDev\LarapexCharts\BarChart
    {
        $data = DB::table('detail_transaksi')
        ->join('barang', 'barang.id', '=', 'detail_transaksi.id_barang')
        ->select('barang.nama_barang', DB::raw('SUM(detail_transaksi.jumlah) AS jumlah'))
        ->groupBy('barang.nama_barang')
        ->get();


        $jumlah = [];
        $nama_barang = [];

        foreach ($data as $item) {
            $jumlah[] = $item->jumlah;
            $nama_barang[] = $item->nama_barang;
        }

        
        return $this->chart->barChart()
        ->setTitle('Pengeluaran Barang 1 Bulan Terakhir')
        ->addData('Jumlah', $jumlah) // 'Jumlah' is the name of the dataset
        ->setXAxis($nama_barang);
    }
}
