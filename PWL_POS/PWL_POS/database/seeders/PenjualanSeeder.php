<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PenjualanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $r_user = DB::table('m_user')->pluck('user_id')->toArray();

        $penjualanIds = []; // Store inserted

        for ($i = 0; $i < 10; $i++) {
            $penjualan_id = DB::table('t_penjualan')->insertGetId([
                'user_id' => $r_user[array_rand($r_user)],
                'pembeli' => 'Customer ' . ($i + 1),
                'penjualan_kode' => 'PJ' . str_pad($i + 1, 4, '0', STR_PAD_LEFT),
                'penjualan_tanggal' => now(),
            ]);

            $penjualanIds[] = $penjualan_id;
        }
        // Call PenjualanDetailSeeder
        $this->callWith(PenjualanDetailSeeder::class, ['penjualanIds' => $penjualanIds]);
    }
}