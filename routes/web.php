<?php

use App\Http\Controllers\admin\ChatAdminController;
use App\Http\Controllers\Admin\DashboardAdminController;
use App\Http\Controllers\admin\KategoriAdminController;
use App\Http\Controllers\admin\LaporanPenjualanAdminController;
use App\Http\Controllers\admin\PesananAdminController;
use App\Http\Controllers\admin\ProdukAdminController;
use App\Http\Controllers\admin\ProfileAdminController;
use App\Http\Controllers\admin\RekeningAdminController;
use App\Http\Controllers\customer\AlamatUserController;
use App\Http\Controllers\customer\ChatCustomerController;
use App\Http\Controllers\customer\CheckoutCustomerController;
use App\Http\Controllers\Customer\DashboardCustomerController;
use App\Http\Controllers\customer\KeranjangCustomerController;
use App\Http\Controllers\customer\PesananCustomerController;
use App\Http\Controllers\customer\ProdukCustomerController;
use App\Http\Controllers\Customer\ProfileCustomerController;
use App\Http\Controllers\HomeController;
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

Route::get('/', [HomeController::class, 'index']);
Route::get('/home/produk', [HomeController::class, 'produk'])->name('home.produk');
Route::get('/produk/detail_produk/{produk}', [HomeController::class, 'detail_produk'])->name('home.produk_detail');
Route::get('/produk/kategori/{produk}', [HomeController::class, 'search_kategori'])->name('home.produk_kategori');

Auth::routes();

Route::middleware(['auth', 'user-access:admin'])->group(function () {

    Route::get('/admin/dashboard', [DashboardAdminController::class, 'index'])->name('admin.dashboard');

    Route::get('/admin/profile', [ProfileAdminController::class, 'index'])->name('admin.profile');
    Route::put('/admin/profile/data/{profile}', [ProfileAdminController::class, 'update_data'])->name('admin.profile_data_update');
    Route::put('/admin/profile/password/{profile}', [ProfileAdminController::class, 'update_password'])->name('admin.profile_password_update');
    Route::put('/admin/profile/foto/{profile}', [ProfileAdminController::class, 'update_foto'])->name('admin.profile_foto_update');

    Route::resource('/admin/kategori', KategoriAdminController::class);

    Route::resource('/admin/produk', ProdukAdminController::class);

    Route::resource('/admin/rekening', RekeningAdminController::class);

    Route::get('/admin/pesanan_masuk', [PesananAdminController::class, 'lihat_pesanan'])->name('admin.pesanan_masuk');
    Route::get('/admin/pesanan_masuk/terima/{pesanan}', [PesananAdminController::class, 'terima_pesanan'])->name('admin.pesanan_terima');
    Route::get('/admin/pesanan_masuk/tolak/{pesanan}', [PesananAdminController::class, 'tolak_pesanan'])->name('admin.pesanan_tolak');

    Route::get('/admin/pesanan_prosess', [PesananAdminController::class, 'pesanan_onprosses'])->name('admin.pesanan_prosses');

    Route::get('/admin/pesanan_invoice/{pesanan}', [PesananAdminController::class, 'invoice'])->name('admin.pesanan_invoice');

    Route::get('/admin/pesanan/dp/tagihan/{pesanan}', [PesananAdminController::class, 'pesanan_dp_tagihan'])->name('admin.pesanan_tagihan');

    Route::get('/admin/pesanan/dp/tolak_sisa/{pesanan}', [PesananAdminController::class, 'tolak_sisa'])->name('admin.tolak_sisa');

    Route::post('/admin/pesanan_kirim', [PesananAdminController::class, 'pesanan_kirim'])->name('admin.pesanan_kirim');
    Route::get('/admin/pesanan_deliver', [PesananAdminController::class, 'pesanan_deliver'])->name('admin.pesanan_deliver');

    Route::get('/admin/chat', [ChatAdminController::class, 'index'])->name('admin.chat');
    Route::get('/admin/chat_detail/{chat}', [ChatAdminController::class, 'detail_chat'])->name('admin.chat_detail');
    Route::post('/admin/chat_detail', [ChatAdminController::class, 'send'])->name('admin.post_chat');

    Route::get('/admin/Laporan', [LaporanPenjualanAdminController::class, 'index'])->name('admin.laporan');
    Route::post('/admin/Laporan', [LaporanPenjualanAdminController::class, 'laporan_cari'])->name('admin.laporan_cari');

});

