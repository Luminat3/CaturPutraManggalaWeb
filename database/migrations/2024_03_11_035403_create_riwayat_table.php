<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('riwayat', function (Blueprint $table) {
            $table->id();
            $table->foreignId('customer_id')->references('id')->on('customer');
            $table->foreignId('id_barang')->references('id')->on('barang');
            $table->string('nama_company');
            $table->date('tanggal_transaksi');
            $table->date('tanggal_lunas');
            $table->string('invoice');
            $table->boolean('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('riwayat');
    }
};
