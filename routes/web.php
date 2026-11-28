<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SapaController;
Route::get('/sapa', [SapaController::class, 'index']);


Route::get('/', function () {
    return view('pages.beranda2');
});



Route::get('/about', function () {
    return view('pages.about2', [
        'nama'=> 'Jessila Cantikasari',
        'kelas'=> 'D4SM 48-04',
        'nim' => '707082400118',
    ]);
});

Route::get('/latihan', function () {
    $matakuliah = ['Pemrograman Web', 'Basis Data', 'UI/UX'];
    return view('pages.latihan', ['matakuliah' => $matakuliah]);
});



Route::get('/product', function () {
    $produk = [
        ['Mark', 10, 12000],
        ['Jacob', 19, 19000],
        ['Larry the Bird', 4, 5000],
        ['Nitro', 8, 9000000],
    ];

    return view('pages.latihan', [
        'produk' => $produk,
    ]);
});

Route::view('/contact', 'pages.contact2');
Route::get('/product', [ProductController::class, 'index']);
Route::get('/product/addProduct', [ProductController::class, 'addProduct']);
Route::post('/product', [ProductController::class, 'store']);
Route::post('/product', [ProductController::class, 'store']);
Route::get('/product/{id}', [ProductController::class, 'show']);
Route::get('/product/{id}/edit', [ProductController::class, 'edit']);
Route::put('/product/{id}', [ProductController::class, 'update']);
Route::delete('/product/{id}', [ProductController::class, 'destroy']);