Route::middleware(['auth', 'user-access:customer'])->group(function () {

    Route::get('/customer/dashboard', [DashboardCustomerController::class, 'index'])->name('customer.dashboard');

    Route::get('/customer/profile', [ProfileCustomerController::class, 'index'])->name('customer.profile');
    Route::put('/customer/profile/data/{profile}', [ProfileCustomerController::class, 'update_data'])->name('customer.profile_data_update');
    Route::put('/customer/profile/password/{profile}', [ProfileCustomerController::class, 'update_password'])->name('customer.profile_password_update');
    Route::put('/customer/profile/foto/{profile}', [ProfileCustomerController::class, 'update_foto'])->name('customer.profile_foto_update');

    Route::get('/customer/produk', [ProdukCustomerController::class, 'index'])->name('customer.produk');
    Route::get('/customer/produk/detail/{produk}', [ProdukCustomerController::class, 'detail_produk'])->name('customer.produk_detail');
    Route::get('/customer/produk/kategori/{produk}', [ProdukCustomerController::class, 'search_kategori'])->name('customer.produk_kategori');

    Route::get('/customer/keranjang', [KeranjangCustomerController::class, 'index'])->name('customer.keranjang');
    Route::post('/customer/keranjang', [KeranjangCustomerController::class, 'store'])->name('customer.keranjang_store');
    Route::put('/customer/keranjang/{keranjang}', [KeranjangCustomerController::class, 'update'])->name('customer.keranjang_update');
    Route::delete('/customer/keranjang/{keranjang}', [KeranjangCustomerController::class, 'delete'])->name('customer.keranjang_delete');

    Route::get('/customer/checkout/{checkout}', [CheckoutCustomerController::class, 'index'])->name('customer.checkout');

    Route::resource('/customer/alamat', AlamatUserController::class);

    Route::get('/customer/pesanan', [PesananCustomerController::class, 'index'])->name('customer.pesanan');
    Route::post('/customer/pesanan/store', [PesananCustomerController::class, 'store_pesanan'])->name('customer.pesanan_store');
    Route::get('/customer/pesanan/upload_ulang/{pesanan}', [PesananCustomerController::class, 'upload_ulang'])->name('customer.upload_ulang');
    Route::post('/customer/pesanan/upload_ulang/store', [PesananCustomerController::class, 'upload_store'])->name('customer.upload_store');

    Route::post('/customer/pesanan/sisa_tagihan', [PesananCustomerController::class, 'upload_sisa_tagihan'])->name('customer.upload_sisa_tagihan');

    Route::get('/customer/pesanan_invoice/{pesanan}', [PesananCustomerController::class, 'invoice'])->name('customer.pesanan_invoice');

    Route::get('/customer/pesanan_deliver', [PesananCustomerController::class, 'pesanan_deliver'])->name('customer.pesanan_deliver');

    Route::post('/customer/pesanan_diterima', [PesananCustomerController::class, 'pesanan_diterima'])->name('customer.pesanan_diterima');
    Route::get('/customer/riwayat_pesanan', [PesananCustomerController::class, 'history'])->name('customer.pesanan_history');

    Route::get('/customer/chat', [ChatCustomerController::class, 'index'])->name('customer.chat');
    Route::post('/customer/chat', [ChatCustomerController::class, 'send'])->name('customer.post_chat');
});
// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
