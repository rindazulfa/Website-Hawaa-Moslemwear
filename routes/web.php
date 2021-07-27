<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\PromoController;
use App\Http\Controllers\User\CustomerController;
use App\Http\Controllers\Admin\SupplierController;
use App\Http\Controllers\Admin\MaterialController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\Order_CustomController;
use App\Http\Controllers\User\CustomProductController;
use App\Http\Controllers\Admin\Detail_CheckoutController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\HomepageController;
use App\Http\Controllers\HistoryCustomController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\User\CartController;
use App\Http\Controllers\User\Confirm_PaymentController;
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
    Route::resource('admin', 'DashboardController');

    Route::resource('banner', 'BannerController');
    Route::resource('profilumkm', 'ProfilController');

    Route::resource('user', 'UserController');
    // Route::post('custupdate/{id}', 'CustomerController@updateData')->name('custupdate');
    // Route::get('custdelete/{id}', 'CustomerController@deleteData')->name('custdelete');

    Route::resource('admin', 'DashboardController');

    Route::resource('banner', 'BannerController');
    Route::resource('profilumkm', 'ProfilController');

    Route::resource('user', 'UserController');
    Route::resource('customer', 'CustomerController');

    Route::resource('produk', 'ProductController');
    Route::resource('stok_produk', 'StokProductController');

    Route::resource('supplier', 'SupplierController');
    Route::resource('bahan_baku', 'MaterialController');

    Route::resource('shipping', 'ShippingController');
    Route::resource('kategori', 'CategoryController');
    Route::resource('payment', 'PaymentController');

    //Resep
    Route::get('/form_resep/{id}', 'RecipeController@form')->name('form_resep');
    Route::post('/tambah_bahan/{id}', 'RecipeController@tambah')->name('tambah_bahan');
    Route::resource('resep', 'RecipeController');

    // Transaksi Pembelian
    // Route::get('/pembelian/cetak_pdf', 'PurchaseController@cetak_pdf')->name('pembelian.pdf');
    Route::resource('pembelian', 'PurchaseController');
    Route::post('/pembelian/cetak_pdf','PurchaseController@cetak_pdf')->name('pembelian.pdf');
    
    // Produksi
    // Route::get('/produksi/cetak_pdf', 'ProductionController@cetak_pdf')->name('produksi.pdf');
    Route::post('/produksi/cetak_pdf', 'ProductionController@cetak_pdf')->name('produksi.pdf');
    Route::resource('produksi', 'ProductionController');

    // Transaksi Penjualan
    // Route::get('/penjualan/cetak_pdf', 'OrderController@cetak_pdf')->name('penjualan.pdf');
    Route::post('/penjualan/cetak_pdf', 'OrderController@cetak_pdf')->name('penjualan.pdf');
    Route::resource('penjualan', 'OrderController');
    Route::get('/penjualan/statuspay/den/{id}', [OrderController::class, 'updsttspayden'])->name('den.pay');

    // Transaksi Penjualan Custom
    // Route::get('/penjualancustom/cetak_pdf', 'Order_CustomController@cetak_pdf')->name('custom.pdf');
    Route::post('/penjualancustom/cetak_pdf', 'Order_CustomController@cetak_pdf')->name('custom.pdf');
    Route::resource('penjualancustom', 'Order_CustomController');
    Route::get('/penjualancustom/statusdesain/acc/{id}', [Order_CustomController::class, 'updsttsdesacc'])->name('acc.desain');
    Route::get('/penjualancustom/statusdesain/den/{id}', [Order_CustomController::class, 'updsttsdesden'])->name('den.desain');
    Route::get('/penjualancustom/update/{id}', [Order_CustomController::class, 'tampileditharga'])->name('edit.harga');
    Route::get('/penjualancustom/updatetanggal/{id}', [Order_CustomController::class, 'tampiltanggalpengiriman'])->name('edit.tanggal');
});


// User
Route::group([
    'namespace' => 'User',
    'middleware' => ['auth', 'checkrole:user,admin']
], function () {
    Route::resource('customer', 'CustomerController');
    Route::resource('cart', 'CartController');
    Route::get('/delhis/{id}', 'CartController@delhis')->name('del.his');
    Route::get('/delcart/{id}', 'CartController@delcart')->name('del.cart');
    Route::post('/updcart', 'CartController@updcart')->name('upd.cart');
    // Route::get('/tampil/checkout/{id}','CartController@tampilcheckout')->name('tampil.checkout');

    Route::resource('riwayat', 'RiwayatController');
    Route::get('/riwayat/cetak_pdf/{id}', 'RiwayatController@cetak_pdf')->name('invoice_produk');

    Route::resource('checkout', 'CheckoutController');

    // Custom
    Route::resource('/custom', 'CustomProductController');
    Route::get('/custom/status/den/{id}', [CustomProductController::class, 'updsttsden'])->name('den.status');
    Route::resource('/confirmpayment', 'Confirm_PaymentController');
    Route::get('/confirmpayment/statuspay/acc/{id}', [Confirm_PaymentController::class, 'accpembayaran'])->name('acc.pay');
    Route::get('/confirmpaymentproduk/statuspay/acc/{id}', [Confirm_PaymentController::class, 'accpembayaranproduk'])->name('acc.payprod');

    // Route::post('/custom/simpanharga', [CustomProductController::class, 'simpanbayar'])->name('harga.store');

    // History
    Route::resource('/history', 'HistoryCustomController');
    Route::get('/history/cetak_pdf/{id}', 'HistoryCustomController@cetak_pdf')->name('invoice_custom');


    // Route::resource('/profil', 'ProfileController');

    // Route::resource('dashboard', 'DashboardController');
    // Route::get('/home', [HomepageController::class, 'indexlogin'])->name('home');
    // Route::get('/home/about', [AboutController::class, 'indexlogin'])->name('aboutlogin');
    // Route::get('/home/shop', [ShopController::class, 'indexlogin'])->name('shoplogin');
});

// Auth
Route::get('/login', 'Auth\LoginController@getLogin');
Route::post('/login', 'Auth\LoginController@login')->name('login');

Route::get('/register', function () {
    return view('package/register');
});
Route::post('/register', 'Auth\RegisterController@register')->name('register');

Route::get('/logout', 'Auth\LoginController@logout')->name('logout');



// FRONT END (Belum Login)
Route::resource('/', 'HomepageController');
Route::resource('/about', 'AboutController');
Route::resource('/shop', 'ShopController');

//ORDER CUSTOM
Route::post('/shop/detail/{id}', 'ShopController@process')->name('shop_detail');
Route::get('/shop/stok', 'ShopController@checkStokBySize')->name("shop_cek");
