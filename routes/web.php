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
use App\Http\Controllers\CartController;

// Homepage
Route::get('/home', [ProductController::class, 'homepage'])->name('homepage');

// Login
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Company
Route::get('/company', function () {
    return view('company');
})->name('company');

// Admin Page
Route::get('/admin/{id?}', [ProductController::class,'admin'])
    ->where('id', '[0-9]+')
    ->name('admin');

// Product routes
Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::post('/product', [ProductController::class,'store'])->name('products.store');
Route::put('/products/{id}', [ProductController::class, 'update'])->name('products.update');
Route::delete('/products/{id}', [ProductController::class, 'destroy'])->name('products.destroy');

//cart
Route::post('/cart/add', [CartController::class, 'addToCartAjax'])->name('cart.add-ajax');
Route::get('/cart/count', [CartController::class, 'getCartCount'])->name('cart.count');


Route::get('/', function () {
    return view('products.index', ['products' => \App\Models\Product::all()]);
});

Route::prefix('cart')->group(function () {
    Route::get('/', [CartController::class, 'index'])->name('cart.index');
    Route::post('/add', [CartController::class, 'add'])->name('cart.add');
    Route::post('/update/{cart}', [CartController::class, 'update'])->name('cart.update');
    Route::delete('/remove/{cart}', [CartController::class, 'remove'])->name('cart.remove');
});

//navbar content
Route::get('/js/navBarContent.js', function () {
    return response()->file(resource_path('js/navBarContent.js'));});

// Debug
Route::get('/admin-test', function() {
    return "Admin route working!";
});

//cart clear
Route::post('/cart/clear', function () {
    session()->forget('cart');
    return redirect()->route('cart.view')->with('success', 'Keranjang dikosongkan');
})->name('cart.clear');