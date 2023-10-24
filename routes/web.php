<?php

use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('users.welcome');
});

Route::get('/about', function () {
    return view('users.about');
});

Route::get('/product', function () {
    return view('users.product');
});

Route::get('/blog', function () {
    return view('users.blog');
});

Route::get('/blog/detail', function () {
    return view('users.blog-detail');
});

Route::get('/contact', function () {
    return view('users.contact');
});

Route::get('/vendor', function () {
    return view('users.vendor');
});

Route::get('/vendor/detail', function () {
    return view('users.vendor-detail');
});

Route::get('/wishlist', function () {
    return view('users.wishlist');
});

Route::get('/cart', function () {
    return view('users.cart');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
