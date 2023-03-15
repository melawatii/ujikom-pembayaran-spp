<?php

namespace App\Http\Controllers;

use App\Models\Spp;
use App\Models\User;
use App\Models\Siswa;
use App\Models\Tunggakan;
use App\Models\Pembayaran;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EntryPembayaranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pembayaran = Pembayaran::all();
        return view('pages.pembayaran.petugas.index', compact('pembayaran'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $nisn = Siswa::all();
        $id_petugas = User::all();
        $id_tunggakan = Tunggakan::all();
        $id_spp = Spp::all();
        return view('pages.pembayaran.petugas.create', compact('id_tunggakan', 'nisn', 'id_petugas', 'id_spp'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = [
            'id_petugas' => ['required', 'string'],
            'id_spp' => ['required'],
            'nama' => ['required'],
            'tunggakan' => ['required'],
            'bulan_dibayar' => ['required', 'numeric'],
            'jumlah_bayar' => ['required']
        ];

        if ($request->tunggakan) {
            $tunggakan = Tunggakan::find($request->tunggakan);
            array_push($rules['bulan_dibayar'], 'max:' . $tunggakan->sisa_bulan);
            array_push($rules['jumlah_bayar'], 'max:' . $tunggakan->sisa_tunggakan);
        }

        $validatedData = $request->validate($rules);

        if ($request->tunggakan) {
            $tunggakan = Tunggakan::find($request->tunggakan);
            $tunggakan->sisa_bulan -= $request->bulan_dibayar;
            $tunggakan->sisa_tunggakan -= $request->jumlah_bayar;
            $tunggakan->save();

            $validatedData['sisa_bayar'] = $tunggakan->sisa_tunggakan - $request->jumlah_bayar;
            $validatedData['nisn'] = $request->tunggakan;
            unset($validatedData['tunggakan']);

            Pembayaran::create($validatedData);

            return redirect()->route('entryPembayaran.index')
            ->with('message', 'Data berhasil ditambahkan!');
        }
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'id_petugas' =>'required',
            'nisn' =>'required',
            'nama' =>'required',
            'id_spp' =>'required',
            'bulan_tunggakan' =>'required|max:255',
            'total_tunggakan' =>'required|max:255',
        ]);

        $tunggakan = Tunggakan::find($id);
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

        return redirect()->route('entryPembayaran.index')
        ->with('message', 'Data berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $pembayaran = Pembayaran::find($id);
        $pembayaran->delete();

        return redirect()->route('entryPembayaran.index')
        ->with('message', 'Data berhasil dihapus!');
    }

    public function history()
    {
        $history = Pembayaran::all();
        return view('pages.pembayaran.history', compact('history'));
    }
}
