<?php

namespace App\Http\Controllers;

use App\Models\Pendaftaran;
use App\Models\Transaksi;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $pendaftaran=Pendaftaran::all();
    //    SELECT
    //     pk.nama_paket,
    //     c.nama_category,
    //     sc.nama_subcategory,
    //     p.nama_pemeriksaan
    //     FROM 
    //     categories c
    //     JOIN sub_categories sc
    //     on sc.category_id= c.id
    //     JOIN pemeriksaans p
    //     on p.subcategory_id=sc.id
    //     JOIN transaksis t
    //     on t.pemeriksaan_id=p.id
    //     JOIN paket_details pd
    //     ON pd.pemeriksaan_id=p.id
    //     JOIN pakets pk
    //     on pk.id=pd.paket_id
    
    
        return view('master.transaksi.index',compact('pendaftaran'));
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show( $id)
    {
        // return $id   ;

        $pendaftaran=  Pendaftaran::with('getPeserta','getPaket')->where('pendaftarans.id',$id)->first();
        
// harus nya bisa seperti ini
        // SELECT * from 
        // transaksis t
        // JOIN pemeriksaans p
        // on t.pemeriksaan_id = p.id
        // JOIN sub_categories sc
        // on sc.id=p.subcategory_id
        // WHERE sc.category_id =1



        $transaksi = Transaksi::with('getPemeriksaan')
        ->where('transaksis.pendaftaran_id', $id)
        ->where('transaksis.status', 1)     
        // ->where('pemeriksaans.subcategory_id',1)
        ->get();

        // return $transaksi;




        return view('master.transaksi.show', compact('pendaftaran','transaksi'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Transaksi $transaksi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Transaksi $transaksi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Transaksi $transaksi)
    {
        //
    }
}
