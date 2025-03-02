<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PhotoController;
use App\Http\Controllers\WelcomeController;

// //praktikum 1

// Route::get('hello', function () {
//     return 'Hello World';
// }); 

// Route::get('/world', function (){
//     return 'world';
// });

// Route::get('/about', function () {
//     return 'Selamat Datang';
// });

// Route::get('/about1', function () {
//     return 'Nama   : Gwido Putra W <br> NIM    : 2341720103';
// });

// //praktikum 2

// Route::get('/user/{name}', function ($name) {
//     return 'Nama saya ' . $name;
// });

// Route::get('/posts/{post}/comments/{comment}', function ($postID, $commentID) {
//     return 'Pos ke-' . $postID . " Komentar ke-" . $commentID;
// });

// //praktikum 3

// Route::get('/articles/{id}', function ($articleID) {
//     return 'Halaman Artikel dengan ID {' . $articleID . '}';
// });

// Route::get('/articles/{id}', function ($articleID) {
//     return 'Halaman Artikel dengan ID {' . $articleID . '}';
// });

// Route::get('/user/{name?}', function ($name = null) {
//     return 'Nama saya ' . $name;
// });

// Route::get('/user/{name?}', function ($name = 'Gwido Putra W') {
//     return 'Nama saya ' . $name;
// });

//profile

Route::get('/hello', [WelcomeController::class, 'hello']);

Route::get('/', [PageController::class, 'index']);
Route::get('/about', [PageController::class, 'about']);
Route::get('/articles/{id}', [PageController::class, 'articles']);

Route::get('/', [HomeController::class, 'index']);
Route::get('/about', [AboutController::class, 'about']);
Route::get('/articles/{id}', [ArticleController::class, 'articles']);

Route::resource('photos', PhotoController::class)->only([
    'index', 'show'
]);
Route::resource('photos', PhotoController::class)->except([
    'create', 'store', 'update', 'destroy'
]);
   
Route::get ('/greeting', function () {
    return view('blog.hello ', ['name' => 'Gwido Putra W']);
});
