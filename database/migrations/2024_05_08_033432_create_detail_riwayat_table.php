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
        Schema::create('detail_riwayat', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_transaksi')->references('id')->on('riwayat');
            $table->foreignId('id_barang')->references('id')->on('stock');
            $table->string('nama_barang');
            $table->integer('jumlah');
            $table->boolean('status'); //barang sudah selesai dikirim atau belum
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_riwayat');
    }
};
