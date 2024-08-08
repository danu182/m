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
        'nomor_peserta',
        'penjamin_peserta',
        'paket_id',
        'status',

    ];


}
