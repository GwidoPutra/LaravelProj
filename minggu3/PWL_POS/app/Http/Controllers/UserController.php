<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserModel;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function index()
    {
        //tambah data dengan Eloquent Model
        $data = [
            'username' =>'Pelanggan 1'
        ];
        UserModel::where('username', 'customer-1')->update($data); //update data user

                //coba akses model usermodel

        $data = UserModel::all(); //mengambil semua data dari tabel m_user
        return view('user', ['data' => $data]); 
    }
}