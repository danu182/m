<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class cobaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        // return "sdasda";
        $pemeriksaan= DB::table('pemeriksaans AS p')
        ->select(
            'p.id AS periksa_id',
            'p.nama_pemeriksaan',
            'p.descripcion',
            'isian_pemeriksaans.id AS id',
            'isian_pemeriksaans.kategori_isian'
            )
        ->leftJoin('isian_pemeriksaans', 'p.id', '=', 'isian_pemeriksaans.pemeriksaan_id')
        ->get();

        // return $pemeriksaan;




        // $pemeriksaan=Pemeriksaan::all();
        return view('master.isian.index', compact('pemeriksaan')); 
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
        return $id;
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
