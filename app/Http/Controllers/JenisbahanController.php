<?php

namespace App\Http\Controllers;

use App\Models\Jenisbahan;
use Illuminate\Http\Request;

class JenisbahanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = "Jenis Bahan";
        $jenisbahan = Jenisbahan::latest()->get();
       
        return view('jenisbahan.index', compact('jenisbahan', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = "Jenis Bahan";
        return view('jenisbahan.create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'jenis_bahan' => 'required',
           
        ]);

        $jenisbahan = $request->all();
        
        Jenisbahan::create($jenisbahan);

        return redirect()->route('jenisbahan')->with('sukses', 'Jenis Bahan Berhasil di-Tambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Jenisbahan $jenisbahan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $title = "Satuan";
        $jenisbahan = Jenisbahan::findorfail($id);


        return view('jenisbahan.edit', compact('jenisbahan', 'title'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'jenis_bahan' => 'required',
            
        ]);


       
        $jenisbahan = Jenisbahan::findorfail($id);
        
        $jenisbahan->update($request->all());
        return redirect()->route('jenisbahan')->with('sukses', 'Jenis bahan berhasil di update');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Jenisbahan $jenisbahan)
    {
        //
    }
}
