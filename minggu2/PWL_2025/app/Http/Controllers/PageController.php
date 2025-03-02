<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index () {
        return 'Selamat Datang';
    }

    public function about () {
        return 'Nama : Gwido Putra Wijaya <br> NIM : 2341720103';

    }

    public function articles ($articleID) {
        return 'Halaman artikel dengan Id {'.$articleID. '}';        
    }
}