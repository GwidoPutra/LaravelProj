<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SupplierSeeder extends Seeder
{
    public function run()
    {
        DB::table('suppliers')->insert([
            [
                'supplier_id' => 1,
                'supplier_kode' => 'SUP001',
                'supplier_nama' => 'PT Maju Bersama',
                'supplier_alamat' => 'Jl. Merdeka No. 10, Jakarta',
            ],
            [
                'supplier_id' => 2,
                'supplier_kode' => 'SUP002',
                'supplier_nama' => 'CV Sukses Selalu',
                'supplier_alamat' => 'Jl. Kemerdekaan No. 22, Bandung',
            ],
            [
                'supplier_id' => 3,
                'supplier_kode' => 'SUP003',
                'supplier_nama' => 'UD Jaya Abadi',
                'supplier_alamat' => 'Jl. Pahlawan No. 15, Surabaya',
            ],
            [
                'supplier_id' => 4,
                'supplier_kode' => 'SUP004',
                'supplier_nama' => 'Toko Makmur Sejahtera',
                'supplier_alamat' => 'Jl. Diponegoro No. 5, Medan',
            ],
        ]);
    }
}
