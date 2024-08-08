<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pendaftaran extends Model
{
    use HasFactory;

    protected $FILLABLE=[
        'tgl_pendaftaran',
        'no_pendaftaran',
        'peserta_id',
        'penjamin_peserta',
        'paket_id',
        'status',

    ];

    
    public function getPeserta()
    {
        return $this->belongsTo(Peserta::class, 'peserta_id', 'id');
    }


}
