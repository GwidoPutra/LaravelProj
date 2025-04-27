<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'kategori_kode' => 'CAT001',
                'kategori_nama' => 'Electronics',
            ],
            [
                'kategori_kode' => 'CAT002',
                'kategori_nama' => 'Clothing',
            ],
            [
                'kategori_kode' => 'CAT003',
                'kategori_nama' => 'Books',
            ],
            [
                'kategori_kode' => 'CAT004',
                'kategori_nama' => 'Furniture',
            ],
            [
                'kategori_kode' => 'CAT005',
                'kategori_nama' => 'Sports Equipment',
            ],
        ];

        DB::table('m_kategori')->insert($data);
    }
}