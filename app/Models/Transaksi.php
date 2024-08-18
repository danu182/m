<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
        return $this->belongsTo(User::class, 'pendaftaran_id', 'id');
    }
}
