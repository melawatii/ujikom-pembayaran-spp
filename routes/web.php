<?php

use Dompdf\Dompdf;
use App\Models\Pembayaran;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SppController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\PetugasController;
use App\Http\Controllers\TunggakanController;
use App\Http\Controllers\PembayaranController;
use App\Http\Controllers\EntryTunggakanController;
use App\Http\Controllers\EntryPembayaranController;

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

Route::get('/', [LoginController::class, 'index']);
Route::post('/', [LoginController::class, 'authanticate']);
Route::get('/logout', [LoginController::class, 'logout']);

Route::middleware('login')->group(function () {

    Route::get('/dashboard', function () {
        return view('pages.layout.dashboard');
    });

    // admin
    Route::resource('dataSpp', SppController::class)->middleware(('admin'));
    Route::resource('dataKelas', KelasController::class)->middleware(('admin'));
    Route::resource('dataSiswa', SiswaController::class)->middleware(('admin'));
    Route::resource('dataPetugas', PetugasController::class)->middleware(('admin'));
    Route::resource('dataPembayaran', PembayaranController::class)->middleware(('admin'));
    Route::resource('dataTunggakan', TunggakanController::class)->middleware(('admin'));
    Route::get('/dataHistory', [PembayaranController::class, 'history'])->middleware(('admin'));

    Route::get('/generateLaporan', function () {
        $history = Pembayaran::all();
        $dompdf = new Dompdf();
        $html = view('pages.pembayaran.admin.pdf', compact('history'))->render();
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();
        return $dompdf->stream('Laporan Pembayaran.pdf');
    })->middleware('admin');

    // petugas
    Route::resource('entryPembayaran', EntryPembayaranController::class)->middleware(('petugas'));
    Route::resource('entryTunggakan', EntryTunggakanController::class)->middleware(('petugas'));
    Route::get('/entryHistory', [EntryPembayaranController::class, 'history'])->middleware(('petugas'));

    // siswa
    Route::get('/historySiswa', [HistoryController::class, 'index'])->middleware(('siswa'));

});
