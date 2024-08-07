<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Peserta extends Model
{
    use HasFactory, SoftDeletes;


    protected $fillable=[
        'nomor_peserta',
        'nama_peserta',
        'sex',
        'tempat_lahir',
        'tgl_lahir',
        'alamat',
        'ktp_peserta',
        'tlp_peserta',

    ];


    
    public function getSex()
    {
        return $this->belongsTo(Sex::class, 'sex', 'id');
    }

}
