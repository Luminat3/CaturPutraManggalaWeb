<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('detail_transaksi', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_transaksi')->references('id')->on('transaksi');
            $table->foreignId('id_barang')->references('id')->on('barang');
            $table->string('nama_barang');
            $table->integer('jumlah');
            $table->unsignedBigInteger('harga_jual')->default(0);
            $table->unsignedBigInteger('harga_modal');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_transaksi');
    }
};
