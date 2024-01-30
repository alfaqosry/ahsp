<?php

namespace App\Http\Controllers;

use App\Models\Satuan;
use Illuminate\Http\Request;
use App\Models\Daftarpekerja;

class DaftarpekerjaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = "Pekerja";
        $pekerja = Daftarpekerja::latest()->get();

        return view('pekerja.index', compact('pekerja', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = "Pekerja";
        // $bahan = Daftarbahan::all();
        $satuan = Satuan::all();
        // $jenisbahan = Jenisbahan::all();

        return view('pekerja.create', compact('title', 'satuan'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'pekerja' => 'required',
            'satuan_id' => 'required',
        ]);

        $pekerja = $request->all();
        
        Daftarpekerja::create($pekerja);

        return redirect()->route('pekerja')->with('sukses', 'Pekerja berhasil di tambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Daftarpekerja $daftarpekerja)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
     // $golongan = Golongan::all();
     $title = "Pekerja";
     $satuan = Satuan::all();
     $pekerja = Daftarpekerja::findorfail($id);


     return view('pekerja.edit', compact('pekerja', 'satuan', 'title'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'pekerja' => 'required',
            'satuan_id' => 'required',
        ]);


       
        $pekerja = Daftarpekerja::findorfail($id);
        
        $pekerja->update($request->all());
        

        return redirect()->route('pekerja')->with('sukses', 'Pekerja berhasil di update');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Daftarpekerja $daftarpekerja)
    {
        //
    }
}
