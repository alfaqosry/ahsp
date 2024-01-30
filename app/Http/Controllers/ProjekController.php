<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Tugas;
use App\Models\Permen;
use App\Models\Projek;
use App\Models\Satuan;
use App\Models\Koefisien;
use App\Models\Pekerjaan;
use App\Models\Jenisbahan;
use App\Models\Daftarbahan;
use App\Models\Hargabahans;
use App\Models\Upahpekerja;
use Illuminate\Http\Request;
use App\Models\Daftarpekerja;
use App\Models\Jenispekerjaan;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Koefisienpekerja;
use Illuminate\Support\Facades\DB;

class ProjekController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = "Projek";
        $projek = Projek::latest()->get();
       
        return view('projek.index', compact('projek', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = User::all();
        $permen = Permen::all();
        $title = "Projek";
        return view('projek.create', compact('title', 'user', 'permen'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'projek' => 'required',
            'tahun' => 'required',
            'surveyor1' => 'required',
            'surveyor2' => 'required',
            'surveyor3' => 'required',
            // 'permen_id' => 'required',
           
        ]);

        $projekdata = ['projek' => $request->projek,'tahun' => $request->tahun, 'permen_id' => $request->permen_id, 'status' => 'proses' ,'permen_id' => 1];


        $satuan = $request->all();
        
       $projek = Projek::create($projekdata);

       $tugasdata1 = [
        'surveyor_id' => $request->surveyor1,
        'projek_id' => $projek->id,];
        $tugas = Tugas::create($tugasdata1);

        $tugasdata2 = [
        'surveyor_id' => $request->surveyor2,
        'projek_id' => $projek->id,];
        $tugas = Tugas::create($tugasdata2);

        $tugasdata3 = [
        'surveyor_id' => $request->surveyor3,
        'projek_id' => $projek->id,];
        $tugas = Tugas::create($tugasdata3);
        return redirect()->route('projek')->with('sukses', 'projek Berhasil di-Tambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $title = "Projek";
        $projek  = Projek::findorfail($id);
        $bahan = Daftarbahan::all();
        $jenisbahan = Jenisbahan::all();
        $jenis = Jenisbahan::all();
        $harga = Hargabahans::join('tugas', 'hargabahans.tugas_id', 'tugas.id')->selectRaw('avg(harga) as sum, bahan_id')->where('tugas.projek_id', $id)->groupBy('bahan_id')->get();
        $koefisienharga = Koefisien::join('daftarbahans', 'koefisiens.bahan_id', '=', 'daftarbahans.id' )->get();
        $hargaall = Hargabahans::join('tugas', 'hargabahans.tugas_id', 'tugas.id')->selectRaw('avg(harga) as sum, bahan_id,tugas_id, tugas.projek_id, tugas.surveyor_id')->where('projek_id',$id)->groupBy('bahan_id')->get();
        $permen = Permen::where('id',$projek->permen_id)->first();
        $jenispekerjaan = Jenispekerjaan::where('permen_id',$permen->id)->get();
        $tugas = Tugas::join('users', 'tugas.surveyor_id', '=', 'users.id')->join('hargabahans', 'tugas.id', '=', 'hargabahans.tugas_id')->where('projek_id', $id)->get();
    
        $surveyor = Tugas::join('users', 'tugas.surveyor_id', '=', 'users.id')->where('projek_id', $id)->get();
        $pekerjaan = Pekerjaan::all();
        // $koefisien = Koefisien::all();
        $satuan = Satuan::all();

        $pekerja = Daftarpekerja::all();
        $upah = Upahpekerja::join('tugas', 'upahpekerjas.tugas_id', 'tugas.id')->selectRaw('avg(upah) as sum, pekerja_id')->where('tugas.projek_id', $id)->groupBy('pekerja_id')->get();
        $upahall = Upahpekerja::join('tugas', 'upahpekerjas.tugas_id', 'tugas.id')->selectRaw('avg(upah) as sum, pekerja_id,tugas_id, tugas.projek_id, tugas.surveyor_id')->where('projek_id',$id)->groupBy('pekerja_id')->get();
        $koefisienpekerja = Koefisienpekerja::join('daftarpekerjas', 'koefisienpekerjas.pekerja_id', '=', 'daftarpekerjas.id' )->get();
        
        
        return view('projek.show', compact('tugas','surveyor','upahall','pekerja','upah','koefisienpekerja','bahan','jenis', 'title', 'harga','projek', 'permen','jenispekerjaan', 'pekerjaan', 'jenisbahan', 'hargaall', 'satuan', 'koefisienharga'));
    }


    public function listahsp()  {

        
        $title = "Persetujuan AHSP";

        $projek = Projek::where('status', 'permintaan')->get();

        return view('projek.listpermintaan', compact('projek','title'));
    }

    public function acc($id)  {
        $title = "Persetujuan AHSP";
        DB::table('projeks')
        ->where('id', $id)
        ->update(['status' => "dipublis"]);
        
        return redirect()->route('kabid.listahsp')->with('sukses', 'AHSP berhasil di publis');
    }

    public function tolak($id) {
        $title = "Persetujuan AHSP";
        DB::table('projeks')
        ->where('id', $id)
        ->update(['status' => "ditolak"]);
        return redirect()->route('kabid.listahsp')->with('sukses', 'AHSP berhasil di tolak');
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $title = "Satuan";
        $projek = Projek::findorfail($id);
        $permen = Permen::all();


        return view('projek.edit', compact('projek','permen', 'title'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'projek' => 'required',
            'permen_id' => 'required',
            
        ]);


       
        $projek = Projek::findorfail($id);
        
        $projek->update($request->all());
        return redirect()->route('projek')->with('sukses', 'Projek berhasil di update');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Projek $projek)
    {
        //
    }

    public function cetak($id) {
        $title = "Projek";
        $projek  = Projek::findorfail($id);
        $bahan = Daftarbahan::all();
        $jenisbahan = Jenisbahan::all();
        $jenis = Jenisbahan::all();
        $harga = Hargabahans::join('tugas', 'hargabahans.tugas_id', 'tugas.id')->selectRaw('avg(harga) as sum, bahan_id')->where('tugas.projek_id', $id)->groupBy('bahan_id')->get();
        $koefisienharga = Koefisien::join('daftarbahans', 'koefisiens.bahan_id', '=', 'daftarbahans.id' )->get();
        $hargaall = Hargabahans::join('tugas', 'hargabahans.tugas_id', 'tugas.id')->selectRaw('avg(harga) as sum, bahan_id,tugas_id, tugas.projek_id, tugas.surveyor_id')->where('projek_id',$id)->groupBy('bahan_id')->get();
        $permen = Permen::where('id',$projek->permen_id)->first();
        $jenispekerjaan = Jenispekerjaan::where('permen_id',$permen->id)->get();
// dd($jenispekerjaan);
        $tugas = Tugas::join('users', 'tugas.surveyor_id', '=', 'users.id')->join('hargabahans', 'tugas.id', '=', 'hargabahans.tugas_id')->where('projek_id', $id)->get();
    
        $surveyor = Tugas::join('users', 'tugas.surveyor_id', '=', 'users.id')->where('projek_id', $id)->get();
        $pekerjaan = Pekerjaan::all();
        // $koefisien = Koefisien::all();
        $satuan = Satuan::all();

        $pekerja = Daftarpekerja::all();
        $upah = Upahpekerja::join('tugas', 'upahpekerjas.tugas_id', 'tugas.id')->selectRaw('avg(upah) as sum, pekerja_id')->where('tugas.projek_id', $id)->groupBy('pekerja_id')->get();
        $upahall = Upahpekerja::join('tugas', 'upahpekerjas.tugas_id', 'tugas.id')->selectRaw('avg(upah) as sum, pekerja_id,tugas_id, tugas.projek_id, tugas.surveyor_id')->where('projek_id',$id)->groupBy('pekerja_id')->get();
        $koefisienpekerja = Koefisienpekerja::join('daftarpekerjas', 'koefisienpekerjas.pekerja_id', '=', 'daftarpekerjas.id' )->get();
        
        $pdf = Pdf::loadView('cetak.cetak', ['projek' => $projek, 'bahan' => $bahan, 'jenisbahan' => $jenisbahan, 'jenis' => $jenis, 'harga' => $harga, 'koefisienharga' => $koefisienharga, 'hargaall' => $hargaall, 'permen' => $permen, 'jenispekerjaan' =>$jenispekerjaan, 'tugas' => $tugas , 'surveyor' =>$surveyor, 'pekerjaan' =>$pekerjaan,'satuan' =>$satuan, 'pekerja' =>$pekerja, 'upah' =>$upah, 'upahall' =>$upahall,'koefisienpekerja' =>$koefisienpekerja])->setPaper('a4', 'portrait')->setOption(['dpi' => 150, 'defaultFont' => 'sans-serif']);
        return $pdf->download($projek->projek ."". $projek-> tahun.'.pdf');
    }


    public function viewDaftarProjek(){
        $title = "View Projek";
        $projek = Projek::where('status', 'dipublis')->latest()->get();
       
        return view('view_projek.index', compact('projek', 'title'));

    }

    public function viewProjek($id){
        $title = "View Projek";
        $projek  = Projek::findorfail($id);
        $bahan = Daftarbahan::all();
        $jenisbahan = Jenisbahan::all();
        $jenis = Jenisbahan::all();
        $harga = Hargabahans::join('tugas', 'hargabahans.tugas_id', 'tugas.id')->selectRaw('avg(harga) as sum, bahan_id')->where('tugas.projek_id', $id)->groupBy('bahan_id')->get();
        $koefisienharga = Koefisien::join('daftarbahans', 'koefisiens.bahan_id', '=', 'daftarbahans.id' )->get();
        $hargaall = Hargabahans::join('tugas', 'hargabahans.tugas_id', 'tugas.id')->selectRaw('avg(harga) as sum, bahan_id,tugas_id, tugas.projek_id, tugas.surveyor_id')->where('projek_id',$id)->groupBy('bahan_id')->get();
        $permen = Permen::where('id',$projek->permen_id)->first();
        $jenispekerjaan = Jenispekerjaan::where('permen_id',$permen->id)->get();
        $tugas = Tugas::join('users', 'tugas.surveyor_id', '=', 'users.id')->join('hargabahans', 'tugas.id', '=', 'hargabahans.tugas_id')->where('projek_id', $id)->get();
    
        $surveyor = Tugas::join('users', 'tugas.surveyor_id', '=', 'users.id')->where('projek_id', $id)->get();
        $pekerjaan = Pekerjaan::all();
        // $koefisien = Koefisien::all();
        $satuan = Satuan::all();

        $pekerja = Daftarpekerja::all();
        $upah = Upahpekerja::join('tugas', 'upahpekerjas.tugas_id', 'tugas.id')->selectRaw('avg(upah) as sum, pekerja_id')->where('tugas.projek_id', $id)->groupBy('pekerja_id')->get();
        $upahall = Upahpekerja::join('tugas', 'upahpekerjas.tugas_id', 'tugas.id')->selectRaw('avg(upah) as sum, pekerja_id,tugas_id, tugas.projek_id, tugas.surveyor_id')->where('projek_id',$id)->groupBy('pekerja_id')->get();
        $koefisienpekerja = Koefisienpekerja::join('daftarpekerjas', 'koefisienpekerjas.pekerja_id', '=', 'daftarpekerjas.id' )->get();
        
        
        return view('view_projek.show', compact('tugas','surveyor','upahall','pekerja','upah','koefisienpekerja','bahan','jenis', 'title', 'harga','projek', 'permen','jenispekerjaan', 'pekerjaan', 'jenisbahan', 'hargaall', 'satuan', 'koefisienharga'));

    }
}
