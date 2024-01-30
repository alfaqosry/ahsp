<?php

namespace App\Http\Controllers\api;

use App\Models\Daftarbahan;
use App\Models\Hargabahans;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;

class HargabahanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function getBahan()
    {
            $bahan = Daftarbahan::all();
        //     $harga = Hargabahans::where('tugas_id',$id)->get();
        // //  $response = [
        // //     'bahan' => $bahan,
        // //    ' harga' => $hargabahan
        // //  ];


        // //$harga = DB::table('daftarbahans')->leftJoin('hargabahans', 'daftarbahans.id', '=', 'hargabahans.bahan_id')->where('tugas_id', $id)->get();

        //     foreach ($bahan as $b_item) {


        //        foreach ($harga as $key => &$h_item) {
        //         if ($b_item->id  == $h_item->baha_id) {
        //           $h_item['bahan'] = $b_item->bahan;
        //           $h_item['harga'] = $h_item->harga;
        //        }
        //     }
        // }


        // dd($h_item);

        return response()->json($bahan, Response::HTTP_OK);
    }

    public function getHarga($id){
        $bahan = Daftarbahan::all();
        $harga = Hargabahans::where('tugas_id',$id)->get();

        $hargabahan = [];

$i = 0;
        foreach ($bahan as $b) {
            $hargabahan[$i]['bahan'] = $b->bahan;
            $hargabahan[$i]['id_bahan'] = $b->id;

            

            foreach ($harga as $h) {
                if($b->id == $h->bahan_id){
                $hargabahan[$i]['harga'] = $h->harga;
                // echo $h->harga;
                // echo "<br>";
                }

            }
            $i++;
            
        }

        return response()->json($hargabahan, Response::HTTP_OK);

        

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
        $validator = Validator::make($request->all(), [
            'harga' => 'required',
            'tugas_id' => 'required',
            'bahan_id' => 'required',
           
           
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors(),
            Response::HTTP_UNPROCESSABLE_ENTITY);
        }

     

        try {
            $harga = Hargabahans::create($request->all());

            $response = [
                'message' => "AHSP baru di buat",
                'status' => "Sukses",
                'data' =>    $harga
                
            ];

            return response()->json($response, Response::HTTP_CREATED);

        } catch (QueryExeption $e) {
            return response()->json(
                [
                    'message' => 'Failed' . $e->errorInfo
                ]
                );
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
