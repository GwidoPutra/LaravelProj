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
        Schema::create('t_stok', function (Blueprint $table) {
            $table->id('stok_id');
            $table->unsignedBigInteger('barang_id')->index(); //indexing untuk Fk
            $table->unsignedBigInteger('user_id')->index(); //indexing untuk Fk
            $table->dateTime('stok_tanggal'); 
            $table->integer('stok_jumlah');
            $table->timestamps();

            //mendefinisikan FK pada kolom barang_id mengacu pada kolom kategori_id di table m_barang
            $table->foreign('barang_id')->references('barang_id')->on('m_barang');
            //mendefinisikan FK pada kolom kategori_id mengacu pada kolom kategori_id di table m_kategori
            $table->foreign('user_id')->references('user_id')->on('m_user');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('t_stok'); 
    }
};
