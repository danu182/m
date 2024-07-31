<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pemeriksaan extends Model
{
    use HasFactory, SoftDeletes;


    protected $fillable = [
        'nama_pemeriksaans',
        'subcategory_id',
        'descripcion',
        'slug',
    ];


    
    public function getPemeriksaan()
    {
        return $this->belongsTo(SubCategory::class, 'subcategory_id', 'id');
    }

}
