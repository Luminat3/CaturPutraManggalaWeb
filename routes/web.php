<?php

use App\Http\Controllers\AkumulasiController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StockController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\CustomerController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('dashboard/index');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/dashboard', function () {
    return view('dashboard/index');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


    Route::get('/dashboard/stock', [StockController::class, 'show'])->name('stocks');//get data stock
    Route::get('/dashboard/stock/create', [StockController::class, 'create_view']);//menampilkan view menambahkan jenis barang
    Route::post('/dashboard/stock/create', [StockController::class, 'create']);//create barang baru
    Route::get('/dashboard/stock/add', [StockController::class, 'add_view']);//menunjukan halaman menambahkan stock barang
    Route::post('/dashboard/stock/add', [StockController::class, 'add']);//menambahkan jumlah stock


    Route::get('/dashboard/history', [HistoryController::class, 'show']);//menampilkan riwayat transakasi


    Route::get('/dashboard/transaction', [TransactionController::class, 'show'])->name('transaction');//menampilkan halaman pembuatan transaksi
    Route::post('/dashboard/transaction/create',[TransactionController::class, 'create']);//create record baru
    Route::get('/dashboard/transaction/detail/{id}', [TransactionController::class, 'show_detail']);
    Route::get('/dashboard/transaction/detail/{id}/add', [TransactionController::class, 'create_akumulasi']);

    Route::get('/dashboard/customer', [CustomerController::class, 'index'])->name('customer'); //routing ke lihat data pelanggan
    Route::get('/dashboard/customer/create', [CustomerController::class, 'create_view']); //routing ke halaman tambah data pelanggan
    Route::post('/dashboard/customer/create', [CustomerController::class, 'add']); //tambah data pelanggan
    Route::get('/dashboard/customer/get/{id}', [CustomerController::class, 'getData']); //routing ke halaman edit data pelanggan
    Route::post('/dashboard/customer/edit/{id}', [CustomerController::class, 'updateData']); //ubah data pelanggan
    Route::get('/dashboard/customer/delete/{id}', [CustomerController::class, 'deleteData']);//delete customer


    Route::get('/dahsboard/history', [])->name('riwayat');//Menampilkan halaman riwayat


    Route::get('/dashboard/akumulasi', [AkumulasiController::class, 'show']); //menampilkan halaman akumulasi untuk per proyek
    Route::post('/dashboard/akumulasi/create', [AkumulasiController::class, 'create']); //menampilkan halaman akumulasi untuk per proyek
});

require __DIR__.'/auth.php';
