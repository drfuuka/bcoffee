<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\ProdukController;
use App\Http\Controllers\Admin\PromoController;
use App\Http\Controllers\Admin\Master\JenisProdukController;

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

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/promo', [App\Http\Controllers\PromoController::class, 'index'])->name('promo');
Route::get('/menu', [App\Http\Controllers\MenuController::class, 'index'])->name('menu');
Route::post('/menu', [App\Http\Controllers\MenuController::class, 'filterMenu']);
Route::get('/about', [App\Http\Controllers\AboutController::class, 'index'])->name('about');

Route::prefix('admin')->name('admin.')->group(function () {
    Auth::routes();
    Route::get('/dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard');

    // Master Route
    
    // Start Jenis Produk
        Route::name('master.')->prefix('master')->group(function () {
            Route::resource('jenis-produk', JenisProdukController::class);
        });
    // End Jenis Produk

    // Transaction Route

    // Start Produk
        Route::match(['put', 'patch'], 'produk/destroy-populer/{produk}', [App\Http\Controllers\Admin\ProdukController::class, 'destroyPopuler'])->name('produk.destroy-populer');
        Route::post('produk/create-populer', [App\Http\Controllers\Admin\ProdukController::class, 'createPopuler'])->name('produk.create-populer');
        Route::resource('produk', ProdukController::class);
    // End Produk

    // Start Promo
        Route::resource('promo', PromoController::class);
    // End Promo

    // Start About
        Route::name('about.')->prefix('about')->group(function (){
            Route::get('/', [App\Http\Controllers\Admin\AboutController::class, 'index'])->name('index');
            Route::post('/store', [App\Http\Controllers\Admin\AboutController::class, 'store'])->name('store');
            Route::post('/upload', [App\Http\Controllers\Admin\AboutController::class, 'upload'])->name('upload');
        });
    // End About

});