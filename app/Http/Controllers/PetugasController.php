<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PetugasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $petugas = User::all();
        return view('pages.petugas.index', compact('petugas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.petugas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'username' =>'required|max:255',
            'password' =>'required|max:255',
            'nama_petugas' =>'required|max:255',
            'level' =>'required',
        ]);

        $petugas = new User;
        $petugas->username = $request->username;
        $petugas->password = Hash::make($request->password);
        $petugas->nama_petugas = $request->nama_petugas;
        $petugas->level = $request->level;
        $petugas->save();

        return redirect()->route('dataPetugas.index')
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
    public function edit($id)
    {
        $petugas = User::find($id);
        return view('pages.petugas.edit', compact('petugas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'username' =>'required|max:255',
            'password' =>'required|max:255',
            'nama_petugas' =>'required|max:255',
            'level' =>'required',
        ]);

        $petugas = User::find($id);
        $petugas->username = $request->username;
        $petugas->password = Hash::make($request->password);
        $petugas->nama_petugas = $request->nama_petugas;
        $petugas->level = $request->level;
        $petugas->save();

        return redirect()->route('dataPetugas.index')
        ->with('message', 'Data berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $petugas = User::find($id);
        $petugas->delete();

        return redirect()->route('dataPetugas.index')
        ->with('message', 'Data berhasil dihapus!');
    }
}
