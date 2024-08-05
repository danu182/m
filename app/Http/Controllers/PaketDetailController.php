<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Paket;
use App\Models\PaketDetail;
use App\Models\Pemeriksaan;
use App\Models\SubCategory;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
    public function create(Paket $paket, PaketDetail $paketDetail)
    {

        // SELECT * FROM sub_categories s
        // JOIN pemeriksaans p
        // on p.subcategory_id = s.id
        // WHERE NOT EXISTS(
        //     SELECT * FROM paket_details AS pd WHERE p.id= pd.pemeriksaan_id AND pd.paket_id=3
        // ) ORDER BY s.category_id;

        // $leagues = DB::table('leagues')
        //     ->select('league_name')
        //     ->join('countries', 'countries.country_id', '=', 'leagues.country_id')
        //     ->where('countries.country_name', $country)
        //     ->get();

        $coba = DB::table('sub_categories')
                ->select('*')
                ->join('pemeriksaans', 'pemeriksaans.subcategory_id', '=', 'sub_categories.id')
                ->whereNotExists(function ($query) use($paket)
                {
                    $query->select('*')
                    ->from('paket_details')
                    ->where('paket_details.paket_id', '=', $paket->id)
                    ->whereRaw('paket_details.pemeriksaan_id= pemeriksaans.id');
                })
                ->get();
        return $coba;


        return view('master.paket_detail.create', compact('pemeriksaan','paket'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Paket $paket)
    {
        $data=$request->all();
        // return $data;

        foreach ($data['paket_id'] as  $datas)
        {
            // echo $datas[0];
            PaketDetail::create([
            'paket_id'=>$paket->id,
            'pemeriksaan_id'=>$datas,
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
    public function destroy( Paket $paket ,PaketDetail $paketDetail, $id)
    {
        $detail=PaketDetail::find($id);
        $detail->delete();
        // $paketdetail->delete();
        return redirect()->route('paket.paketdetail.index',[$paket->id]);   
    }
}
