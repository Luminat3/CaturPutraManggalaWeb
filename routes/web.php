<?php

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
    Route::get('/dashboard/stocks', [StockController::class, 'show'])->name('stocks');//get data stock
    Route::get('/dashboard/stocks/create', [StockController::class, 'create_view']);
    Route::post('/dashboard/stocks/create', [StockController::class, 'create']);//create barang baru
    Route::post('/dashboard/stocks/add', [StockController::class, 'add']);//menambahkan jumlah stock
    Route::get('/dashboard/history', [HistoryController::class, 'show']);
    Route::get('/dashboard/transaction', [TransactionController::class, 'show']);
    Route::get('/dashboard/customer', [CustomerController::class, 'index'])->name('customer'); //routing ke lihat data pelanggan
    Route::get('/dashboard/customer/create', [CustomerController::class, 'create_view']); //routing ke halaman tambah data pelanggan
    Route::post('/dashboard/customer/create', [CustomerController::class, 'add']); //tambah data pelanggan
    Route::get('/dashboard/customer/get/{id}', [CustomerController::class, 'getData']); //routing ke halaman edit data pelanggan
    Route::post('/dashboard/customer/edit/{id}', [CustomerController::class, 'updateData']); //ubah data pelanggan
    Route::get('/dashboard/customer/delete/{id}', [CustomerController::class, 'deleteData']);
});

require __DIR__.'/auth.php';
