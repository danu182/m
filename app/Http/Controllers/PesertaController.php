<?php

namespace App\Http\Controllers;

use App\Models\Peserta;
use App\Models\Sex;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
     
        //  $no = Peserta::whereRaw('id = (select max(`id`) from pesertas)')->get();
            $no=DB::table('pesertas')->select('*')->max('id');
        $no=$no+1;
        return $no++;
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
        $sex=Sex::all();
        $peserta= Peserta::with('getSex')->where('id',$pesertum->id)->get();

        // return $pesertum
        return view('master.peserta.edit', compact('peserta','sex'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Peserta $pesertum)
    {
        $data=$request->all();
        $pesertum->update($data);
        return redirect()->route('peserta.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Peserta $pesertum)
    {
        $pesertum->delete($pesertum);
        return redirect()->route('peserta.index');
    }
}
