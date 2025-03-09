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

        // --> Praktikum 2.5
        // $user = UserModel::create([
        //     'username' => 'manager11',
        //     'nama' => 'Manager11',
        //     'password' => Hash::make('12345'),
        //     'level_id' => 2,
        // ]);

        // $user->username = 'manager12';

        // $user->save();

        // $user->wasChanged(); // true
        // $user->wasChanged('username'); // true
        // $user->wasChanged(['username', 'level_id']); // true
        // $user->wasChanged('nama'); // false
        // dd($user->wasChanged(['nama', 'username'])); // true
        // --> Praktikum 2.5
        // $user = UserModel::all();     

        $user = UserModel::with('level')->get();
        // dd($user);
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


    public function tambah_simpan(Request $request)
    {
        UserModel::create([
            'username' => $request->username,
            'nama' => $request->nama,
            'password' => Hash::make('$request->password'),
            'level_id' => $request->level_id
        ]);
        return redirect('/user');
    }
    public function ubah($id)
    {
        $user = UserModel::find($id);
        return view('user_ubah', ['data' => $user]);
    }

    public function ubah_simpan($id, Request $request)
    {
        $user = UserModel::find($id);

        $user->username = $request->username;
        $user->nama = $request->nama;
        $user->password = Hash::make($request->password);
        $user->level_id = $request->level_id;

        $user->save();

        return redirect('/user');
    }

    public function hapus($id)
    {
        $user = UserModel::find($id);
        $user->delete();

        return redirect('/user');
    }

}