<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

// ADMIN
Route::group([  
    'namespace' => 'Admin'
], function () {
    Route::resource('admin','DashboardController');
    
    // Produk
    Route::resource('dataproduk','ProductController');
    // Route::resource('tambahproduk','ProductController');

    // Transaksi Pembelian
    Route::resource('datatranspembelian','Transaksi_PembelianController');

    // Transaksi Penjualan
    Route::resource('datatranspenjualan','Transaksi_PenjualanController');

    // Transaksi Penjualan Custom
    Route::resource('datatranspenjualancustom','Transaksi_PenjualanCustomController');
});


//


Route::resource('/','HomepageController');

Route::get('/login', function () {
    return view('package/login');
});

Route::get('/register', function () {
    return view('package/register');
});

Route::resource('/about','AboutController');
Route::resource('/product','ProductController');
Route::resource('/detailproduct','DetailProductController');
Route::resource('/promo','PromoController');
Route::resource('/profil','ProfileController');
Route::resource('/confirmpayment','Confirm_PaymentController');
Route::resource('/cart','CartController');
Route::resource('/custom','CustomProductController');
Route::resource('/checkout','CheckoutController');
