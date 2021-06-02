<?php

use Illuminate\Support\Facades\Route;

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

use App\Http\Controllers\LantaiController;
Route::resource('lantai', LantaiController::class);
use App\Http\Controllers\kategoriController;
Route::resource('kategori', kategoriController::class);
use App\Http\Controllers\tennantController;
Route::resource('tennant', TennantController::class);
Route::get('search', [TennantController::class, 'cari']);
Route::get('/', function () {
    return view('welcome');
});


