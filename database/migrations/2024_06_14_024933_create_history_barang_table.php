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
        Schema::create('history_barang', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_barang')->references('id')->on('barang');
            $table->string('nama_barang');
            $table->unsignedBigInteger('jumlah');
            $table->string('image_bukti')->nullable();
            $table->string('keterangan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('history_barang');
    }
};
