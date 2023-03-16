<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Kelas;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class KelasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kelas = Kelas::all();
        return view('pages.kelas.index', compact('kelas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.kelas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_kelas' =>'required|max:255',
            'kompetensi_keahlian' =>'required|max:255',
        ]);

        $kelas = new Kelas;
        $kelas->nama_kelas = $request->nama_kelas;
        $kelas->kompetensi_keahlian = $request->kompetensi_keahlian;
        $kelas->save();

        $currentDateTime = Carbon::now();
        $user = Auth::user()->nama_petugas;

        $logs = DB::table('logs')->insert([
            'user' => $user,
            'message' => 'menambahkan Data Kelas',
            'created_at' => $currentDateTime,
            'updated_at' => $currentDateTime,
        ]);

        return redirect()->route('dataKelas.index', compact('logs'))
        ->with('message', 'Data berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Kelas $kelas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $kelas = Kelas::find($id);
        return view('pages.kelas.edit', compact('kelas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_kelas' =>'required|max:255',
            'kompetensi_keahlian' =>'required|max:255',
        ]);

        $kelas = Kelas::find($id);
        $kelas->nama_kelas = $request->nama_kelas;
        $kelas->kompetensi_keahlian = $request->kompetensi_keahlian;
        $kelas->save();

        $currentDateTime = Carbon::now();
        $user = Auth::user()->nama_petugas;

        $logs = DB::table('logs')->insert([
            'user' => $user,
            'message' => 'mengubah Data Kelas',
            'created_at' => $currentDateTime,
            'updated_at' => $currentDateTime,
        ]);

        return redirect()->route('dataKelas.index', compact('logs'))
        ->with('message', 'Data berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $kelas = Kelas::find($id);
        $kelas->delete();

        $currentDateTime = Carbon::now();
        $user = Auth::user()->nama_petugas;

        $logs = DB::table('logs')->insert([
            'user' => $user,
            'message' => 'menghapus Data Kelas',
            'created_at' => $currentDateTime,
            'updated_at' => $currentDateTime,
        ]);

        return redirect()->route('dataKelas.index', compact('logs'))
        ->with('message', 'Data berhasil dihapus!');
    }
}
