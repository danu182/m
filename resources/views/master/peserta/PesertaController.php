<?php

namespace App\Http\Controllers;

use App\Models\Peserta;
use App\Models\Sex;
use Illuminate\Http\Request;

class PesertaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //  $peserta = DB::table('pesertas')
        // ->select('*')
        //         ->join('sexes', 'sexes.id', '=', 'pesertas.sex')
        //         ->get();

        $peserta=Peserta::with('getSex')->get();
        // return $peserta;

        return view('master.peserta.index', compact('peserta'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $sex=Sex::all();
        return view('master.peserta.create', compact('sex'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data=$request->all();
        
        Peserta::create($data);
        return redirect()->route('peserta.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Peserta $peserta)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Peserta $pesertum)
    {
        // return $pesertum->id;
        $peserta= Peserta::with('getSex')->where('id',$pesertum->id)->get();
        return 
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Peserta $peserta)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Peserta $peserta)
    {
        return $peserta;
    }
}
