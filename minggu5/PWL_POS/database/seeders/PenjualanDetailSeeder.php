<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class PenjualanDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Ambil semua penjualan dan barang
        $penjualans = DB::table('t_penjualan')->pluck('penjualan_id')->toArray(); // Ambil semua penjualan
        $barangs = DB::table('m_barang')->get(); // Ambil semua barang

        $data = [];

        foreach ($penjualans as $penjualan_id) {
            // Ambil 3 barang secara acak untuk setiap transaksi
            $selectedBarangs = $barangs->random(3);

            foreach ($selectedBarangs as $barang) {
                $data[] = [
                    'penjualan_id' => $penjualan_id,
                    'barang_id' => $barang->barang_id,
                    'harga' => $barang->harga_jual,
                    'jumlah' => rand(1, 5), // Jumlah barang antara 1-5
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ];
            }
        }

        // Insert data ke dalam tabel t_penjualan_detail
        DB::table('t_penjualan_detail')->insert($data);
    }
}
