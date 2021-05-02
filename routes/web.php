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
    'namespace' => 'Admin'
], function () {
    // Route::resource('admin','DashboardController');
    // Route::resource('datapromo','PromoController');
    // Route::resource('customer','CustomerController');
    // Route::resource('supplier','SupplierController');
    // Route::resource('bahan_baku','MaterialController');
    // Route::resource('user','UserController');
    Route::resource('stok_produk','StokProductController');
    Route::resource('banner','BannerController');
    Route::resource('profilumkm','ProfilController');
    // Produk
    Route::resource('dataproduk','ProductController');

    // Transaksi Pembelian
    Route::resource('datatranspembelian','Transaksi_PembelianController');

    // Transaksi Penjualan
    Route::resource('datatranspenjualan','Transaksi_PenjualanController');

    // Transaksi Penjualan Custom
    Route::resource('datatranspenjualancustom','Transaksi_PenjualanCustomController');
});

// ADMIN
Route::get('/admin', [DashboardController::class, 'index']);

// Data Promo
Route::get('/admin/datapromo', [PromoController::class, 'index']);
Route::get('/admin/datapromo/formpromo', [PromoController::class, 'create']);

// Data Customer
Route::get('/admin/datacustomer', [CustomerController::class, 'index']);
// Route::get('/admin/datacustomer/formcustomer', [CustomerController::class, 'create']);

// Data Supplier
Route::get('/admin/datasupplier', [SupplierController::class, 'index']);
Route::get('/admin/datasupplier/formsupplier', [SupplierController::class, 'create']);

// Data Bahan Baku
Route::get('/admin/datamaterial', [MaterialController::class, 'index']);
Route::get('/admin/datamaterial/formmaterial', [MaterialController::class, 'create']);
Route::get('/admin/datamaterial/updatematerial', [MaterialController::class, 'edit']);

// Data User
Route::get('/admin/datauser', [UserController::class, 'index']);
Route::get('/admin/datauser/formuser', [UserController::class, 'create']);

// Data Stock Produk

// 




// FRONT END

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
