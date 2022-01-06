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

        // $dashboard = DB::table('users')
        //             ->select( 'keluargas.id', 'keluargas.user_id', 'pengantars.*', 'permohonans.*', 'persetujuans.*', 'izins.*', 'kematian_pasangans.*', 'kelahirans.*', 'kematians.*')
        //             ->join('pengantars', 'pengantars.keluarga_id', '=', 'keluargas.id')
        //             ->join('permohonans', 'permohonans.keluarga_id', '=', 'keluargas.id')
        //             ->join('persetujuans', 'persetujuans.keluarga_id', '=', 'keluargas.id')
        //             ->join('izins', 'izins.keluarga_id', '=', 'keluargas.id')
        //             ->join('kematian_pasangans', 'kematian_pasangans.keluarga_id', '=', 'keluargas.id')
        //             ->join('kelahirans', 'kelahirans.keluarga_id', '=', 'keluargas.id')
        //             ->join('kematians', 'kematians.user_id', '=', 'keluargas.user_id')
        //             ->whereMonth('created_at', date('m'))
        //             ->get();

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
