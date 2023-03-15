<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SppController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\PetugasController;
use App\Http\Controllers\TunggakanController;
use App\Http\Controllers\PembayaranController;

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
    return view('pages.login.index');
});

Route::get('/dashboard', function () {
    return view('pages.layout.dashboard');
});

Route::get('/', [LoginController::class, 'index']);
Route::post('/', [LoginController::class, 'authanticate']);
Route::get('/logout', [LoginController::class, 'logout']);

Route::resource('dataSpp', SppController::class);
Route::resource('dataKelas', KelasController::class);
Route::resource('dataSiswa', SiswaController::class);
Route::resource('dataPetugas', PetugasController::class);
Route::resource('dataPembayaran', PembayaranController::class);
Route::resource('dataTunggakan', TunggakanController::class);
