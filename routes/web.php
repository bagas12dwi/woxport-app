<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BankAccountController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\User\BlogController as UserBlogController;
use App\Http\Controllers\User\CartController;
use App\Http\Controllers\User\ProductController as UserProductController;
use App\Http\Controllers\User\VendorController;
use App\Http\Controllers\User\WishlistController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VendorController as ControllersVendorController;
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

Route::get('/', [HomeController::class, 'index']);
Route::get('/about', function () {
    return view('users.about', [
        'title' => 'About'
    ]);
});
Route::get('/contact', function () {
    return view('users.contact', [
        'title' => 'Contact Us'
    ]);
});
Route::get('/product', [UserProductController::class, 'index']);
Route::get('/blog', [UserBlogController::class, 'index']);
Route::get('/blog/detail/{blog_id}', [UserBlogController::class, 'detail']);
Route::get('/list_vendor/{category_id}', [VendorController::class, 'index']);
Route::get('/vendor/detail/{product_id}', [VendorController::class, 'detail']);
Route::resource('/wishlist', WishlistController::class);
Route::delete('/unlike/{wishlist}', [WishlistController::class, 'unlike']);
Route::resource('/cart', CartController::class);
Route::resource('vendor/daftar-toko', ControllersVendorController::class);
Route::get('/profile', function () {
    return view('users.profile', ['title' => "Profile"]);
});
Route::get('/change-password', function () {
    return view('users.change-password');
});
Route::get('/payment', function () {
    return view('users.confirm-payment');
});

// Route Auth
Route::get('/login', [AuthController::class, 'indexLogin']);
Route::get('/register', [AuthController::class, 'indexRegister']);
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout']);

// ROUTE VENDOR 
Route::resource('/vendor/produk', ProductController::class);
Route::get('/vendor/toko', [ShopController::class, 'index']);

// ROUTE ADMIN
Route::get('/dashboard', [DashboardController::class, 'index']);
Route::resource('kategori', CategoryController::class);
Route::resource('user', UserController::class);
Route::resource('manage-blog', BlogController::class);
Route::resource('manage-bank', BankAccountController::class);
