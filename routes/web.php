<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\WebController;
use App\Http\Controllers\PemilikLahanController;
use App\Http\Controllers\WilayahDesaController;
use App\Http\Controllers\DataLahanController;

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

Route::get('/', [WebController::class, 'index']);

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

// Data Pemilik lahan
Route::get('/pemilik_lahan', [PemilikLahanController::class, 'index'])->name('pemilik_lahan');

Route::get('/pemilik_lahan/add', [PemilikLahanController::class, 'add']);

Route::post('/pemilik_lahan/insert', [PemilikLahanController::class, 'insert']);

Route::get('/pemilik_lahan/edit/{id_pemiliklahan}', [PemilikLahanController::class, 'edit']);

Route::post('/pemilik_lahan/update/{id_pemiliklahan}', [PemilikLahanController::class, 'update']);

Route::get('/pemilik_lahan/delete/{id_pemiliklahan}', [PemilikLahanController::class, 'delete']);

// wilayah desa

Route::get('/wilayah_desa', [WilayahDesaController::class, 'index'])->name('wilayah_desa');

Route::get('/wilayah_desa/add', [WilayahDesaController::class, 'add']);

Route::post('/wilayah_desa/insert', [WilayahDesaController::class, 'insert']);

Route::get('/wilayah_desa/edit/{id_wilayahdesa}', [WilayahDesaController::class, 'edit']);

Route::post('/wilayah_desa/update/{id_wilayahdesa}', [WilayahDesaController::class, 'update']);

Route::get('/wilayah_desa/delete/{id_wilayahdesa}', [WilayahDesaController::class, 'delete']);

//Data Lahan
Route::get('/data_lahan', [DataLahanController::class, 'index'])->name('data_lahan');

Route::get('/data_lahan/add', [DataLahanController::class, 'add']);

Route::post('/data_lahan/insert', [DataLahanController::class, 'insert']);

Route::get('/data_lahan/edit/{id_wilayahdesa}', [DataLahanController::class, 'edit']);

Route::post('/data_lahan/update/{id_wilayahdesa}', [DataLahanController::class, 'update']);

Route::get('/data_lahan/delete/{id_wilayahdesa}', [DataLahanController::class, 'delete']);