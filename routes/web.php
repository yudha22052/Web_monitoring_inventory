<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StokController; // Tambahkan ini

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Route untuk Gudang Surabaya
Route::get('/stok/surabaya', [StokController::class, 'lihatStokSurabaya']);

// Route untuk Pemantauan Stok Pusat (Semua Gudang)
Route::get('/stok/pusat', [StokController::class, 'lihatStokPusat']);

// Route default (sesuaikan jika perlu)
Route::get('/', function () {
    return view('welcome');
});