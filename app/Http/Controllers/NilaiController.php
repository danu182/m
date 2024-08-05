<?php

namespace App\Http\Controllers;

use App\Models\Nilai;
use App\Models\Pemeriksaan;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class NilaiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(SubCategory $subCategory, Pemeriksaan $pemeriksaan )
    {
        $Pemeriksaan=Pemeriksaan::with('getNilai')->where('id',$pemeriksaan->id)->limit(1)->get();


        // return $Pemeriksaan;

        return view('master.nilai.index', compact('Pemeriksaan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Pemeriksaan $pemeriksaan)
    {
        return $pemeriksaan;
        return view('master.nilai.create');
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
    public function show( Pemeriksaan $pemeriksaan, Nilai $nilai)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Nilai $nilai)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Nilai $nilai)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Nilai $nilai)
    {
        //
    }
}
