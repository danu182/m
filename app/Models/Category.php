<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory, SoftDeletes;


    protected $fillable = [
        'nama_category',
        'description',
        'slug'
    ];

    public function getSubcategori()
    {
        return $this->hasMany(SubCategory::class, 'category_id', 'id');
    }


    public function getPemeriksaan()
    {
        return $this->hasMany(SubCategory::class, 'category_id', 'id');
    }

    // Item::class,
    //     Type::class,
    //     'category_id', // Foreign key on the types table...
    //     'type_id', // Foreign key on the items table...
    //     'id', // Local key on the users table...
    //     'id' // Local key on the categories table...



    public function getAll() 
    {
         return $this->hasManyThrough(
            SubCategory::class,
            Pemeriksaan::class,
            'subcategory_id', // Foreign key on the deployments table...
            'category_id', // Foreign key on the environments table...
            'id', // Local key on the projects table...
            'id' // Local key on the environments table...
        );
        
    }



    

}
