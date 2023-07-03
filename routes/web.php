<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BeliController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\RotiController;
use App\Http\Controllers\DaftarController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FiltermenuController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\PesananController;

Route::get('/daftar', [DaftarController::class, 'index'])->name('daftar.user');
Route::post('/daftar/store', [DaftarController::class, 'store'])->name('daftar.store');

Route::middleware(['web'])->group(function () {
    Route::get('/login', [AuthController::class, 'index'])->name('login.admin');
    Route::post('/post', [AuthController::class, 'postlogin'])->name('login.post');
    Route::post('logout', [AuthController::class, 'logout'])->name('logout');
});

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

    die('Sebagai User');
    Route::get('logout', [AuthController::class, 'logoutGoogle'])->name('logout.google');
    Route::get('/beli', [BeliController::class, 'index'])->name('beli');
    Route::post('/confirm', [BeliController::class, 'beli'])->name('confirm');
    Route::post('/bayar', [BeliController::class, 'bayar'])->name('bayar');
});


// admin/dataroti

Route::middleware('admin')->group(function () {
    die('Sebagai Admin');
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // RotiController
    Route::get('/dataroti', [RotiController::class, 'index'])->name('admin.dataroti.index');
    Route::get('/dataroti/create', [RotiController::class, 'create'])->name('admin.dataroti.create');
    Route::post('/dataroti', [RotiController::class, 'store'])->name('admin.dataroti.store');
    Route::get('/dataroti/{id_roti}/edit', [RotiController::class, 'edit'])->name('admin.dataroti.edit');
    Route::put('/dataroti/{id_roti}', [RotiController::class, 'update'])->name('admin.dataroti.update');
    Route::get('/dataroti/{id_roti}', [RotiController::class, 'destroy'])->name('admin.dataroti.destroy');

    // PesananController
    Route::get('/pesanan', [PesananController::class, 'show'])->name('admin.pesanan.index');
    Route::get('/pesanan/{id}', [PesananController::class, 'delete'])->name('delete');

    // KategoriController
    Route::get('/kategori', [KategoriController::class, 'index'])->name('admin.kategori.index');
    Route::get('/kategori/create', [KategoriController::class, 'create'])->name('admin.kategori.create');
    Route::post('/kategori', [KategoriController::class, 'store'])->name('admin.kategori.store');
    Route::get('/kategori/{id_kategori}/edit', [KategoriController::class, 'edit'])->name('admin.kategori.edit');
    Route::put('/kategori/{id_kategori}', [KategoriController::class, 'update'])->name('admin.kategori.update');
    Route::get('/kategori/{id_kategori}', [KategoriController::class, 'destroy'])->name('admin.kategori.destroy');
});
