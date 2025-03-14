<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KategoriController extends Controller
{
    public function index()
    {
        // $data = [
        //     'kategori_kode' => 'SNK',
        //     'kategori_name' => 'Snack/Makanan Ringan',
        //     'created_at' => now(),
        // ];

        // DB::table('m_kategori')->insert($data);
        // return 'Insert data baru berhasil';

        // $row = DB::table('m_kategori')->where('kategori_kode', 'SNK')->update([
        //     'kategori_name' => 'Camilan',
        //     'updated_at' => now(),
        // ]);
        // return "update data berhasil, affected rows: $row";

        // $row = DB::table('m_kategori')->where('kategori_kode', 'SNK')->delete();
        // return "delete data berhasil, affected rows: $row";

        $data = DB::table('m_kategori')->get();
        return view('kategori', ['data' => $data]);
    }
}