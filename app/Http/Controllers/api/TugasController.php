<?php

namespace App\Http\Controllers\api;

use App\Models\Tugas;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Symfony\Component\HttpFoundation\Response;

class TugasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id)
    {
        $tugas = Tugas::latest('projeks.created_at')->join('projeks', 'tugas.projek_id', 'projeks.id')->select('projeks.projek', 'projeks.tahun','projeks.status', 'tugas.id')->where('surveyor_id', $id)->get();

       


        return response()->json($tugas, Response::HTTP_OK);
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
        //
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
