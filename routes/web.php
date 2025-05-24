<?php

use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('homepage');
// });

Route::get('/login', function () {
    return view('Login');
});
Route::get('/company', function () {
    return view('company');
})->name('company');

use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProductController;


Route::get('/', [ProductController::class, 'homepage'])->name('homepage');


Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/products', [ProductController::class,'homepage'])->name('products.index');
Route::get('/admin', [ProductController::class,'admin'])->name('admin');
Route::post('/product', [ProductController::class,'store'])->name('products.store');
