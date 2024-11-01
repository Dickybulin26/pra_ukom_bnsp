<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BarangController;

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

//* halaman utama
Route::get('/', [BarangController::class, 'index'])->name('barang.index');

//* halaman tambah data barang 
Route::get('/tambah', [BarangController::class,'create'])->name('barang.tambah');

//* menyimpan data barang yang diinput user
Route::post('/store', [BarangController::class,'store'])->name('barang.store');

//* halaman edit data barang
Route::get('/edit/{id}', [BarangController::class,'edit'])->name('barang.edit');

//* menyimpan data barang yang diedit user
Route::put('/barang/{id}', [BarangController::class, 'update'])->name('barang.update');

// * menghapus data barang yang dipilih
Route::get('/delete/{id}', [BarangController::class,'destroy'])->name('barang.delete');

// * halaman menampilkan data detail
Route::get('/detail/{id}', [BarangController::class,'showDetail'])->name('barang.detail');