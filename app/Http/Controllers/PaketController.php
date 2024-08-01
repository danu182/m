<?php

namespace App\Http\Controllers;

use App\Models\Paket;
use Illuminate\Support\Str;     
use Illuminate\Http\Request;

class PaketController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $paket =Paket::all();
        return view('master.paket.index', compact('paket'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('master.paket.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // return $request->all();
        $data=[
            'nama_paket'=>$request->nama_paket,
            'description'=>$request->description,
            'slug' => Str::slug($request->nama_paket),

        ];

        Paket::create($data);
        return redirect()->route('paket.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Paket $paket)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Paket $paket)
    {
        return view('master.paket.edit',compact('paket'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Paket $paket)
    {
        $data=[
            'nama_paket'=>$request->nama_paket,
            'description'=>$request->description,
            'slug' => Str::slug($request->nama_paket),

        ];

        $paket->update($data);
        return redirect()->route('paket.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Paket $paket)
    {
           $paket->delete();
        return redirect()->route('paket.index');

    }
}
