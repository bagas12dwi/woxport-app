<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BankAccountController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\User\BlogController as UserBlogController;
use App\Http\Controllers\User\CartController;
use App\Http\Controllers\User\PaymentController;
use App\Http\Controllers\User\ProductController as UserProductController;
use App\Http\Controllers\User\TransactionListController;
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

// ROUTE USER 
Route::group(['middleware' => ['auth', 'cekrole:user,vendor']], function () {
    Route::get('/success', function () {
        return view('users.success-payment', [
            'title' => 'Success'
        ]);
    });
    Route::resource('/wishlist', WishlistController::class);
    Route::delete('/unlike/{wishlist}', [WishlistController::class, 'unlike']);
    Route::resource('/cart', CartController::class);
    Route::resource('vendor/daftar-toko', ControllersVendorController::class);
    Route::post('/payment/store', [PaymentController::class, 'store']);
    Route::get('/payment/{order_number}', [PaymentController::class, 'index']);
    Route::put('/payment/{order_number}', [PaymentController::class, 'update']);
    Route::get('/profile', [ProfileController::class, 'index']);
    Route::put('/profile/{user}', [ProfileController::class, 'update']);
    Route::get('/daftar-transaksi', [TransactionListController::class, 'index']);
    Route::get('/daftar-transaksi/detail/{order_number}', [TransactionListController::class, 'detail']);
});

Route::group(['middleware' => ['auth']], function () {
    Route::get('/change-password', function () {
        return view('users.change-password');
    });
    Route::post('/logout', [AuthController::class, 'logout']);
});


// Route Auth
Route::group(['middleware' => ['guest']], function () {
    Route::get('/login', [AuthController::class, 'indexLogin'])->name('login');
    Route::get('/register', [AuthController::class, 'indexRegister']);
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/login', [AuthController::class, 'login']);
});

// ROUTE VENDOR 
Route::group(['middleware' => ['auth', 'cekrole:vendor']], function () {
    Route::resource('/vendor/produk', ProductController::class);
    Route::get('/vendor/toko', [ShopController::class, 'index']);
    Route::get('/vendor/edit-toko', [ShopController::class, 'edit']);
    Route::post('/vendor/edit-toko', [ShopController::class, 'update']);
    Route::get('/vendor/transaksi', [TransactionController::class, 'index']);
    Route::get('/vendor/transaksi/konfirmasi', [TransactionController::class, 'indexConfirmTransaction']);
    Route::get('/vendor/transaksi/detail/{order_number}', [TransactionController::class, 'detail']);
    Route::post('/vendor/transaksi/konfirmasi/setuju', [TransactionController::class, 'konfirmasi']);
    Route::post('/vendor/transaksi/konfirmasi/tolak', [TransactionController::class, 'tolak']);
});

// ROUTE ADMIN
Route::group(['middleware' => ['auth', 'cekrole:admin']], function () {
    Route::get('/dashboard', [DashboardController::class, 'index']);
    Route::resource('kategori', CategoryController::class);
    Route::resource('user', UserController::class);
    Route::resource('manage-blog', BlogController::class);
    Route::resource('manage-bank', BankAccountController::class);
});
