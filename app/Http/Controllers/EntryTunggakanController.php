<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Spp;
use App\Models\User;
use App\Models\Siswa;
use App\Models\Tunggakan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class EntryTunggakanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tunggakan = Tunggakan::all();
        return view('pages.tunggakan.petugas.index', compact('tunggakan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $id_petugas = User::all();
        $nisn = Siswa::all();
        $id_spp = Spp::all();
        return view('pages.tunggakan.petugas.create', compact('id_petugas', 'nisn', 'id_spp'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $tunggakan = new Tunggakan;
        $tunggakan->id_petugas = $request->id_petugas;
        $tunggakan->nisn = $request->nisn;
        $tunggakan->nama = $request->nama;
        $tunggakan->id_spp = $request->id_spp;
        $tunggakan->bulan_tunggakan = $request->bulan_tunggakan;

        $tunggakan->total_tunggakan = $tunggakan->id_spp * $tunggakan->bulan_tunggakan;
        $request->total_tunggakan = $tunggakan->total_tunggakan;

        $tunggakan->sisa_bulan = $request->bulan_tunggakan;
        $tunggakan->sisa_tunggakan = $request->total_tunggakan;

        $tunggakan->save();

        $currentDateTime = Carbon::now();
        $user = Auth::user()->nama_petugas;

        $logs = DB::table('logs')->insert([
            'user' => $user,
            'message' => 'menambahkan Data Tunggakan',
            'created_at' => $currentDateTime,
            'updated_at' => $currentDateTime,
        ]);

        return redirect()->route('entryTunggakan.index', compact('logs'))
        ->with('message', 'Data berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $tunggakan = Tunggakan::find($id);
        $id_petugas = User::all();
        $nisn = Siswa::all();
        $id_spp = Spp::all();
        return view('pages.tunggakan.petugas.edit', compact('tunggakan', 'id_petugas', 'nisn', 'id_spp'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $tunggakan = Tunggakan::find($id);
        $tunggakan->delete();

        $currentDateTime = Carbon::now();
        $user = Auth::user()->nama_petugas;

        $logs = DB::table('logs')->insert([
            'user' => $user,
            'message' => 'menghapus Data Pembayaran',
            'created_at' => $currentDateTime,
            'updated_at' => $currentDateTime,
        ]);

        return redirect()->route('entryTunggakan.index', compact('logs'))
        ->with('message', 'Data berhasil dihapus!');
    }
}
