<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BeliController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\RotiController;
use App\Http\Controllers\DaftarController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\PesananController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FiltermenuController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\ProdukKeluarController;
use App\Http\Controllers\ProdukMasukController;

Route::get('/daftar', [DaftarController::class, 'index'])->name('daftar.user');
Route::post('/daftar/store', [DaftarController::class, 'store'])->name('daftar.store');

Route::middleware(['web'])->group(function () {
    Route::get('/login', [AuthController::class, 'index'])->name('login.admin');
    Route::post('/post', [AuthController::class, 'postlogin'])->name('login.post');
    Route::post('logout', [AuthController::class, 'logout'])->name('logout');
});

Route::get('/driver', function(){
    return view('driver.home');
})->name('driver.home');

Route::get('/list-pesanan', [PesananController::class, 'showPesanan'])->name('showPesanan');
Route::get('/transaksi/{id_pesanan}', [PesananController::class, 'transaksi'])->name('transaksi.form')->where('id_pesanan', '[0-9]+');
Route::post('/pesanan/{id_pesanan}', [HistoryController::class, 'storeTransaksi'])->name('storeTransaksi');

Route::get('/profile', function(){
    return view('driver.profile');
})->name('driver.profile');

Route::get('/masuk/google', [AuthController::class, 'login'])->name('login.google');
Route::get('/google/callback', [AuthController::class, 'callback'])->name('login.google.callback');
Route::get('/', [FrontendController::class, 'index'])->name('user.dashboard');
Route::get('about', [FrontendController::class, 'about'])->name('user.about');
Route::get('menu', [RotiController::class, 'showMenu'])->name('menu');
Route::get('invoice/{id_roti}', [InvoiceController::class, 'index'])->name('invoice.menu');
Route::get('search', [MenuController::class, 'search'])->name('search');
Route::get('filterView/{id_kategori}/filter', [FiltermenuController::class, 'filterView'])->name('filter.menu');
Route::get('filter', [FiltermenuController::class, 'filter'])->name('filter');

Route::middleware('auth')->group(function () {
    Route::get('logout', [AuthController::class, 'logoutGoogle'])->name('logout.google');
    Route::get('/beli', [BeliController::class, 'index'])->name('beli');
    Route::post('/confirm', [BeliController::class, 'beli'])->name('confirm');
    Route::post('/bayar', [BeliController::class, 'bayar'])->name('bayar');
    Route::post('/addToCart', [CartController::class, 'addToCart'])->name('addToCart');
    Route::get('/cart', [CartController::class, 'index'])->name('user.cart.view');
});


// admin/dataroti

Route::middleware('admin')->prefix('admin')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // RotiController
    Route::get('/dataroti', [RotiController::class, 'index'])->name('admin.dataroti.index');
    Route::get('/dataroti/create', [RotiController::class, 'create'])->name('admin.dataroti.create');
    Route::post('/dataroti', [RotiController::class, 'store'])->name('admin.dataroti.store');
    Route::get('/dataroti/{id_roti}/edit', [RotiController::class, 'edit'])->name('admin.dataroti.edit')->where('id_roti', '[0-9]+');
    Route::put('/dataroti/{id_roti}', [RotiController::class, 'update'])->name('admin.dataroti.update');
    Route::get('/dataroti/{id_roti}', [RotiController::class, 'destroy'])->name('admin.dataroti.destroy');

    // PesananController
    Route::get('/pesanan', [PesananController::class, 'show'])->name('admin.pesanan.index');
    Route::get('/pesanan/{id_pesanan}', [PesananController::class, 'delete'])->name('delete');

    // KategoriController
    Route::get('/kategori', [KategoriController::class, 'index'])->name('admin.kategori.index');
    Route::get('/kategori/create', [KategoriController::class, 'create'])->name('admin.kategori.create');
    Route::post('/kategori', [KategoriController::class, 'store'])->name('admin.kategori.store');
    Route::get('/kategori/{id_kategori}/edit', [KategoriController::class, 'edit'])->name('admin.kategori.edit');
    Route::put('/kategori/{id_kategori}', [KategoriController::class, 'update'])->name('admin.kategori.update');
    Route::get('/kategori/{id_kategori}', [KategoriController::class, 'destroy'])->name('admin.kategori.destroy');

    // produkmasuk
    Route::get('/produk_masuk', [ProdukMasukController::class, 'index'])->name('admin.produk_masuk');
    Route::get('/produk_masuk/add', [ProdukMasukController::class, 'showForm'])->name('admin.produk_masuk.add');
    Route::post('/produk_masuk/store', [ProdukMasukController::class, 'storeProduk'])->name('admin.produk_masuk.store');
    Route::get('/produk_masuk/edit/{id_pemasukan}', [ProdukMasukController::class, 'editForm'])->name('admin.produk_masuk.edit');
    Route::put('/produk_masuk/{id_pemasukan}', [ProdukMasukController::class, 'updateProduk'])->name('admin.produk_masuk.update');
    Route::get('/produk_masuk/{id_pemasukan}', [ProdukMasukController::class, 'destroy'])->name('admin.produk_masuk.destroy');

    // Produk Keluar
    Route::get('/produk_keluar', [ProdukKeluarController::class, 'index'])->name('admin.produk_keluar');
    Route::get('/produk_keluar/add', [ProdukKeluarController::class, 'showForm'])->name('admin.produk_keluar.add');
    Route::post('/produk_keluar/store', [ProdukKeluarController::class, 'storeProduk'])->name('admin.produk_keluar.store');
    Route::get('/produk_keluar/edit/{id_keluar}', [ProdukKeluarController::class, 'editForm'])->name('admin.produk_keluar.edit');
    Route::put('/produk_keluar/{id_keluar}', [ProdukKeluarController::class, 'updateProduk'])->name('admin.produk_keluar.update');
    Route::get('/produk_keluar/{id_keluar}', [ProdukKeluarController::class, 'destroy'])->name('admin.produk_keluar.destroy');
});
