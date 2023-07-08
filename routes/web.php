<?php

use App\Http\Controllers\MobilController;
use App\Http\Controllers\PemesananController;
use App\Http\Controllers\PengembalianController;
use App\Http\Controllers\PenggunaController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::middleware('auth')->get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource("/pengguna", PenggunaController::class);
Route::resource("/mobil", MobilController::class);
Route::resource("/pemesanan", PemesananController::class);
Route::resource("/pengembalian", PengembalianController::class);