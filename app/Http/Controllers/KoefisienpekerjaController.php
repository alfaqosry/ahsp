<?php

namespace App\Http\Controllers;

use App\Models\Pekerjaan;
use Illuminate\Http\Request;
use App\Models\Daftarpekerja;
use App\Models\Koefisienpekerja;

class KoefisienpekerjaController extends Controller
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
    public function create($id)
    {
        $pekerjaan = Pekerjaan::findorfail($id);
        $pekerja = Daftarpekerja::all();
        $title = "Permen";
        return view('koefisienpekerja.create', compact('title','pekerjaan', 'pekerja'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request , $id)
    {
        $request->validate([
            'koefisien' => 'required',
            'pekerja_id' => 'required',
           
        ]);

        

        $koefisien = ["koefisien" => $request->koefisien,"pekerja_id" => $request->pekerja_id, "pekerjaan_id" => $id];
        
        Koefisienpekerja::create($koefisien);

        return redirect()->route('pekerjaan.show', $id)->with('sukses', 'Koefisien Berhasil di-Tambahkan');

    }

    /**
     * Display the specified resource.
     */
    public function show(Koefisienpekerja $koefisienpekerja)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $title ="Permen";
        $koefisienpekerja = Koefisienpekerja::findorfail($id);
        $pekerja = Daftarpekerja::all();

        return view('koefisienpekerja.edit', compact('koefisienpekerja', 'title', 'pekerja'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'koefisien' => 'required',
            'pekerja_id' => 'required',
            
        ]);


       
        $koefisien = Koefisienpekerja::findorfail($id);
        
        $koefisien->update($request->all());
        return redirect()->route('pekerjaan.show',  $koefisien->pekerjaan_id)->with('sukses', 'Koefisien berhasil di update');
    
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Koefisienpekerja $koefisienpekerja)
    {
        //
    }
}
