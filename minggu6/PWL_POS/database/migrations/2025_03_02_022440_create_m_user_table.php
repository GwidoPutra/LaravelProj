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
        Schema::create('m_user', function (Blueprint $table) {
            $table->id('user_id');
            $table->unsignedBigInteger('level_id')->index(); // indexing untuk FK
            $table->string('username', 20)->unique(); // dibuat unique agar username tidak ada yang sama atau duplikat
            $table->string('nama', 100);
            $table->string('password');
            $table->timestamps();

            // Mendefinisikan FK pada kolom level_id yang mengarah ke tabel m_level
            $table->foreign('level_id')
                ->references('level_id')
                ->on('m_level');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('m_user'); // Hapus tabel m_user lebih dulu
        Schema::dropIfExists('m_level'); // Baru hapus tabel m_level
    }
};