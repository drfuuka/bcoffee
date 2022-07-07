<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\ProdukController;
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

Route::prefix('admin')->name('admin.')->group(function () {
    Auth::routes();
    Route::get('/dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard');
    Route::name('master.')->prefix('master')->group(function () {
        Route::resource('jenis-produk', JenisProdukController::class);
    });
    Route::resource('produk', ProdukController::class);
});