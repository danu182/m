<?php

namespace App\Helpers;

use App\Models\Pendaftaran;
use App\Models\Peserta;
use App\Models\Transaksi;
use DateTime;
use Illuminate\Support\Facades\Http;
use PhpParser\Node\Stmt\TryCatch;
use Symfony\Component\CssSelector\Node\FunctionNode;

function formatDate()
{
    date_default_timezone_set('Asia/Jakarta');
    $dateNow = date('Y-m-d');
    return $dateNow;
}



function formatDate2($dateString, $format = 'Y-m-d')
{
    date_default_timezone_set('Asia/Jakarta');
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


function noPendaftaran()
{
    $tStamp=date('Y-m-d');
    $contoh = Pendaftaran::where('created_at','LIKE' ,"%".$tStamp."%")->orderBy('created_at', 'desc')->limit(1)->get();

    
    $tgl =date("Ymd", strtotime($tStamp));
        // cek apakah sudah ada trnasaski sudah ada atau belum di tamggal sekarang
        if((count($contoh))){
            // jika pada tanggal belum pernah ada transaksi akan menambahkan 0+1
            $urut =($contoh[0]->no_pendaftaran) ;
            $no = substr($urut , -5, 5);
            $no = (int)$no +1;
            $newKodeTransaksi = $tgl . sprintf("-"."%05s", $no);
            // echo $newKodeTransaksi;  
            $no_transaksi =$newKodeTransaksi;
            
        } else
        {
            // jika dalam suatu tanggal sudah ada transaksi dia akan menambahkan nomer trnasaksi nya +1
            $no=0+1;
            $nomer_baru= $tgl.sprintf("-"."%05s", $no);
            // echo $nomer_baru;
            $no_transaksi =$nomer_baru;
            
        }
        return $no_transaksi;
    
}


function simpanPendaftaran($data)
{
   $pendaftaran= Pendaftaran::create($data);

   

        //  return $pendaftaran;

         $data2=Pendaftaran::join('paket_details', 'paket_details.paket_id','=','pendaftarans.paket_id')
         ->select('paket_details.pemeriksaan_id')
         ->where('pendaftarans.no_pendaftaran', $pendaftaran->no_pendaftaran)
         ->get();

    foreach ($data2 as  $datas)
        {
            // echo $data2;
            Transaksi::create([
             'pendaftaran_id'=> $pendaftaran->id,
            'paket_id'=> $pendaftaran->paket_id,
            'pemeriksaan_id'=>$datas->pemeriksaan_id,
            ]);
        }
}

function editPendaftaran($data, $pendaftaran)
{
     $pendaftaran->update($data);

}


function editDaftar($data)
{
    $data2=Pendaftaran::join('pesertas','pesertas.id','pendaftarans.peserta_id')
    ->join('perusahaans','perusahaans.id','pendaftarans.penjamin_peserta')
    ->join('sexes','sexes.id','pesertas.sex')
    ->join('pakets','pakets.id','pendaftarans.paket_id')
    ->select(
        'pendaftarans.tgl_pendaftaran',
        'pendaftarans.id',
        'pendaftarans.no_pendaftaran',
        'pendaftarans.peserta_id',
        'pendaftarans.penjamin_peserta',
        'pendaftarans.paket_id',
        'pendaftarans.status',
        'pesertas.id',
        'pesertas.nomor_peserta',
        'perusahaans.nama_perusahaan',
        'pakets.nama_paket',
        'sexes.jenis_kelamina',
        'pesertas.sex',
        'pesertas.tempat_lahir',
        'pesertas.tgl_lahir',
        'pesertas.alamat',
        'pesertas.ktp_peserta',
        'pesertas.tlp_peserta',
        )
    ->where('pendaftarans.peserta_id',$data)
    ->get();
    return $data2;
}



function updateDaftar($data,$pendaftaran)
{

    // return $pendaftaran;


     $data=[
        "peserta_id"=>$data->peserta_id,
        "penjamin_peserta"=> $data->penjamin_peserta,
        "paket_id"=> $data->paket_id
        ];


        $pendaftaran->update($data);


         $data2=Pendaftaran::join('paket_details', 'paket_details.paket_id','=','pendaftarans.paket_id')
         ->select('paket_details.pemeriksaan_id')
         ->where('pendaftarans.no_pendaftaran', $pendaftaran->no_pendaftaran)
         ->get();

         

    // foreach ($data2 as  $datas)
    //     {
    //         // echo $data2;
    //         Transaksi::create([
    //          'pendaftaran_id'=> $pendaftaran->id,
    //         'paket_id'=> $pendaftaran->paket_id,
    //         'pemeriksaan_id'=>$datas->pemeriksaan_id,
    //         ]);
    //     }
}
