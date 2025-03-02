<?php

// Mengimpor kelas yang diperlukan untuk migrasi
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

// Mengembalikan kelas anonim yang mewarisi Migration
return new class extends Migration
{
    /**
     * Menjalankan migrasi (membuat tabel items).
     */
    public function up(): void
    {
        // Membuat tabel 'items' dengan struktur yang didefinisikan di dalam callback
        Schema::create('items', function (Blueprint $table) {
            $table->id(); // Membuat kolom 'id' sebagai primary key dengan auto-increment (bigint)
            $table->string('name'); // Kolom 'name' bertipe string (varchar) dengan panjang default 255 karakter
            $table->text('description'); // Kolom 'description' bertipe text untuk menyimpan teks panjang
            $table->timestamps(); // Menambahkan kolom 'created_at' dan 'updated_at' secara otomatis
        });
    }

    /**
     * Membatalkan migrasi (menghapus tabel items).
     */
    public function down(): void
    {
        // Menghapus tabel 'items' jika ada
        Schema::dropIfExists('items');
    }
};