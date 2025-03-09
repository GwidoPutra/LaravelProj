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
        // --> Praktikum 2.1 <--
        // $user = UserModel::find(1);
        // $user = UserModel::findOr(20, ['username', 'nama'], function() {
        //     abort(404);
        // });
        // --> Praktikum 2.1 <--


        // --> Praktikum 2.2 <--
        // $user = UserModel::findOrFail(1); 
        // $user = UserModel::where('username', 'manager9')->firstOrFail();
        // --> Praktikum 2.2 <--


        // --> Praktikum 2.3 <--
        // $user = UserModel::where('level_id', 2)->count();
        // dd($user);
        // --> Praktikum 2.3 <--

        // --> Praktikum 2.4
        // $user = UserModel::firstOrNew(
        //     [
        //         'username' => 'manager33',
        //         'nama' => 'Manager Tiga Tiga',
        //         'password' => Hash::make('12345'),
        //         'level_id' => 2
        //     ],
        // );
        // $user->save();
        // --> Praktikum 2.4

        $user = UserModel::create([
            'username' => 'manager11',
            'nama' => 'Manager11',
            'password' => Hash::make('12345'),
            'level_id' => 2,
        ]);
        
        $user->username = 'manager12';
        
        $user->save();
        
        $user->wasChanged(); // true
        $user->wasChanged('username'); // true
        $user->wasChanged(['username', 'level_id']); // true
        $user->wasChanged('nama'); // false
        dd($user->wasChanged(['nama', 'username'])); // true
        
        return view('user', ['data' => $user]);


        // //tambah data dengan Eloquent Model
        // $data = [
        //     'username' =>'Pelanggan 1'
        // ];
        // UserModel::where('username', 'customer-1')->update($data); //update data user

        //         //coba akses model usermodel

        // $data = UserModel::all(); //mengambil semua data dari tabel m_user
        // return view('user', ['data' => $data]); 
    }
}