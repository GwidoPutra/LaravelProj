<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $r_kategori = DB::table('m_kategori')->pluck('kategori_id')->toArray();

        if (!empty($r_kategori)) {
            $data = [];

            for ($i = 0; $i < 10; $i++) {
                $data[] = [
                    'kategori_id' => $r_kategori[array_rand($r_kategori)],
                    'barang_kode' => 'BRG' . str_pad($i + 1, 3, '0', STR_PAD_LEFT),
                    'barang_nama' => 'Item ' . ($i + 1),
                    'harga_beli' => rand(5000, 20000),
                    'harga_jual' => rand(15000, 30000),
                ];
            }

            DB::table('m_barang')->insert($data);
        } else {
            echo "No records found in m_kategori table.";
        }
    }
}