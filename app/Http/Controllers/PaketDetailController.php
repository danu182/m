<?php

namespace App\Http\Controllers;

use App\Models\Paket;
use App\Models\PaketDetail;
use App\Models\Pemeriksaan;
use Illuminate\Http\Request;

class PaketDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Paket $paket)
    {
        $paketDetail = PaketDetail::with(['getPemeriksaan'])->where('paket_id',$paket->id)->get();
        return view('master.paket_detail.index',compact('paketDetail', 'paket'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Paket $paket)
    {

        $periksa=Pemeriksaan::with('getSubcategory')->get();

        return $periksa;
        $pemeriksaan=Pemeriksaan::whereNotExists(function ($query) use($paket) {
            $query->select("*")
              ->from('paket_details')
              ->whereRaw('paket_details.pemeriksaan_id = pemeriksaan_id'  )
              ->where('paket_details.paket_id','=',$paket->id);
                } )->get();

                return $pemeriksaan;


                return view('master.paket_detail.create', compact('pemeriksaan','paket'));
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
    public function show(PaketDetail $paketDetail)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PaketDetail $paketDetail)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PaketDetail $paketDetail)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PaketDetail $paketDetail)
    {
        //
    }
}
