<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PaketDetail extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'paket_id',
        'pemeriksaan_id',

    ];


    
    public function getPemeriksaan()
    {
        return $this->belongsTo(Pemeriksaan::class, 'pemeriksaan_id', 'id');
    }
    
    public function getPaket()
    {
        return $this->belongsTo(Paket::class, 'paket_id', 'id');
    }


}
