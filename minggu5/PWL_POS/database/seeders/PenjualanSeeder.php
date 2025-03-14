<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class PenjualanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'user_id' => 1, // Admin
                'pembeli' => 'Budi Santoso',
                'penjualan_kode' => 'PJ001',
                'penjualan_tanggal' => Carbon::now()->subDays(1),
            ],
            [
                'user_id' => 2, // Manager
                'pembeli' => 'Siti Aminah',
                'penjualan_kode' => 'PJ002',
                'penjualan_tanggal' => Carbon::now()->subDays(2),
            ],
            [
                'user_id' => 3, // Staff
                'pembeli' => 'Andi Wijaya',
                'penjualan_kode' => 'PJ003',
                'penjualan_tanggal' => Carbon::now()->subDays(3),
            ],
            [
                'user_id' => 1,
                'pembeli' => 'Dewi Lestari',
                'penjualan_kode' => 'PJ004',
                'penjualan_tanggal' => Carbon::now()->subDays(4),
            ],
            [
                'user_id' => 2,
                'pembeli' => 'Rizky Pratama',
                'penjualan_kode' => 'PJ005',
                'penjualan_tanggal' => Carbon::now()->subDays(5),
            ],
            [
                'user_id' => 3,
                'pembeli' => 'Nurul Hidayah',
                'penjualan_kode' => 'PJ006',
                'penjualan_tanggal' => Carbon::now()->subDays(6),
            ],
            [
                'user_id' => 1,
                'pembeli' => 'Fajar Saputra',
                'penjualan_kode' => 'PJ007',
                'penjualan_tanggal' => Carbon::now()->subDays(7),
            ],
            [
                'user_id' => 2,
                'pembeli' => 'Lina Kartika',
                'penjualan_kode' => 'PJ008',
                'penjualan_tanggal' => Carbon::now()->subDays(8),
            ],
            [
                'user_id' => 3,
                'pembeli' => 'Arif Rahman',
                'penjualan_kode' => 'PJ009',
                'penjualan_tanggal' => Carbon::now()->subDays(9),
            ],
            [
                'user_id' => 1,
                'pembeli' => 'Hana Sari',
                'penjualan_kode' => 'PJ010',
                'penjualan_tanggal' => Carbon::now()->subDays(10),
            ],
        ];

        DB::table('t_penjualan')->insert($data);
    }
}
