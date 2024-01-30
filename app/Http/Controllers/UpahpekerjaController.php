<?php

namespace App\Http\Controllers;

use App\Models\Upahpekerja;
use Illuminate\Http\Request;

class UpahpekerjaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($pekerja_id, $tugas_id)
    {
        $title = "Tugas";
        $bahan = $pekerja_id;
        $tugas = $tugas_id;
        return view('upahpekerja.create', compact('title', 'bahan', 'tugas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $pekerja_id, $tugas_id)
    {
        
        $request->validate([
            'upah' => 'required',
           
        ]);

       $upahpekerja = ["upah" => $request->upah, "pekerja_id" => $pekerja_id, "tugas_id" => $tugas_id];
        
        
        
        Upahpekerja::create($upahpekerja);

        return redirect()->route('hargabahan.index', $tugas_id)->with('sukses', 'Upah pekerja Berhasil di tambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Upahpekerja $upahpekerja)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Upahpekerja $upahpekerja)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Upahpekerja $upahpekerja)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Upahpekerja $upahpekerja)
    {
        //
    }
}
