<?php

namespace App\Http\Controllers;

use App\Models\Nilai;
use App\Models\Pemeriksaan;
use App\Models\Sex;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NilaiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(SubCategory $subCategory, Pemeriksaan $pemeriksaan )
    {
        // $pemeriksaan=Pemeriksaan::with('getNilai')->where('id',$pemeriksaan->id)->limit(1)->get();
        $pemeriksaan=Pemeriksaan::with('getSubcategoryPemeriksaan')->get();



        // return $pemeriksaan;

        return view('master.nilai.index', compact('pemeriksaan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($id)
    {
        return $id;

        // return view('master.nilai.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    public function list_nilai($id)
    {   

        $pemeriksaan = DB::table('pemeriksaans')
                ->select('nilais.*')
                ->join('nilais', 'nilais.pemeriksaan_id', '=', 'pemeriksaans.id')
                ->join('sexes', 'sexes.id','=', 'nilais.sex')
                ->where('nilais.deleted_at', '=', null)
                ->where('pemeriksaans.id','=',$id)
                ->get();
                return $pemeriksaan;
        return view('master.nilai.daftar-nilai', compact('pemeriksaan','id'));
    }


    public function tambah_nilai($id)
    {
        $pemeriksaan =Pemeriksaan::where('id', $id)->get();
        $sex=Sex::all();
        // return $pemeriksaan; 
        return view('master.nilai.create',compact('pemeriksaan','sex'));
    }


    public function simpan_nilai(Request $request)
    {
        $data= $request->all();
          $data = [
            'pemeriksaan_id'=>$request->pemeriksaan_id,
            'sex'=>$request->sex,
            'nilai_bawah'=>$request->nilai_bawah,
            'nilai_atas'=>$request->nilai_atas,
            'satuan'=>$request->satuan,

        ];
        Nilai::create($data);
        return redirect('nilai');
        

    }


    public function hapus_nilai($id)
    {
        $nilai = Nilai::findOrFail($id);
        
        $nilai->delete();
        return redirect('nilai');
    }

    /**
     * Display the specified resource.
     */
    public function show( Pemeriksaan $pemeriksaan, Nilai $nilai)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Nilai $nilai)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Nilai $nilai)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Nilai $nilai)
    {
        //
    }
}
