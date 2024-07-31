<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\SubCategory;
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
            return redirect()->route('SubCategory.index');
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SubCategory $subCategory)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SubCategory $subCategory)
    {
        //
    }
}
