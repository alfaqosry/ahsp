<?php

namespace App\Http\Controllers;

use App\Models\Satuan;
use Illuminate\Http\Request;

class SatuanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = "Satuan";
        $satuan = Satuan::latest()->get();
       
        return view('satuan.index', compact('satuan', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = "Satuan";
        return view('satuan.create', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'satuan' => 'required',
           
        ]);

        $satuan = $request->all();
        
        Satuan::create($satuan);

        return redirect()->route('satuan')->with('sukses', 'Satuan Berhasil di-Tambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Satuan $satuan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $title = "Satuan";
        $satuan = Satuan::findorfail($id);


        return view('satuan.edit', compact('satuan', 'title'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'satuan' => 'required',
            
        ]);


       
        $satuan = Satuan::findorfail($id);
        
        $satuan->update($request->all());
        return redirect()->route('satuan')->with('sukses', 'Satuan berhasil di update');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Satuan $satuan)
    {
        //
    }
}
