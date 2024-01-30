<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Kontraktor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KontraktorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = "Daftar Kontraktor";
        $kontraktor = Kontraktor::where('user_id', auth()->user()->id)->first();

        if ($kontraktor == null) {
            return view('kontraktor.create', compact('kontraktor', 'title'));
        }else{
            return view('kontraktor.index', compact('kontraktor', 'title'));
        }
       
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_direktur' => 'required',
            'nama_cv' => 'required',
            'nik' => 'required',
            'npwp' => 'required',
            'no_akta_perusahaan' => 'required',
           
        ]);

      

        $kontraktor = Kontraktor::create([
            'nama_direktur' => $request->nama_direktur,
            'nama_cv' => $request->nama_cv,
            'nik' => $request->nik,
            'npwp' => $request->npwp,
            'no_akta_perusahaan' => $request->no_akta_perusahaan,
            'status' => 'permintaan',
            'user_id' => auth()->user()->id
           
        ]);

      

        return redirect()->route('kontraktor')->with('sukses', 'Kontraktor Berhasil di daftarkan');
    }


    public function acckontraktor() {
        $title = "Persetujuan Kontraktor";
        $kontraktor = Kontraktor::where('status', 'permintaan')->get();
        return view('kontraktor.acc', compact('kontraktor', 'title'));
        
    }

    public function acc($id)  {
        $title = "Persetujuan Kontraktor";
        DB::table('kontraktors')
        ->where('id', $id)
        ->update(['status' => "disetujui"]);
        $kotraktor = Kontraktor::findorfail($id);
        $user = User::where('id', $kotraktor->user_id)->first();
        DB::table('users')
        ->where('id', $user->id)
        // kode 41 diterima
        ->update(['is_active' => 41]);
        return redirect()->route('kontraktor.acckontraktor')->with('sukses', 'Kontraktor berhasil di setujui');
    }

    public function tolak($id) {
        $title = "Persetujuan Kontraktor";
        DB::table('kontraktors')
        ->where('id', $id)
        ->update(['status' => "ditolak"]);
        $kontraktor = Kontraktor::findorfail($id);
        $user = User::where('id', $kontraktor->user_id)->first();
        DB::table('users')
        ->where('id', $user->id)
        // kode 40 ditolak
        ->update(['is_active' => 40]);
        return redirect()->route('kontraktor.acckontraktor')->with('sukses', 'Kontraktor berhasil di tolak');
        
    }
    /**
     * Display the specified resource.
     */
    public function show(Kontraktor $kontraktor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Kontraktor $kontraktor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Kontraktor $kontraktor)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kontraktor $kontraktor)
    {
        //
    }
}
