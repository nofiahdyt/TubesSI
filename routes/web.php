<?php

use App\Http\Controllers\CetakController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Kamera\KameraController;
use App\Http\Controllers\Konfigurasi\SetupController;
use App\Http\Controllers\Perlengkapan\PerlengkapanController;
use App\Http\Controllers\MasterData\DivisiController;
use App\Http\Controllers\MasterData\KecamatanController;
use App\Http\Controllers\MasterData\KelurahanController;
use App\Http\Controllers\Rental\RentalController;

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
// Auth::routes();

// Route::get('/', 'otentikasi\OtentikasiController@index')->name('login');
Route::post('/', 'otentikasi\OtentikasiController@login')->name('login');
Route::get('/', 'otentikasi\OtentikasiController@index')->name('login');

// Route::group(['middleware' => 'CekLoginMiddleware'], function(){
Route::group(['middleware' => 'auth'], function(){
	Route::get('/dashboard', [DashboardController::class, 'index']);

	Route::resource('konfigurasi/setup', 'Konfigurasi\SetupController');
	Route::resource('kamera/kamera', 'Kamera\KameraController');
	Route::resource('perlengkapan/perlengkapan', 'Perlengkapan\PerlengkapanController');
	Route::resource('master-data/divisi', 'MasterData\DivisiController');
	Route::resource('master-data/kecamatan', 'MasterData\KecamatanController');
	Route::resource('master-data/kelurahan', 'MasterData\KelurahanController');
	Route::resource('rental/rental', 'Rental\RentalController');
	route::get('/kamera/{id}/edit',[KameraController::class,'edit']);
	route::get('/setup/{id}/edit',[SetupController::class,'edit']);
	route::get('/gambar/{id}/edit',[GambarController::class,'edit']);
	route::get('/perlengkapan/{id}/edit',[PerlengkapanController::class,'edit']);
	route::get('/divisi/{id}/edit',[DivisiController::class,'edit']);
	route::get('/kecamatan/{id}/edit',[KecamatanController::class,'edit']);
	route::get('/kelurahan/{id}/edit',[KelurahanController::class,'edit']);
	route::get('/rental/{id}/edit',[RentalController::class,'edit']);
	route::post('/kamera/{id}/update',[KameraController::class,'update']);
	route::post('/setup/{id}/update',[SetupController::class,'update']);
	route::post('/perlengkapan/{id}/update',[PerlengkapanController::class,'update']);
	route::post('/divisi/{id}/update',[DivisiController::class,'update']);
	route::post('/kecamatan/{id}/update',[KecamatanController::class,'update']);
	route::post('/kelurahan/{id}/update',[KelurahanController::class,'update']);
	route::post('/rental/{id}/update',[RentalController::class,'update']);

	// untuk cetak
	route::get('/cetakrental',[CetakController::class,'cetakrental']);

	Route::get('logout', 'otentikasi\OtentikasiController@logout')->name('logout');
});
