<?php

namespace App\Http\Controllers;

use App\Models\Pemeriksaan;
use App\Models\SubCategory;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class PemeriksaanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(SubCategory $subCategory )
    {
            $pemeriksaan= Pemeriksaan::with(['getPemeriksaan','getNilai'])->where('subcategory_id',$subCategory->id)->get();
            // $query= Pemeriksaan::with(['getItem'])->get();

        // return $subCategory;
        return view('master.pemeriksaan.index', compact('pemeriksaan','subCategory'));
            
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(SubCategory $subCategory)
    {
        return view('master.pemeriksaan.create', compact('subCategory'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, SubCategory $subCategory)
    {

        $data =[
            'nama_pemeriksaan'=>$request->nama_pemeriksaan,
            'subcategory_id'=>$subCategory->id,
            'descripcion'=>$request->descripcion,
            'slug' => Str::slug($subCategory->nama_subcategory  .'-'.$request->nama_pemeriksaan),
        ];

        // return $data;
        Pemeriksaan::create($data);
        return redirect()->route('subCategory.pemeriksaan.index', $subCategory);
    }

    /**
     * Display the specified resource.
     */
    // public function show(Pemeriksaan $pemeriksaan)
    // {
    //     //
    // }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( SubCategory $subCategory, Pemeriksaan $pemeriksaan )
    {
        return view('master.pemeriksaan.edit', compact('pemeriksaan','subCategory'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SubCategory $subCategory, Request $request, Pemeriksaan $pemeriksaan)
    {
         $data = [
            'nama_pemeriksaan' => $request->nama_pemeriksaan,
            'descripcion' => $request->descripcion,
            'slug' => Str::slug($request->nama_category),
            
        ];

        $pemeriksaan->update($data);
        return redirect()->route('subCategory.pemeriksaan.index', $subCategory);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SubCategory $subCategory, Pemeriksaan $pemeriksaan )
    {
        $pemeriksaan->delete();
        return redirect()->route('subCategory.pemeriksaan.index',[$subCategory->id]);
    }
}
