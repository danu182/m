<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\NilaiController;
use App\Http\Controllers\PaketController;
use App\Http\Controllers\PaketDetailController;
use App\Http\Controllers\PemeriksaanController;
use App\Http\Controllers\PendaftaranController;
use App\Http\Controllers\PerusahaanController;
use App\Http\Controllers\PesertaController;
use App\Http\Controllers\SubCategoryController;
use App\Models\Nilai;
use App\Models\PaketDetail;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('nilai/{id}', [NilaiController::class, 'tambah_nilai'])->name('tambah_nilai');
Route::get('nilai/list_nilai/{id}', [NilaiController::class, 'list_nilai'])->name('list_nilai');
Route::post('nilai/simpan_nilai', [NilaiController::class, 'simpan_nilai'])->name('simpan_nilai');
Route::delete('nilai/hapus_nilai/{id}', [NilaiController::class, 'hapus_nilai'])->name('hapus_nilai');


Route::resource('category',CategoryController::class);
Route::resource('subCategory',SubCategoryController::class);
Route::resource('pemeriksaan',PemeriksaanController::class);
Route::resource('peserta',PesertaController::class);
Route::resource('perusahaan',PerusahaanController::class);
// Route::resource('pemeriksaan.nilai',NilaiController::class);
Route::resource('nilai',NilaiController::class);
Route::resource('subCategory.pemeriksaan',PemeriksaanController::class);
Route::resource('subCategory.pemeriksaan.nilai',NilaiController::class);


Route::resource('pendaftaran',PendaftaranController::class);


Route::resource('paket',PaketController::class);
Route::resource('paket.paketdetail',PaketDetailController::class);





