<?php

namespace App\Http\Controllers;

use App\Models\isianPemeriksaan;
use App\Models\Pemeriksaan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class IsianPemeriksaanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $pemeriksaan=Pemeriksaan::with('getIsian')->get();

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
        // return $request->all();
        $data = [
            'pemeriksan_id'=>$request->pemeriksaan_id,
            'kategori_isian' => $request->kategori_isian,
        ];

        return $data;
        isianPemeriksaan::create($data);
        return redirect()->route('isian-pemeriksaan.index');

    }

    /**
     * Display the specified resource.
     */
    public function show(isianPemeriksaan $isianPemeriksaan, $id)
    {
    //     $pemeriksaan=Pemeriksaan::find($id);
    //     // return $pemeriksaan;
    //     return view('master.isian.show', compact('pemeriksaan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        return "asdad";
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, isianPemeriksaan $isianPemeriksaan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(isianPemeriksaan $isianPemeriksaan)
    {
        //
    }
}
