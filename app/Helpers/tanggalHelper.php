<?php

namespace App\Helpers;

use App\Models\Peserta;
use DateTime;
use Illuminate\Support\Facades\Http;
use PhpParser\Node\Stmt\TryCatch;

function formatDate()
{
    $dateNow = date('Y-m-d');
    return $dateNow;
}



function formatDate2($dateString, $format = 'Y-m-d')
{
    $date = new DateTime($dateString);
    return $date->format($format);
}


function nomor()
{
    $contoh= Peserta::orderBy('created_at', 'desc')->limit(1)->get();
    if((count($contoh))){
            // jika pada tanggal belum pernah ada transaksi akan menambahkan 0+1
            $urut =($contoh[0]->nomor_peserta) ;
            $no = substr($urut , -6, 6);
            $no = (int)$no +1;
            $newKodeTransaksi = sprintf("%06s", $no);
            // echo $newKodeTransaksi;  
            $no_transaksi =$newKodeTransaksi;
        }
        else
        {
            // jika dalam suatu tanggal sudah ada transaksi dia akan menambahkan nomer trnasaksi nya +1
            $no=0+1;
            $nomer_baru= sprintf("%06s", $no);
            // echo $nomer_baru;
            $no_transaksi =$nomer_baru;
        }
        return $no_transaksi;
    
}