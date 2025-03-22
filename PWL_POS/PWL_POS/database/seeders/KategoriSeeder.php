<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder; //untuk memanggil Seeder
use Illuminate\Support\Facades\DB; //untuk memanggil DB

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'kategori_kode' => 'ELC001',
                'kategori_nama' => 'Elektronik',
            ],
            [
                'kategori_kode' => 'FNB002',
                'kategori_nama' => 'Makanan & Minuman',
            ],
            [
                'kategori_kode' => 'FRN003',
                'kategori_nama' => 'Furniture',
            ],
            [
                'kategori_kode' => 'CLT004',
                'kategori_nama' => 'Pakaian',
            ],
            [
                'kategori_kode' => 'SPR005',
                'kategori_nama' => 'Olahraga',
            ],
        ];

        DB::table('m_kategori')->insert($data); //insert data
    }
}
