<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\WebController;
use App\Http\Controllers\DataPetaniController;
use App\Http\Controllers\WilayahDesaController;

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

// Data Petani
Route::get('/data_petani', [DataPetaniController::class, 'index'])->name('data_petani');

Route::get('/data_petani/add', [DataPetaniController::class, 'add']);

Route::post('/data_petani/insert', [DataPetaniController::class, 'insert']);

Route::get('/data_petani/edit/{id_petani}', [DataPetaniController::class, 'edit']);

Route::post('/data_petani/update/{id_petani}', [DataPetaniController::class, 'update']);

Route::get('/data_petani/delete/{id_petani}', [DataPetaniController::class, 'delete']);

// wilayah desa

Route::get('/wilayah_desa', [WilayahDesaController::class, 'index'])->name('wilayah_desa');