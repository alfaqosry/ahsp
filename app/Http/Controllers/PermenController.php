<?php

namespace App\Http\Controllers;

use App\Models\Permen;
use App\Models\Koefisien;
use App\Models\Pekerjaan;
use Illuminate\Http\Request;
use App\Models\Jenispekerjaan;
use App\Models\Koefisienpekerja;

class PermenController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = "Permen";
        $permen = Permen::latest()->get();
       
        return view('permen.index', compact('permen', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = "Permen";
        return view('permen.create', compact('title'));
    }

    public function createJenisPekerjaan($id)
    {
        $permen = Permen::findorfail($id);
        $title = "Permen";
        return view('permen.createjenispekerjaan', compact('title','permen'));
    }

    public function storeJenisPekerjaan(Request $request, $id){
        $request->validate([
            'jenis_pekerjaan' => 'required',
           
        ]);

        $jenispekerjaan = ["jenis_pekerjaan" => $request->jenis_pekerjaan, "permen_id" => $id];
        
        Jenispekerjaan::create($jenispekerjaan);

        return redirect()->route('permen.show', $id)->with('sukses', 'Jenis pekerjaan Berhasil di-Tambahkan');

    }

    public function editJenisPekerjaan($id)  {
        
        $title = "Permen";
        $jenispekerjaan = Jenispekerjaan::findorfail($id);
        
        return view('permen.editjenispekerjaan', compact('jenispekerjaan', 'title'));
    }


    public function deleteJenisPekerjaan($id)  {
        
    }

    public function updateJenisPekerjaan(Request $request, $id)  {
        $request->validate([
            'jenis_pekerjaan' => 'required',
            
        ]);


       
        $jenispekerjaan = Jenispekerjaan::findorfail($id);
        
        $jenispekerjaan->update($request->all());
        return redirect()->route('permen.show',  $jenispekerjaan->permen_id)->with('sukses', 'Jenis pekerjaan berhasil di update');
        
    }




    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'permen' => 'required',
           
        ]);

        $permen = $request->all();
        
        Permen::create($permen);

        return redirect()->route('permen')->with('sukses', 'Permen Berhasil di-Tambahkan');
    }



    public function showJenisPekerjaan($id) {
        $title = "Permen";
        $pekerjaan = Pekerjaan::where('jenispekerjaan_id',$id)->get();
        $jenispekerjaan = Jenispekerjaan::findorfail($id);
        return view('permen.showjenispekerjaan', compact('title', 'pekerjaan', 'jenispekerjaan'));

    }



    public function createPekerjaan($id)  {
        $jenispekerjaan = Jenispekerjaan::findorfail($id);
        $title = "Permen";
        return view('permen.createpekerjaan', compact('title','jenispekerjaan'));
        
    }
    

    public function storePekerjaan(Request $request, $id) {

        $request->validate([
            'pekerjaan' => 'required',
           
        ]);

        

        $pekerjaan = ["pekerjaan" => $request->pekerjaan, "jenispekerjaan_id" => $id];
        
        Pekerjaan::create($pekerjaan);

        return redirect()->route('jenispekerjaan.show', $id)->with('sukses', 'Pekerjaan Berhasil di-Tambahkan');

    }



    public function editPekerjaan($id)  {
        
        $title = "Permen";
        $pekerjaan = Pekerjaan::findorfail($id);
        
        return view('permen.editpekerjaan', compact('pekerjaan', 'title'));
    }

    public function updatePekerjaan(Request $request, $id)  {
        
        $request->validate([
            'pekerjaan' => 'required',
            
        ]);


       
        $pekerjaan = Pekerjaan::findorfail($id);
        
        $pekerjaan->update($request->all());
        return redirect()->route('jenispekerjaan.show',  $pekerjaan->jenispekerjaan_id)->with('sukses', 'Pekerjaan berhasil di update');
        
    }


    
    public function showPekerjaan($id) {
        $title = "Permen";
        $koefisien = Koefisien::where('pekerjaan_id',$id)->get();
        $koefisienpekerja = Koefisienpekerja::where('pekerjaan_id',$id)->get();
        $pekerjaan = Pekerjaan::findorfail($id);
        return view('permen.showpekerjaan', compact('title', 'pekerjaan', 'koefisien', 'koefisienpekerja'));

    }


  
    

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $title = "Permen";
        $jenispekerjaan = Jenispekerjaan::where('permen_id',$id)->get();
        $permen = Permen::findorfail($id);
        return view('permen.show', compact('title', 'jenispekerjaan', 'permen'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $title = "Permen";
        $permen = Permen::findorfail($id);
        


        return view('permen.edit', compact('permen', 'title'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'permen' => 'required',
            
        ]);


       
        $permen = Permen::findorfail($id);
        
        $permen->update($request->all());
        return redirect()->route('permen')->with('sukses', 'Permen berhasil di update');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Permen $permen)
    {
        //
    }
}
