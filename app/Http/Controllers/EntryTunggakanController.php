<?php

namespace App\Http\Controllers;

use App\Models\Spp;
use App\Models\User;
use App\Models\Siswa;
use App\Models\Tunggakan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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

        return redirect()->route('entryTunggakan.index')
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

        return redirect()->route('entryTunggakan.index')
        ->with('message', 'Data berhasil dihapus!');
    }
}