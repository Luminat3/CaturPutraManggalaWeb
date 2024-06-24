<?php

use App\Http\Controllers\AkumulasiController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
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


Route::get('/', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


    Route::get('/dashboard/stock', [StockController::class, 'show'])->name('stocks');//get data stock
    Route::get('/dashboard/stock/create', [StockController::class, 'create_view']);//menampilkan view menambahkan jenis barang
    Route::post('/dashboard/stock/create', [StockController::class, 'create']);//create barang baru
    Route::get('/dashboard/stock/history', [StockController::class, 'show_history']);//menunjukan halaman history stock barang
    Route::post('/dashboard/stock/add', [StockController::class, 'add']);//menambahkan jumlah stock
    Route::post('/dashboard/stock/decrease', [StockController::class, 'decrease']);


    Route::get('/dashboard/history', [TransactionController::class, 'show_history'])->name('riwayat');//menampilkan riwayat transakasi


    Route::get('/dashboard/transaction', [TransactionController::class, 'show'])->name('transaction');//menampilkan halaman pembuatan transaksi
    Route::post('/dashboard/transaction/create',[TransactionController::class, 'create']);//create record baru
    Route::get('/dashboard/transaction/detail/{id}', [TransactionController::class, 'show_detail'])->name('detail_transaksi');
    Route::post('/dashboard/transaction/detail/{id}/add', [TransactionController::class, 'create_akumulasi']);
    Route::post('/dashboard/transaction/detail/{id}/selesai', [TransactionController::class, 'finish_transaction']);

    Route::get('/dashboard/transaction/invoice/{id}',[TransactionController::class, 'show_invoice_form'])->name('invoice');
    Route::get('/dashboard/transaction/invoice/{id}/create',[TransactionController::class, 'create_invoice'])->name('cetak_invoice');
    Route::post('/dashboard/transaction/invoice/{id}/update',[TransactionController::class, 'save_price']);

    Route::get('/dashboard/customer', [CustomerController::class, 'index'])->name('customer'); //routing ke lihat data pelanggan
    Route::get('/dashboard/customer/create', [CustomerController::class, 'create_view']); //routing ke halaman tambah data pelanggan
    Route::post('/dashboard/customer/create', [CustomerController::class, 'add']); //tambah data pelanggan
    Route::get('/dashboard/customer/get/{id}', [CustomerController::class, 'getData']); //routing ke halaman edit data pelanggan
    Route::post('/dashboard/customer/edit/{id}', [CustomerController::class, 'updateData']); //ubah data pelanggan
    Route::post('/dashboard/customer/delete/{id}', [CustomerController::class, 'deleteData']);//delete customer

    Route::get('/dashboard/settings', [DashboardController::class, 'show_settings']); // Menampilkan halaman settings
    Route::post('/dashboard/settings/update', [DashboardController::class, 'update_settings'])->name('update_settings');//update halaman settings


    Route::get('/dashboard/akumulasi', [AkumulasiController::class, 'show']); //menampilkan halaman akumulasi untuk per proyek
    Route::post('/dashboard/akumulasi/create', [AkumulasiController::class, 'create']); //menampilkan halaman akumulasi untuk per proyek

    Route::get('/dashboard/user/', [ProfileController::class, 'show'])->name('user');
    Route::post('/dashboard/user/create', [ProfileController::class, 'create']);
    Route::patch('/dashboard/user/{id}/update', [ProfileController::class, 'update_user']);
    Route::post('/dashboard/user/{id}/delete', [ProfileController::class, 'delete_user']);
});

require __DIR__.'/auth.php';
