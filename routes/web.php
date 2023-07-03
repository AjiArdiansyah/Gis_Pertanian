<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\WebController;
use App\Http\Controllers\PemilikLahanController;
use App\Http\Controllers\WilayahDesaController;
use App\Http\Controllers\DataLahanController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WilayahBanjirController;
use App\Http\Controllers\PrediksiLuasController;
use App\Http\Controllers\RumusController;

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

Route::get('/data_lahan/edit/{id_datalahan}', [DataLahanController::class, 'edit']);

Route::post('/data_lahan/update/{id_datalahan}', [DataLahanController::class, 'update']);

Route::get('/data_lahan/delete/{id_datalahan}', [DataLahanController::class, 'delete']);

//user
Route::get('/user', [UserController::class, 'index'])->name('user');

Route::get('/user/add', [UserController::class, 'add']);

Route::post('/user/insert', [UserController::class, 'insert']);

Route::get('/user/edit/{id}', [UserController::class, 'edit']);

Route::post('/user/update/{id}', [UserController::class, 'update']);

Route::get('/user/delete/{id}', [UserController::class, 'delete']);

//Rawan Bnjir
Route::get('/wilayah_banjir', [WilayahBanjirController::class, 'index'])->name('wilayah_banjir');

Route::get('/wilayah_banjir/add', [WilayahBanjirController::class, 'add']);

Route::post('/wilayah_banjir/insert', [WilayahBanjirController::class, 'insert']);

Route::get('/wilayah_banjir/edit/{id_rawanbanjir}', [WilayahBanjirController::class, 'edit']);

Route::post('/wilayah_banjir/update/{id_rawanbanjir}', [WilayahBanjirController::class, 'update']);

Route::get('/wilayah_banjir/delete/{id_rawanbanjir}', [WilayahBanjirController::class, 'delete']);

//Prediksi luas
Route::get('/prediksi_luas', [PrediksiLuasController::class, 'index'])->name('prediksi_luas');


//rumus
Route::get('/rumus_test', [RumusController::class, 'index'])->name('rumus');
Route::get('/utm', [RumusController::class, 'utm'])->name('utm');