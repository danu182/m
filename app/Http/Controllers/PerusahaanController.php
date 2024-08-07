<?php

namespace App\Http\Controllers;

use App\Models\Perusahaan;
use Illuminate\Http\Request;

class PerusahaanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $perusahaan=Perusahaan::all();
        return view('master.perusahaan.index', compact('perusahaan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('master.perusahaan.create'); 
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data=$request->all();
        Perusahaan::create($data);
        return redirect()->route('perusahaan.index')->with('success', 'Data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Perusahaan $perusahaan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Perusahaan $perusahaan)
    {
        return view('master.perusahaan.edit', compact('perusahaan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Perusahaan $perusahaan)
    {
        $data =$request->all();
        $perusahaan->update($data);
        return redirect()->route('perusahaan.index')->with('success', 'Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Perusahaan $perusahaan)
    {
        $perusahaan->delete();
        return redirect()->route('perusahaan.index')->with('success', 'Data berhasil diubah');
    }
}
