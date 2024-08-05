<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Nilai extends Model
{
    use HasFactory, SoftDeletes;


    protected $fillable=[
        'pemeriksaan_id',
        'sex',
        'nilai_bawah',
        'nilai_atas',
        'satuan',    
    ];


    public function getPemeriksaan()
    {
        return $this->hasMany(Pemeriksaan::class, 'id', 'pmeriksaan_id');
    }


}
