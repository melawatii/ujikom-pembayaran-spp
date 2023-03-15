<?php

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
    return view('pages.login.index');
});


Route::resource('dataSpp', SppController::class);
Route::resource('dataKelas', KelasController::class);
Route::resource('dataSiswa', SiswaController::class);
Route::resource('dataPetugas', PetugasController::class);
Route::resource('dataPembayaran', PembayaranController::class);
Route::resource('dataTunggakan', TunggakanController::class);
