<?php

namespace App\Http\Controllers;

use App\Models\Paket;
use App\Models\Pendaftaran;
use App\Models\Perusahaan;
use App\Models\Peserta;
use Illuminate\Http\Request;

use function App\Helpers\editPendaftaran;
use function App\Helpers\formatDate;
use function App\Helpers\noPendaftaran;
use function App\Helpers\simpanPendaftaran;

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
        
        $perusahaan=Perusahaan::all();
        $paket=Paket::all();
        $peserta=Peserta::all();
        return view('master.pendaftaran.edit',compact('pendaftaran','perusahaan','paket','peserta'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pendaftaran $pendaftaran)
    {
        $data=[
                'penjamin_peserta'=>$request->perusahaan_id,
                'paket_id'=>$request->paket_id,
            
            ];
        editPendaftaran($data, $pendaftaran);
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
