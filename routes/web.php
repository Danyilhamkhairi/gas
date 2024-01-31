<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\PembelianController;
use App\Http\Controllers\DetailPembelianController;

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

Route::get('/', function () {
    return view('home.index');
});

Route::resource('supplier', SupplierController::class);
Route::resource('produk', ProdukController::class);

Route::get('pembelian/{id}/detail', [PembelianController::class, 'detail']);
Route::resource('pembelian', PembelianController::class);

Route::post('detailpembelian', [DetailPembelianController::class, 'store']);
Route::delete('detailpembelian/{id}', [DetailPembelianController::class, 'destroy']);

