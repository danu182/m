<?php

namespace App\Http\Controllers;

use App\Models\Peserta;
use App\Models\Sex;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use function App\Helpers\formatDate;
use function App\Helpers\nomor;

class PesertaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $peserta=Peserta::with('getSex')->where('status',1)->get();

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
        $data['nomor_peserta'] = nomor();
        // $data['status'] = 1;
        // return $data;
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

        return view('master.peserta.edit', compact('peserta','sex'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Peserta $pesertum)
    {
        $data=$request->all();
        $data['nomor_peserta'] = $pesertum->nomor_peserta;
        // return $data;   
        $pesertum->update($data);
        return redirect()->route('peserta.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Peserta $pesertum)
    {
        // $pesertum->delete($pesertum);

        $data['status'] = 2;
        $pesertum->update($data);
        return redirect()->route('peserta.index');
    }
}
