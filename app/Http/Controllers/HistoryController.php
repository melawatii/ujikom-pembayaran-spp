<?php

namespace App\Http\Controllers;

use App\Models\Tunggakan;
use App\Models\Pembayaran;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

class HistoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $history = Pembayaran::where('nama', Auth::user()->username)->get();
        return view('pages.pembayaran.siswa.historySiswa', compact('history'));
    }

    public function tunggakan()
    {
        $tunggakan = Tunggakan::where('nisn', Auth::user()->username)->get();
        return view('pages.pembayaran.siswa.tunggakanSiswa', compact('tunggakan'));
    }
}
