<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Paket;
use App\Models\PaketDetail;
use App\Models\Pemeriksaan;
use App\Models\SubCategory;
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

        $pemeriksaan=SubCategory::with(['getPemeriksaan'])->get();

        // return $periksa;
        // $pemeriksaan=Pemeriksaan::whereNotExists(function ($query) use($paket) {
        //     $query->select("*")
        //       ->from('paket_details')
        //       ->whereRaw('paket_details.pemeriksaan_id = pemeriksaan_id'  )
        //       ->where('paket_details.paket_id','=',$paket->id);
        //         } )->get();

                // return $pemeriksaan;


                return view('master.paket_detail.create', compact('pemeriksaan','paket'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Paket $paket)
    {

        $data=$request->all();

        // return $paket;

        foreach ($data['paket_id'] as  $datas)
        {
            Paketdetail::create([
            'paket_id'=>$paket->id,
            'pemeriksaan_id'=>$datas[0],
            ]);
        }

        return redirect()->route('paket.paketdetail.index',$paket);
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
        return $request->all();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Paket $paket,PaketDetail $paketDetail)
    {
        // return $paketDetail->id;
        $paketDetail->delete();
        return redirect()->route('paket.paketdetail.index',[$paket->id]);   
    }
}
