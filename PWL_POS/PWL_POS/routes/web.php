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

Route::get('register', [AuthController::class, 'register']);
Route::post('register', [AuthController::class, 'postRegister']);

Route::middleware(['auth'])->group(function () {
   Route::get('/', [WelcomeController::class, 'index']);

   // artinya semua route di dalam group ini harus punya role ADM
   Route::middleware(['authorize:ADM'])->group(function () {
      Route::get('/user/', [UserController::class, 'index']);
      Route::post('/user/list', [UserController::class, 'list']);
      Route::get('/user/create', [UserController::class, 'create']);
      Route::post('/user/', [UserController::class, 'store']);
      Route::get('/user/create_ajax', [UserController::class, 'create_ajax']);
      Route::post('/user/ajax', [UserController::class, 'store_ajax']);
      Route::get('/user/{id}', [UserController::class, 'show']);
      Route::get('/user/{id}/edit', [UserController::class, 'edit']);
      Route::put('/user/{id}', [UserController::class, 'update']);
      Route::get('/user/{id}/show_ajax', [UserController::class, 'show_ajax']);
      Route::get('/user/{id}/edit_ajax', [UserController::class, 'edit_ajax']);
      Route::put('/user/{id}/update_ajax', [UserController::class, 'update_ajax']);
      Route::get('/user/{id}/delete_ajax', [UserController::class, 'confirm_ajax']);
      Route::delete('/user/{id}/delete_ajax', [UserController::class, 'delete_ajax']);
      Route::delete('/user/{id}', [UserController::class, 'destroy']);
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

   // artinya semua route di dalam group ini harus punya roke ADM dan MNG
   Route::middleware(['authorize:ADM,MNG'])->group(function () {
      Route::get('/kategori', [KategoriController::class, 'index']);
      Route::post('/kategori/list', [KategoriController::class, 'list']);
      Route::get('/kategori/create', [KategoriController::class, 'create']);
      Route::post('/kategori/', [KategoriController::class, 'store']);
      Route::get('/kategori/create_ajax', [KategoriController::class, 'create_ajax']);
      Route::post('/kategori/ajax', [KategoriController::class, 'store_ajax']);
      Route::get('/kategori/{id}', [KategoriController::class, 'show']);
      Route::get('/kategori/{id}/show_ajax', [KategoriController::class, 'show_ajax']);
      Route::get('/kategori/{id}/edit', [KategoriController::class, 'edit']);
      Route::put('/kategori/{id}', [KategoriController::class, 'update']);
      Route::get('/kategori/{id}/edit_ajax', [KategoriController::class, 'edit_ajax']);
      Route::put('/kategori/{id}/update_ajax', [KategoriController::class, 'update_ajax']);
      Route::get('/kategori/{id}/delete_ajax', [KategoriController::class, 'confirm_ajax']);
      Route::delete('/kategori/{id}/delete_ajax', [KategoriController::class, 'delete_ajax']);
      Route::delete('/kategori/{id}', [KategoriController::class, 'destroy']);
   });

   // artinya semua route di dalam group ini harus punya role ADM (Administrator) dan MNG (Manager)
   Route::middleware(['authorize:ADM,MNG'])->group(function () {
      Route::get('/barang', [BarangController::class, 'index']);
      Route::post('/barang/list', [BarangController::class, 'list']);
      Route::get('/barang/create_ajax', [BarangController::class, 'create_ajax']); // ajax form create
      Route::post('/barang_ajax', [BarangController::class, 'store_ajax']);        // ajax store
      Route::get('/barang/{id}/show_ajax', [BarangController::class, 'show_ajax']); // ajax show
      Route::get('/barang/{id}/edit_ajax', [BarangController::class, 'edit_ajax']); // ajax form edit
      Route::put('/barang/{id}/update_ajax', [BarangController::class, 'update_ajax']); // ajax update
      Route::get('/barang/{id}/delete_ajax', [BarangController::class, 'confirm_ajax']); // ajax form confirm
      Route::delete('/barang/{id}/delete_ajax', [BarangController::class, 'delete_ajax']); // ajax delete
      Route::get('/barang/import', [BarangController::class, 'import']); // ajax form upload excel
      Route::post('/barang/import_ajax', [BarangController::class, 'import_ajax']); // ajax import excel
      Route::get('barang/export_excel', [BarangController::class, 'export_excel']); //export excel)
      Route::get('barang/export_pdf', [BarangController::class, 'export_pdf']); //export pdf)
   });

   // artinya semua route di dalam group ini harus punya role ADM dan MNG
   Route::middleware(['authorize:ADM,MNG'])->group(function () {
      Route::get('/supplier', [SupplierController::class, 'index']);
      Route::post('/supplier/list', [SupplierController::class, 'list']);
      Route::get('/supplier/create', [SupplierController::class, 'create']);
      Route::post('/supplier/', [SupplierController::class, 'store']);
      Route::get('/supplier/create_ajax', [SupplierController::class, 'create_ajax']); 
      Route::post('/supplier/ajax', [SupplierController::class, 'store_ajax']);
      Route::get('/supplier/{id}', [SupplierController::class, 'show']);
      Route::get('/supplier/{id}/show_ajax', [SupplierController::class, 'show_ajax']);
      Route::get('/supplier/{id}/edit', [SupplierController::class, 'edit']);
      Route::put('/supplier/{id}', [SupplierController::class, 'update']);
      Route::get('/supplier/{id}/edit_ajax', [SupplierController::class, 'edit_ajax']); 
      Route::put('/supplier/{id}/update_ajax', [SupplierController::class, 'update_ajax']); 
      Route::get('/supplier/{id}/delete_ajax', [SupplierController::class, 'confirm_ajax']); 
      Route::delete('/supplier/{id}/delete_ajax', [SupplierController::class, 'delete_ajax']); 
      Route::delete('/supplier/{id}', [SupplierController::class, 'destroy']);
   });

   Route::post('/logout', function () {
      Auth::logout();
      request()->session()->invalidate();
      request()->session()->regenerateToken();
      return redirect('/login');
   })->name('logout');

});
