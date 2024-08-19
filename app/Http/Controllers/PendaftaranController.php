<?php

namespace App\Http\Controllers;

use App\Models\Paket;
use App\Models\Pendaftaran;
use App\Models\Perusahaan;
use App\Models\Peserta;
use Illuminate\Http\Request;

use function App\Helpers\editDaftar;
use function App\Helpers\editPendaftaran;
use function App\Helpers\formatDate;
use function App\Helpers\noPendaftaran;
use function App\Helpers\simpanPendaftaran;
use function App\Helpers\updateaftar;
use function App\Helpers\updateDaftar;

class PendaftaranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $pendaftaran=Pendaftaran::with('getPeserta','getPaket','getPerusahaan')->get(  );
                return view('master.pendaftaran.index', compact('pendaftaran'));
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $perusahaan= Perusahaan::all();
        $peserta=Peserta::all();
        return view('master.pendaftaran.create', compact('peserta','perusahaan'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        $data=[
                'tgl_pendaftaran'=>formatDate(),
                // 'no_pendaftaran'=>
                'peserta_id'=>$request->peserta_id,
                'penjamin_peserta'=>$request->perusahaan_id,
                'paket_id'=>$request->paket_id,
            
            ];
            
            $data['no_pendaftaran']= noPendaftaran();

            $data = simpanPendaftaran($data);
            // return $data;
        
        // Pendaftaran::create($data);
        return redirect()->route('pendaftaran.index');

    }

    /**
     * Display the specified resource.
     */
    public function show(Pendaftaran $pendaftaran)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pendaftaran $pendaftaran)
    {
        $data= $pendaftaran->id;
        $pendaftaran = editDaftar($data);

        $perusahaan=Perusahaan::all();
        $paket=Paket::all();
        $peserta=Peserta::all();
        // return $pendaftaran;
        return view('master.pendaftaran.edit',compact('pendaftaran','perusahaan','paket','peserta'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pendaftaran $pendaftaran)
    {
        // return $request->all();    
        $data=[
                'peserta_id'=>$request->peserta_id,
                'penjamin_peserta'=>$request->perusahaan_id,
                'paket_id'=>$request->paket_id,
            
            ];
            
            $data2 = updateDaftar($data,$pendaftaran);
            // return $data2; 
            return redirect()->route('pendaftaran.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pendaftaran $pendaftaran)
    {
        //
    }
}
