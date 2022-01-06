<?php

namespace App\Http\Controllers;

use App\Models\Keluarga;
use App\Models\Ayah;
use App\Models\Ibu;
use Illuminate\Http\Request;
use App\Models\Pengantar_nikah;
use App\Models\Permohonan_nikah;
use App\Models\Persetujuan_nikah;
use App\Models\Izin_nikah;
use App\Models\Kematian_pasangan;
use App\Models\Kelahiran;
use App\Models\Kematian;



class DashboardController extends Controller
{
   
    //
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        if (\Auth::check() && \Auth::user()->role == 'su'):
            $keluarga = Keluarga::whereMonth('created_at', date('m'));
            $ayah = Ayah::whereMonth('created_at', date('m'));
            $ibu = Ibu::whereMonth('created_at', date('m'));
            $pengantar = Pengantar_nikah::whereMonth('created_at', date('m'));
            $permohonan = Permohonan_nikah::whereMonth('created_at', date('m'));
            $persetujuan = Persetujuan_nikah::whereMonth('created_at', date('m'));
            $izin = Izin_nikah::whereMonth('created_at', date('m'));
            $kematian_pasangan = Kematian_pasangan::whereMonth('created_at', date('m'));
            $kelahiran = Kelahiran::whereMonth('created_at', date('m'));
            $kematian = Kematian::whereMonth('created_at', date('m'));
        else:
            $keluarga = Keluarga::where('user_id', \Auth::user()->id);
            $ayah = Ayah::where('user_id', \Auth::user()->id)->get();
            $ibu = Ibu::where('user_id', \Auth::user()->id)->get();
            $pengantar = Pengantar_nikah::join('keluargas', 'keluargas.id', '=', 'pengantar_nikahs.keluarga_id')->where('keluargas.user_id', \Auth::user()->id)->get();
            $permohonan = Permohonan_nikah::join('keluargas', 'keluargas.id', '=', 'permohonan_nikahs.keluarga_id')->where('keluargas.user_id', \Auth::user()->id)->get();
            $persetujuan = Persetujuan_nikah::join('keluargas', 'keluargas.id', '=', 'persetujuan_nikahs.keluarga_id')->where('keluargas.user_id', \Auth::user()->id)->get();
            $izin = Izin_nikah::join('keluargas', 'keluargas.id', '=', 'izin_nikahs.keluarga_id')->where('keluargas.user_id', \Auth::user()->id)->get();
            $kematian_pasangan = Kematian_pasangan::join('keluargas', 'keluargas.id', '=', 'kematian_pasangans.keluarga_id')->where('keluargas.user_id', \Auth::user()->id)->get();
            $kelahiran = Kelahiran::join('keluargas', 'keluargas.id', '=', 'kelahirans.keluarga_id')->where('keluargas.user_id', \Auth::user()->id)->get();
            $kematian = Kematian::where('user_id', \Auth::user()->id)->get();
        endif;

        return view('app.dashboard',  [
            'pengantar' => $pengantar,
            'permohonan' => $permohonan,
            'persetujuan' => $persetujuan,
            'izin' => $izin,
            'kematian_pasangan' => $kematian_pasangan,
            'kelahiran' => $kelahiran,
            'keluarga' => $keluarga,
            'ayah' => $ayah,
            'ibu' => $ibu,
            'kematian' => $kematian,
        ]);

        
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pegawai  $Pegawai
     * @return \Illuminate\Http\Response
     */
    public function show(Pegawai $Pegawai)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pegawai  $Pegawai
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $Request)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pegawai  $Pegawai
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pegawai $keluargas)
    {
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pegawai  $Pegawai
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
    }
}
