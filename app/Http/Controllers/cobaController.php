<?php

namespace App\Http\Controllers;

use App\Models\isianPemeriksaan;
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
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // return $request->all();
        $data=[
            'pemeriksaan_id'=> $request->periksa_id,
            'kategori_isian'=> $request->kategori_isian,
        ];

        // Category::create($data);
        isianPemeriksaan::create($data);
        return redirect()->route('coba.index');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $pemeriksaan= DB::table('pemeriksaans AS p')
        ->select(
            'p.id AS periksa_id',
            'p.nama_pemeriksaan',
            'p.descripcion',
            'isian_pemeriksaans.id AS id',
            'isian_pemeriksaans.kategori_isian'
            )
        ->leftJoin('isian_pemeriksaans', 'p.id', '=', 'isian_pemeriksaans.pemeriksaan_id')
        ->where('p.id',$id)
        ->get();

        // return $pemeriksaan;
        return view('master.isian.edit', compact('pemeriksaan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $pemeriksaan= DB::table('pemeriksaans AS p')
        ->select(
            'p.id AS periksa_id',
            'p.nama_pemeriksaan',
            'p.descripcion',
            'isian_pemeriksaans.id AS id',
            'isian_pemeriksaans.kategori_isian'
            )
        ->leftJoin('isian_pemeriksaans', 'p.id', '=', 'isian_pemeriksaans.pemeriksaan_id')
        ->where('p.id',$id)
        // ->firstOrFail();
        ->get();
        
        // return $pemeriksaan[0]->nama_pemeriksaan;
        return view('master.isian.create', compact('pemeriksaan'));


    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id, isianPemeriksaan $isianPemeriksaan)
    {
        $santri = isianPemeriksaan::where('id', $id)
             ->update([
            'kategori_isian'=> $request->kategori_isian,
        ]);
        return redirect()->route('coba.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
