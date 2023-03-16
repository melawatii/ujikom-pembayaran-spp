<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Spp;
use App\Models\User;
use App\Models\Siswa;
use App\Models\Tunggakan;
use App\Models\Pembayaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class PembayaranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pembayaran = Pembayaran::all();
        return view('pages.pembayaran.admin.index', compact('pembayaran'));
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
        return view('pages.pembayaran.admin.create', compact('id_tunggakan', 'nisn', 'id_petugas', 'id_spp'));
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
            'nama_bulan' => ['required'],
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

            $currentDateTime = Carbon::now();
            $user = Auth::user()->nama_petugas;

            $logs = DB::table('logs')->insert([
                'user' => $user,
                'message' => 'menambahkan Data Pembayaran',
                'created_at' => $currentDateTime,
                'updated_at' => $currentDateTime,
            ]);

            return redirect()->route('dataPembayaran.index', compact('logs'))
            ->with('message', 'Data berhasil ditambahkan!');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Pembayaran $pembayaran)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $pembayaran = Pembayaran::find($id);
        $pembayaran->delete();

        $currentDateTime = Carbon::now();
        $user = Auth::user()->nama_petugas;

        $logs = DB::table('logs')->insert([
            'user' => $user,
            'message' => 'menghapus Data Pembayaran',
            'created_at' => $currentDateTime,
            'updated_at' => $currentDateTime,
        ]);

        return redirect()->route('dataPembayaran.index', compact('logs'))
        ->with('message', 'Data berhasil dihapus!');
    }

    public function history()
    {
        $history = Pembayaran::all();
        return view('pages.pembayaran.history', compact('history'));
    }
}
