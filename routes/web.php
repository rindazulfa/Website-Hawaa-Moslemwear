<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\PromoController;
use App\Http\Controllers\Admin\CustomerController;
use App\Http\Controllers\Admin\SupplierController;
use App\Http\Controllers\Admin\MaterialController;
use App\Http\Controllers\Admin\UserController;
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

Route::group([  
    'namespace' => 'Admin',
    'middleware' => ['auth', 'checkrole:admin']
], function () {
    Route::resource('admin','DashboardController');
    
    Route::resource('banner','BannerController');
    Route::resource('profilumkm','ProfilController');
 
    Route::resource('user','UserController');
    Route::resource('customer','CustomerController');

    Route::resource('produk','ProductController');
    Route::resource('stok_produk','StokProductController');

    Route::resource('supplier','SupplierController');
    Route::resource('bahan_baku','MaterialController');
    Route::resource('resep','RecipeController');

    Route::resource('discount','DiscountController');
    Route::resource('discount_product', 'DiscountProductController');
    
  
    

    // Transaksi Pembelian
    Route::resource('pembelian','PurchaseController');
    Route::resource('produksi','ProductionController');

    // Transaksi Penjualan
    Route::resource('penjualan','OrderController');

    // Transaksi Penjualan Custom
    Route::resource('penjualancustom','Order_CustomController');
});


// User
Route::group([  
    'namespace' => 'User',
    'middleware' => ['auth', 'checkrole:user']
], function () {
    Route::resource('dashboard','DashboardController'); 
});

// Auth 
Route::get('/login', function () {
    return view('package/login');
});
Route::post('/login', 'Auth\LoginController@login')->name('login');

Route::get('/register', function () {
    return view('package/register');
});
Route::post('/register', 'Auth\RegisterController@register')->name('register');

Route::get('/logout', 'Auth\LoginController@logout')->name('logout');



// FRONT END
Route::resource('/','HomepageController');
Route::resource('/about','AboutController');
Route::resource('/shop','ShopController');
Route::get('/shop/stok', 'ShopController@checkStokBySize')->name("shop_cek");
Route::post('/shop/detail/{id}', 'ShopController@process')->name('shop_detail');

// Route::resource('/detailproduct','DetailProductController');
// Route::resource('/confirmpayment','Confirm_PaymentController');
// Route::resource('/cart','CartController');
// Route::resource('/custom','CustomProductController');
// Route::resource('/checkout','CheckoutController');