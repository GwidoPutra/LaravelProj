<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PenjualanDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(array $penjualanIds): void
    {
        $barangIds = DB::table('m_barang')->pluck('barang_id')->toArray();

        $data = [];
        foreach ($penjualanIds as $penjualan_id) {
            // Generate 2-5 random items per sale
            $jumlahBarang = 3;
            for ($j = 0; $j < $jumlahBarang; $j++) {
                $data[] = [
                    'penjualan_id' => $penjualan_id,
                    'barang_id' => $barangIds[array_rand($barangIds)],
                    'harga' => rand(10000, 50000),
                    'jumlah' => rand(1, 5),
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
            }
        }

        DB::table('t_penjualan_detail')->insert($data);
    }
}