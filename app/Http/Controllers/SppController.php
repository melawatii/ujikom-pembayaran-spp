<?php

namespace App\Http\Controllers;

use App\Models\Spp;
use Illuminate\Http\Request;

class SppController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $spp = Spp::all();
        return view('pages.spp.index', compact('spp'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.spp.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'tahun' =>'required|max:255',
            'nominal' =>'required|max:255',
        ]);

        $spp = new Spp;
        $spp->tahun = $request->tahun;
        $spp->nominal = $request->nominal;
        $spp->save();

        return redirect()->route('dataSpp.index')
        ->with('message', 'Data berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Spp $spp)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $spp = Spp::find($id);
        return view('pages.spp.edit', compact('spp'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'tahun' =>'required|max:255',
            'nominal' =>'required|max:255',
        ]);

        $spp = Spp::find($id);
        $spp->tahun = $request->tahun;
        $spp->nominal = $request->nominal;
        $spp->save();

        return redirect()->route('dataSpp.index')
        ->with('message', 'Data berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $spp = Spp::find($id);
        $spp->delete();

        return redirect()->route('dataSpp.index')
        ->with('message', 'Data berhasil dihapus!');
    }
}
