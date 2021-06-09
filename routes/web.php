<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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
use App\Http\Controllers\PenyewaController;
Route::resource('penyewa', PenyewaController::class);
use App\Http\Controllers\AkunController;
Route::resource('akun', AkunController::class);
use App\Http\Controllers\AdvertiseController;
Route::resource('advertise', AdvertiseController::class);

use App\Http\Controllers\KeluhanController;
Route::resource('keluhan', KeluhanController::class);
use App\Http\Controllers\Sewa_AdvertiseController;
Route::resource('sewa_advertise', Sewa_AdvertiseController::class);
Route::get('sewa_advertise/create/{id}', [TennantController::class, 'sewa_advertise/create']);

use App\Http\Controllers\SewaController;
Route::resource('sewa', SewaController::class);
Route::get('search', [TennantController::class, 'cari']);
Route::get('keluhan', [PenyewaController::class, 'keluhan']);
Route::get('/changestatussewa', [SewaController::class, 'changestatus']);
Route::get('/', [TennantController::class, 'cari']);
// Route::get('/', function () {
//     return Inertia::render('Welcome', [
//         'canLogin' => Route::has('login'),
//         'canRegister' => Route::has('register'),
//         'laravelVersion' => Application::VERSION,
//         'phpVersion' => PHP_VERSION,
//     ]);
// });

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->name('dashboard');
