<?php

namespace App\Http\Controllers;

use App\Models\Spp;
use App\Models\Kelas;
use App\Models\Siswa;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $siswa = Siswa::all();
        return view('pages.siswa.index', compact('siswa'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $id_kelas = Kelas::all();
        $id_spp = Spp::all();
        return view('pages.siswa.create')->with('id_kelas', $id_kelas)->with('id_spp', $id_spp);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nisn' =>'required|max:255',
            'nis' =>'required|max:255',
            'nama' =>'required|max:255',
            'id_kelas' =>'required',
            'alamat' =>'required|max:255',
            'no_telp' =>'required|max:255',
            'id_spp' =>'required',
        ]);

        $siswa = new Siswa;
        $siswa->nisn = $request->nisn;
        $siswa->nis = $request->nis;
        $siswa->nama = $request->nama;
        $siswa->id_kelas = $request->id_kelas;
        $siswa->alamat = $request->alamat;
        $siswa->no_telp = $request->no_telp;
        $siswa->id_spp = $request->id_spp;
        $siswa->save();

        return redirect()->route('dataSiswa.index')
        ->with('message', 'Data berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Siswa $siswa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $id_kelas = Kelas::all();
        $id_spp = Spp::all();
        $siswa = Siswa::find($id);
        return view('pages.siswa.edit', compact('siswa', 'id_kelas', 'id_spp'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nisn' =>'required|max:255',
            'nis' =>'required|max:255',
            'nama' =>'required|max:255',
            'id_kelas' =>'required',
            'alamat' =>'required|max:255',
            'no_telp' =>'required|max:255',
            'id_spp' =>'required',
        ]);

        $siswa = Siswa::find($id);
        $siswa->nisn = $request->nisn;
        $siswa->nis = $request->nis;
        $siswa->nama = $request->nama;
        $siswa->id_kelas = $request->id_kelas;
        $siswa->alamat = $request->alamat;
        $siswa->no_telp = $request->no_telp;
        $siswa->id_spp = $request->id_spp;
        $siswa->save();

        return redirect()->route('dataSiswa.index')
        ->with('message', 'Data berhasil ditambahkan!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $siswa = Siswa::find($id);
        $siswa->delete();

        return redirect()->route('dataSiswa.index')
        ->with('message', 'Data berhasil dihapus!');
    }
}
