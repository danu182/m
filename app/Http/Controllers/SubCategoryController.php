<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Pemeriksaan;
use App\Models\SubCategory;
use GuzzleHttp\RetryMiddleware;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $subCategory =SubCategory::with('category')->get();


        // $coba= Pemeriksaan::with('getPemeriksaan')->get();
        // $coba= Category::with('getSubcategori','SubCAtegory.getAll')->get();
        // $coba= SubCategory::with(['getCategory','getPemeriksaan'])->get();
        // $coba= Category::with(['getALL'])->get();
        // return $coba;
        
        return view('master.subkategory.index',compact('subCategory'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $category =Category::all();
        return view('master.subkategory.create', compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = [
            'nama_subcategory' => $request->nama_subcategory,
            'category_id' => $request-> category_id,
            'description' => $request->description,
            'slug' => Str::slug($request->nama_subcategory),
            
        ];

        // return $data;

            SubCategory::create($data);
            return redirect()->route('subCategory.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(SubCategory $subCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SubCategory $subCategory)
    {
        // $subCategory =SubCategory::with('category')->where('id',$subCategory->id)->get();
        // $subCategory =SubCategory::with('category')->where('id',$subCategory->id)->get();
        $subCategory =SubCategory::with(['category'])->where('id',$subCategory->id)->get();
        
        $category =Category::all();
        
        // return $subCategory;

    // return $subCategory;
        return view('master.subkategory.edit', compact('subCategory','category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SubCategory $subCategory)
    {
         $data = [
            'nama_subcategory' => $request->nama_subcategory,
            'category_id' => $request-> category_id,
            'description' => $request->description,
            // 'slug' => Str::slug($request->nama_subcategory),
            
        ];

        // return $data;

            
            $subCategory->update($data);
            return redirect()->route('subCategory.index');

        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SubCategory $subCategory)
    {
        $subCategory->delete();
        return redirect()->route('subCategory.index');
    }
}
