<?php

namespace App\Http\Controllers;

use App\Models\Satuan;
use App\Models\Jenisbahan;
use App\Models\Daftarbahan;
use Illuminate\Http\Request;

class DaftarbahanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $title = "Bahan";
        $bahan = Daftarbahan::latest()->get();
        $jenisbahan = Jenisbahan::latest()->get();

        return view('bahan.index', compact('bahan', 'title','jenisbahan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = "Tambah bahan";
        $bahan = Daftarbahan::all();
        $satuan = Satuan::all();
        $jenisbahan = Jenisbahan::all();

        return view('bahan.create', compact('bahan','satuan', 'title', 'jenisbahan'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'bahan' => 'required',
            'satuan_id' => 'required',
            'jenis_bahan_id' => 'required',
            // 'harga_barang' => 'required|min:3|max:50',
            // 'foto' => 'required',
            // 'jumlah' => 'required'
        ]);

        $bahan = $request->all();
        
        Daftarbahan::create($bahan);

        return redirect()->route('bahan')->with('sukses', 'Bahan Berhasil di-Tambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Daftarbahan $daftarbahan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        // $golongan = Golongan::all();
        $title = "Bahan";
        $satuan = Satuan::all();
        $jenisbahan = Jenisbahan::all();
        $bahan = Daftarbahan::findorfail($id);


        return view('bahan.edit', compact('bahan','jenisbahan', 'satuan', 'title'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'bahan' => 'required',
            'satuan_id' => 'required',
            'jenis_bahan_id' => 'required',
        ]);


       
        $bahan = Daftarbahan::findorfail($id);
        
        $bahan->update($request->all());
        

        return redirect()->route('bahan')->with('sukses', 'Bahan berhasil di update');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Daftarbahan $daftarbahan)
    {
        //
    }
}
