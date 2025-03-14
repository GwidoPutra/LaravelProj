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
        Schema::create('t_penjualan_detail', function (Blueprint $table) {
            $table->id('detail_id');
            $table->unsignedBigInteger('penjualan_id')->index(); //indexing untuk Fk
            $table->unsignedBigInteger('barang_id')->index(); //indexing untuk Fk
            $table->integer('harga'); 
            $table->integer('jumlah');
            $table->timestamps();

            //mendefinisikan FK pada kolom penjualan_id mengacu pada kolom penjualan_id di table t_penjualan
            $table->foreign('penjualan_id')->references('penjualan_id')->on('t_penjualan');
            //mendefinisikan FK pada kolom barang_id mengacu pada kolom barang_id di table m_barang
            $table->foreign('barang_id')->references('barang_id')->on('m_barang');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('t_penjualan_detail');
    }
};
