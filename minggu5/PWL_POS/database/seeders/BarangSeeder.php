<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'kategori_id' => 1, // Elektronik
                'barang_kode' => 'TV001',
                'barang_nama' => 'Televisi LED 32 inch',
                'harga_beli' => 2500000,
                'harga_jual' => 3000000,
            ],
            [
                'kategori_id' => 1, // Elektronik
                'barang_kode' => 'HP002',
                'barang_nama' => 'Smartphone Android',
                'harga_beli' => 3500000,
                'harga_jual' => 4000000,
            ],
            [
                'kategori_id' => 2, // Makanan & Minuman
                'barang_kode' => 'SNK003',
                'barang_nama' => 'Snack Coklat',
                'harga_beli' => 10000,
                'harga_jual' => 15000,
            ],
            [
                'kategori_id' => 2, // Makanan & Minuman
                'barang_kode' => 'DRK004',
                'barang_nama' => 'Minuman Soda',
                'harga_beli' => 5000,
                'harga_jual' => 8000,
            ],
            [
                'kategori_id' => 3, // Furniture
                'barang_kode' => 'TBL005',
                'barang_nama' => 'Meja Kayu Jati',
                'harga_beli' => 1200000,
                'harga_jual' => 1500000,
            ],
            [
                'kategori_id' => 3, // Furniture
                'barang_kode' => 'CH006',
                'barang_nama' => 'Kursi Sofa',
                'harga_beli' => 800000,
                'harga_jual' => 1000000,
            ],
            [
                'kategori_id' => 4, // Pakaian
                'barang_kode' => 'SHR007',
                'barang_nama' => 'Kemeja Formal Pria',
                'harga_beli' => 150000,
                'harga_jual' => 200000,
            ],
            [
                'kategori_id' => 4, // Pakaian
                'barang_kode' => 'JNS008',
                'barang_nama' => 'Celana Jeans',
                'harga_beli' => 200000,
                'harga_jual' => 250000,
            ],
            [
                'kategori_id' => 5, // Olahraga
                'barang_kode' => 'RKT009',
                'barang_nama' => 'Raket Badminton',
                'harga_beli' => 500000,
                'harga_jual' => 600000,
            ],
            [
                'kategori_id' => 5, // Olahraga
                'barang_kode' => 'BLS010',
                'barang_nama' => 'Bola Sepak',
                'harga_beli' => 150000,
                'harga_jual' => 180000,
            ],
        ];

        DB::table('m_barang')->insert($data);
    }
}
