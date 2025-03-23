<?php

use App\Http\Controllers\KategoriController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\LevelController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WelcomeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [WelcomeController::class,'index']);

// Route::get('/level',[LevelController::class,'index']);
// Route::get('/kategori',[KategoriController::class,'index']);
// Route::get('/user',[UserController::class,'index']);

// Route::get('/user/tambah',[UserController::class,'tambah']);
// Route::get('/user/tambah_simpan',[UserController::class,'tambah_simpan']);

// Route::get('/user/ubah/{id}',[UserController::class,'ubah']);
// Route::put('/user/ubah_simpan/{id}',[UserController::class,'ubah_simpan']);

// Route::get('/user/hapus/{id}',[UserController::class,'hapus']);

Route::group(['prefix' => 'user'], function () {
   Route::get('/',[UserController::class,'index']);
   Route::post('/list',[UserController::class,'list']); 
   Route::get('/create',[UserController::class,'create']);
   Route::post('/',[UserController::class,'store']);
   Route::get('/create_ajax',[UserController::class,'create_ajax']);
   Route::post('/ajax',[UserController::class,'store_ajax']);
   Route::get('/{id}',[UserController::class,'show']);
   Route::get('/{id}/edit',[UserController::class,'edit']);
   Route::put('/{id}',[UserController::class,'update']);
   Route::get('/{id}/show_ajax',[UserController::class,'show_ajax']);
   Route::get('/{id}/edit_ajax', [UserController::class,'edit_ajax']);
   Route::put('/{id}/update_ajax', [UserController::class,'update_ajax']);
   Route::get('/{id}/delete_ajax', [UserController::class,'confirm_ajax']);
   Route::delete('/{id}/delete_ajax', [UserController::class,'delete_ajax']);
   Route::delete('/{id}',[UserController::class,'destroy']);
});

Route::group(['prefix' => 'level'], function(){
   Route::get('/', [LevelController::class, 'index']);          
   Route::post('/list', [LevelController::class, 'list']);      
   Route::get('/create', [LevelController::class, 'create']);   
   Route::post('/', [LevelController::class, 'store']); 
   Route::get('/create_ajax', [UserController::class, 'create_ajax']);
   Route::post('/ajax', [UserController::class, 'store_ajax']);        
   Route::get('/{id}', [LevelController::class, 'show']);
   Route::get('/{id}/show_ajax', [KategoriController::class, 'show_ajax']);       
   Route::get('/{id}/edit', [LevelController::class, 'edit']);  
   Route::put('/{id}', [LevelController::class, 'update']);
   Route::get('/{id}/edit_ajax', [KategoriController::class, 'edit_ajax']); 
   Route::put('/{id}/update_ajax', [KategoriController::class, 'update_ajax']); 
   Route::get('/{id}/delete_ajax', [KategoriController::class, 'confirm_ajax']); 
   Route::delete('/{id}/delete_ajax', [KategoriController::class, 'delete_ajax']);      
   Route::delete('/{id}', [LevelController::class, 'destroy']); 
});

Route::group(['prefix' => 'kategori'], function(){
   Route::get('/', [KategoriController::class, 'index']);
   Route::post('/list', [KategoriController::class, 'list']);
   Route::get('/create', [KategoriController::class, 'create']);
   Route::post('/', [KategoriController::class, 'store']);
   Route::get('/create_ajax', [KategoriController::class, 'create_ajax']); 
   Route::post('/ajax', [KategoriController::class, 'store_ajax']); 
   Route::get('/{id}', [KategoriController::class, 'show']);
   Route::get('/{id}/show_ajax', [KategoriController::class, 'show_ajax']);
   Route::get('/{id}/edit', [KategoriController::class, 'edit']);
   Route::put('/{id}', [KategoriController::class, 'update']);
   Route::get('/{id}/edit_ajax', [KategoriController::class, 'edit_ajax']); 
   Route::put('/{id}/update_ajax', [KategoriController::class, 'update_ajax']); 
   Route::get('/{id}/delete_ajax', [KategoriController::class, 'confirm_ajax']); 
   Route::delete('/{id}/delete_ajax', [KategoriController::class, 'delete_ajax']); 
   Route::delete('/{id}', [KategoriController::class, 'destroy']);
});

Route::group(['prefix' => 'barang'], function(){
   Route::get('/', [BarangController::class, 'index']);
   Route::post('/list', [BarangController::class, 'list']);
   Route::get('/create', [BarangController::class, 'create']);
   Route::post('/', [BarangController::class, 'store']);
   Route::get('/create_ajax', [BarangController::class, 'create_ajax']); 
   Route::post('/ajax', [BarangController::class, 'store_ajax']); 
   Route::get('/{id}', [BarangController::class, 'show']);
   Route::get('/{id}/show_ajax', [BarangController::class, 'show_ajax']);
   Route::get('/{id}/edit', [BarangController::class, 'edit']);
   Route::put('/{id}', [BarangController::class, 'update']);
   Route::get('/{id}/edit_ajax', [BarangController::class, 'edit_ajax']); 
   Route::put('/{id}/update_ajax', [BarangController::class, 'update_ajax']); 
   Route::get('/{id}/delete_ajax', [BarangController::class, 'confirm_ajax']); 
   Route::delete('/{id}/delete_ajax', [BarangController::class, 'delete_ajax']); 
   Route::delete('/{id}', [BarangController::class, 'destroy']);
});

Route::group(['prefix' => 'supplier'], function(){
   Route::get('/', [SupplierController::class, 'index']);
   Route::post('/list', [SupplierController::class, 'list']);
   Route::get('/create', [SupplierController::class, 'create']);
   Route::post('/', [SupplierController::class, 'store']);
   Route::get('/create_ajax', [SupplierController::class, 'create_ajax']); 
   Route::post('/ajax', [SupplierController::class, 'store_ajax']); 
   Route::get('/{id}', [SupplierController::class, 'show']);
   Route::get('/{id}/show_ajax', [SupplierController::class, 'show_ajax']);
   Route::get('/{id}/edit', [SupplierController::class, 'edit']);
   Route::put('/{id}', [SupplierController::class, 'update']);
   Route::get('/{id}/edit_ajax', [SupplierController::class, 'edit_ajax']); 
   Route::put('/{id}/update_ajax', [SupplierController::class, 'update_ajax']); 
   Route::get('/{id}/delete_ajax', [SupplierController::class, 'confirm_ajax']); 
   Route::delete('/{id}/delete_ajax', [SupplierController::class, 'delete_ajax']); 
   Route::delete('/{id}', [SupplierController::class, 'destroy']);
});