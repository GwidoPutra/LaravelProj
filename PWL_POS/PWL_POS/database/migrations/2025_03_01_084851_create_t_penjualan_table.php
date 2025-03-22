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
        Schema::create('t_penjualan', function (Blueprint $table) {
            $table->id('penjualan_id');// primary key
            $table->unsignedBigInteger('user_id')->index(); //indexing untuk Fk
            $table->string('pembeli', 50); // unique memastikan tidak ada yang sama
            $table->string('penjualan_kode', 20); // unique memastikan tidak ada yang sama
            $table->dateTime('penjualan_tanggal'); //  unique memastikan tidak ada yang sama
            $table->timestamps();

            //mendefinisikan FK pada kolom user_id mengacu pada kolom user_id di table m_user
            $table->foreign('user_id')->references('user_id')->on('m_user');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('t_penjualan');
    }
};
