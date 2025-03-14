<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class StokSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'barang_id' => 1, // Televisi LED
                'user_id' => 1, // Admin
                'stok_tanggal' => Carbon::now(),
                'stok_jumlah' => 10,
            ],
            [
                'barang_id' => 2, // Smartphone Android
                'user_id' => 2, // Manager
                'stok_tanggal' => Carbon::now()->subDays(1),
                'stok_jumlah' => 15,
            ],
            [
                'barang_id' => 3, // Snack Coklat
                'user_id' => 3, // Staff
                'stok_tanggal' => Carbon::now()->subDays(2),
                'stok_jumlah' => 50,
            ],
            [
                'barang_id' => 4, // Minuman Soda
                'user_id' => 1,
                'stok_tanggal' => Carbon::now()->subDays(3),
                'stok_jumlah' => 40,
            ],
            [
                'barang_id' => 5, // Meja Kayu Jati
                'user_id' => 2,
                'stok_tanggal' => Carbon::now()->subDays(4),
                'stok_jumlah' => 5,
            ],
            [
                'barang_id' => 6, // Kursi Sofa
                'user_id' => 3,
                'stok_tanggal' => Carbon::now()->subDays(5),
                'stok_jumlah' => 8,
            ],
            [
                'barang_id' => 7, // Kemeja Formal Pria
                'user_id' => 1,
                'stok_tanggal' => Carbon::now()->subDays(6),
                'stok_jumlah' => 20,
            ],
            [
                'barang_id' => 8, // Celana Jeans
                'user_id' => 2,
                'stok_tanggal' => Carbon::now()->subDays(7),
                'stok_jumlah' => 25,
            ],
            [
                'barang_id' => 9, // Raket Badminton
                'user_id' => 3,
                'stok_tanggal' => Carbon::now()->subDays(8),
                'stok_jumlah' => 12,
            ],
            [
                'barang_id' => 10, // Bola Sepak
                'user_id' => 1,
                'stok_tanggal' => Carbon::now()->subDays(9),
                'stok_jumlah' => 30,
            ],
        ];

        DB::table('t_stok')->insert($data);
    }
}
