<?php

namespace App\Http\Controllers;

use App\Models\Tugas;
use App\Models\Jenisbahan;
use App\Models\Daftarbahan;
use App\Models\Hargabahans;
use App\Models\Upahpekerja;
use Illuminate\Http\Request;
use App\Models\Daftarpekerja;

class HargabahansController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id)
    {
        //
        $title = "Tugas";
        $tugas = Tugas::findorfail($id);
        $bahan = Daftarbahan::all();
        $jenisbahan = Jenisbahan::all();
        $hargabahan = Hargabahans::where('tugas_id',$id)->get();
        $pekerja = Daftarpekerja::all();
        $upahpekerja = Upahpekerja::where('tugas_id',$id)->get();
      

        return view('hargabahan.index', compact('tugas', 'bahan', 'hargabahan','title', 'jenisbahan', 'upahpekerja', 'pekerja'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($bahan_id, $tugas_id)
    {

        $title = "Tugas";
        $tugas = $tugas_id;
        $bahan = Daftarbahan::findorfail($bahan_id);
        return view('hargabahan.create', compact('title', 'bahan', 'tugas', ));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $bahan_id, $tugas_id)
    {
        $request->validate([
            'harga' => 'required',
           
        ]);

       $hargabahan = ["harga" => $request->harga, "bahan_id" => $bahan_id, "tugas_id" => $tugas_id];
        
        
        
        Hargabahans::create($hargabahan);

        return redirect()->route('hargabahan.index', $tugas_id)->with('sukses', 'Harga bahan Berhasil di-Tambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Hargabahans $hargabahans)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($bahan_id,$tugas_id)
    {
        $title = "Tugas";
        $harga = Hargabahans::findorfail($bahan_id);
        $bahan = Daftarbahan::where('id', $harga->bahan_id)->first();
        $tugas_id = $tugas_id;


        return view('hargabahan.edit', compact('harga', 'title', 'bahan', 'tugas_id'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'harga' => 'required',
            
        ]);


       
        $harga = Hargabahans::findorfail($id);
        
        $harga->update($request->all());
        return redirect()->route('hargabahan.index', $harga->tugas_id)->with('sukses', 'Satuan berhasil di update');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Hargabahans $hargabahans)
    {
        //
    }
}
