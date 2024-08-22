<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class Transaksi extends Model
{
    use HasFactory;

    protected $fillable=[
         'pendaftaran_id',
        'paket_id',
        'pemeriksaan_id',
        'status',
    ];

    public function getPendaftaran()
    {
        return $this->hasMany(Pendaftaran::class,  'id','pendaftaran_id');
    }

    public function getPemeriksaan()
    {
        return $this->belongsTo(Pemeriksaan::class, 'pemeriksaan_id', 'id');
    }
    
    public function getIsian()
    {
        return $this->belongsTo(isianPemeriksaan::class, 'pemeriksaan_id', 'id');
    }


}
