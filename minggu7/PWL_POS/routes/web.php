<?php

use App\Http\Controllers\KategoriController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\LevelController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\AuthController;
use App\Http\Middleware\AuthorizeUser;

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

Route::pattern('id', '[0-9]+');

Route::get('login', [AuthController::class, 'login'])->name('login');
Route::post('login', [AuthController::class, 'postLogin']);
Route::get('logout', [AuthController::class, 'logout'])->middleware('auth');

Route::middleware(['auth'])->group(function () {
   Route::get('/', [WelcomeController::class, 'index']);

   Route::group(['prefix' => 'user'], function () {
      Route::get('/', [UserController::class, 'index']);
      Route::post('/list', [UserController::class, 'list']);
      Route::get('/create', [UserController::class, 'create']);
      Route::post('/', [UserController::class, 'store']);
      Route::get('/create_ajax', [UserController::class, 'create_ajax']);
      Route::post('/ajax', [UserController::class, 'store_ajax']);
      Route::get('/{id}', [UserController::class, 'show']);
      Route::get('/{id}/edit', [UserController::class, 'edit']);
      Route::put('/{id}', [UserController::class, 'update']);
      Route::get('/{id}/show_ajax', [UserController::class, 'show_ajax']);
      Route::get('/{id}/edit_ajax', [UserController::class, 'edit_ajax']);
      Route::put('/{id}/update_ajax', [UserController::class, 'update_ajax']);
      Route::get('/{id}/delete_ajax', [UserController::class, 'confirm_ajax']);
      Route::delete('/{id}/delete_ajax', [UserController::class, 'delete_ajax']);
      Route::delete('/{id}', [UserController::class, 'destroy']);
   });


   // artinya semua route di dalam group ini harus punya role ADM (Administrator)
   Route::middleware(['authorize:ADM'])->group(function () {
      Route::get('/level/', [LevelController::class, 'index']);
      Route::post('/level/list', [LevelController::class, 'list']);
      Route::get('/level/create', [LevelController::class, 'create']);
      Route::post('/level/', [LevelController::class, 'store']);
      Route::get('/level/create_ajax', [LevelController::class, 'create_ajax']); // Menampilkan halaman form tambah user Ajax
      Route::post('/level/ajax', [LevelController::class, 'store_ajax']); // Menyimpan data user baru Ajax
      Route::get('/level/{id}', [LevelController::class, 'show']);
      Route::get('/level/{id}/show_ajax', [LevelController::class, 'show_ajax']);
      Route::get('/level/{id}/edit', [LevelController::class, 'edit']);
      Route::put('/level/{id}', [LevelController::class, 'update']);
      Route::get('/level/{id}/edit_ajax', [LevelController::class, 'edit_ajax']); // Menampilkan halaman form edit user Ajax
      Route::put('/level/{id}/update_ajax', [LevelController::class, 'update_ajax']); // Menyimpan perubahan data user Ajax
      Route::get('/level/{id}/delete_ajax', [LevelController::class, 'confirm_ajax']); // Untuk tampilkan form confirm delete user Ajax
      Route::delete('/level/{id}/delete_ajax', [LevelController::class, 'delete_ajax']); // Untuk hapus data user Ajax
      Route::delete('/level/{id}', [LevelController::class, 'destroy']);
   });

   Route::group(['prefix' => 'kategori'], function () {
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

   Route::group(['prefix' => 'barang'], function () {
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

   Route::group(['prefix' => 'supplier'], function () {
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

   Route::post('/logout', function () {
      Auth::logout();
      request()->session()->invalidate();
      request()->session()->regenerateToken();
      return redirect('/login');
   })->name('logout');

});
