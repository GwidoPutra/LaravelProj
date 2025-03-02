<?php

use App\Http\Controllers\ItemController;
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

Route::get('/', function () { // Mendefinisikan route GET untuk path '/' (root)
    return view('welcome'); // Mengembalikan view bernama 'welcome'
});

Route::resource('items', ItemController::class); // Mendefinisikan route resource untuk resource 'items' yang terhubung dengan controller 'Item'