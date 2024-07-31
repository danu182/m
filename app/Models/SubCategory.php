<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class SubCategory extends Model
{
    use HasFactory, SoftDeletes;



    protected $fillable = [
        'nama_subcategory',
        'description',
        'category_id',
        'slug',
    ];  


    /**
     * Get the user associated with the SubCategory
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function category()
    {
        return $this->hasOne(Category::class, 'id', 'category_id');
    }
    
    
    public function getCategory()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
        
    }


}
