<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PaketController;
use App\Http\Controllers\PaketDetailController;
use App\Http\Controllers\PemeriksaanController;
use App\Http\Controllers\SubCategoryController;
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



Route::resource('category',CategoryController::class);
Route::resource('subCategory',SubCategoryController::class);
Route::resource('pemeriksaan',PemeriksaanController::class);
Route::resource('subCategory.pemeriksaan',PemeriksaanController::class);


Route::resource('paket',PaketController::class);
Route::resource('paket.paketdetail',PaketDetailController::class);





