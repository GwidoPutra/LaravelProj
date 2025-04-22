<?php
namespace App\Http\Controllers;

use App\Models\LevelModel;
use App\Models\UserModel;
use App\Models\KategoriModel;
use App\Models\BarangModel;
use App\Models\SupplierModel;
use App\Models\StokModel;
use App\Models\PenjualanModel;



class WelcomeController extends Controller
{
    public function index()
    {
        $breadcrumb = (object) [
            'title' => 'Selamat Datang',
            'list' => ['Home', 'Welcome']
        ];

        $activeMenu = 'dashboard';

        $jumlahLevel = LevelModel::count();
        $jumlahUser = UserModel::count();
        $jumlahKategori = KategoriModel::count();
        $jumlahBarang = BarangModel::count();
        $jumlahSupplier = SupplierModel::count();
        $jumlahStok = StokModel::count();
       $jumlahTransaksiPenjualan = PenjualanModel::count();

        $infoBoxes = [
            [
                'title' => 'Level',
                'count' => $jumlahLevel,
                'color' => 'info',
                'icon' => 'fa-layer-group',
                'url' => url('/level'),
            ],
            [
                'title' => 'User',
                'count' => $jumlahUser,
                'color' => 'primary',
                'icon' => 'fa-user',
                'url' => url('/user'),
            ],
            [
                'title' => 'Kategori',
                'count' => $jumlahKategori,
                'color' => 'secondary',
                'icon' => 'fa-bookmark',
                'url' => url('/kategori'),
            ],
            [
                'title' => 'Barang',
                'count' => $jumlahBarang,
                'color' => 'success',
                'icon' => 'fa-box',
                'url' => url('/barang'),
            ],
            [
                'title' => 'Supplier',
                'count' => $jumlahSupplier,
                'color' => 'warning',
                'icon' => 'fa-truck',
                'url' => url('/supplier'),
            ],
            [
                'title' => 'Stok',
                'count' => $jumlahStok,
                'color' => 'danger',
                'icon' => 'fa-archive',
                'url' => url('/stok'),
            ],
           [
               'title' => 'Transaksi Penjualan',
               'count' => $jumlahTransaksiPenjualan,
               'color' => 'primary',
               'icon' => 'fa-cash-register',
               'url' => url('/penjualan'), 
            ], 
        ];


        return view('welcome', compact('breadcrumb', 'activeMenu', 'infoBoxes'));
    }
}
