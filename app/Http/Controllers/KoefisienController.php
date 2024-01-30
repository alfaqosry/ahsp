<?php

namespace App\Http\Controllers;

use App\Models\Koefisien;
use App\Models\Pekerjaan;
use App\Models\Daftarbahan;
use Illuminate\Http\Request;

class KoefisienController extends Controller
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
        $bahan = Daftarbahan::all();
        $title = "Permen";
        return view('permen.createkoefisien', compact('title','pekerjaan', 'bahan'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $id)
    {
        $request->validate([
            'koefisien' => 'required',
            'bahan_id' => 'required',
           
        ]);

        

        $koefisien = ["koefisien" => $request->koefisien,"bahan_id" => $request->bahan_id, "pekerjaan_id" => $id];
        
        Koefisien::create($koefisien);

        return redirect()->route('pekerjaan.show', $id)->with('sukses', 'Koefisien Berhasil di-Tambahkan');

    }

    /**
     * Display the specified resource.
     */
    public function show(Koefisien $koefisien)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $title ="Permen";
        $koefisien = Koefisien::findorfail($id);
        $bahan = Daftarbahan::all();

        return view('permen.editkoefisien', compact('koefisien', 'title', 'bahan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'koefisien' => 'required',
            'bahan_id' => 'required',
            
        ]);


       
        $koefisien = Koefisien::findorfail($id);
        
        $koefisien->update($request->all());
        return redirect()->route('pekerjaan.show',  $koefisien->pekerjaan_id)->with('sukses', 'Koefisien berhasil di update');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Koefisien $koefisien)
    {
        //
    }
}
