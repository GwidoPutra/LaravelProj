<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StokSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $r_barang = DB::table('m_barang')->pluck('barang_id')->toArray();
        $r_user = DB::table('m_user')->pluck('user_id')->toArray();

        $data = [];
        for ($i = 0; $i < 10; $i++) {
            $data[] = [
                'barang_id' => $r_barang[array_rand($r_barang)],
                'user_id' => $r_user[array_rand($r_user)],
                'stok_tanggal' => now(),
                'stok_jumlah' => rand(1, 100),
            ];
        }

        DB::table('t_stok')->insert($data);
    }
}