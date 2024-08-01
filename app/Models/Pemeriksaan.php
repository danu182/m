<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pemeriksaan extends Model
{
    use HasFactory, SoftDeletes;


    protected $fillable = [
        'nama_pemeriksaan',
        'subcategory_id',
        'descripcion',
        'slug',
    ];


    
    public function getPemeriksaan()
    {
        return $this->belongsTo(SubCategory::class, 'subcategory_id', 'id');
        // return $this->hasOne(SubCategory::class, 'subcategory_id', 'id');
    }

    public function getSubcategoryPemeriksaan()
    {
        return $this->hasOne(SubCategory::class, 'id', 'subcategory_id');
        // return $this->hasOne(SubCategory::class, 'subcategory_id', 'id');
    }

    public function getAll() 
    {
        return $this->hasManyThrough(
        SubCategory::class,
        category::class,
        'id', // Foreign key on the items table...
        'category_id', // Foreign key on the types table...
        'subcategory_id', // Local key on the users table...
        'id' // Local key on the categories table...

        );
        
    }


}
