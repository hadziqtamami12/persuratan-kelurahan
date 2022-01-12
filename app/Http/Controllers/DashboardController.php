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
use PDF;



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

        $surat = array("Surat Pengantar","Surat Permohonan","Surat Persetujuan","Surat Izin","Surat Kematian Pasangan","Surat Kelahiran","Surat Kematian");
        $bulan = array("Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember");

        if (\Auth::check() && \Auth::user()->role == 'su'):
            if ($request->filter_bulan != null):
                $filter_bulan = $request->filter_bulan;
            else:
                $filter_bulan = date('m');
            endif;
            $keluarga = Keluarga::whereMonth('created_at', $filter_bulan)->whereYear('created_at', date('Y'))->get();
            $ayah = Ayah::whereMonth('created_at', $filter_bulan)->whereYear('created_at', date('Y'))->get();
            $ibu = Ibu::whereMonth('created_at', $filter_bulan)->whereYear('created_at', date('Y'))->get();
            $pengantar = Pengantar_nikah::whereMonth('created_at', $filter_bulan)->whereYear('created_at', date('Y'))->get();
            $permohonan = Permohonan_nikah::whereMonth('created_at', $filter_bulan)->whereYear('created_at', date('Y'))->get();
            $persetujuan = Persetujuan_nikah::whereMonth('created_at', $filter_bulan)->whereYear('created_at', date('Y'))->get();
            $izin = Izin_nikah::whereMonth('created_at', $filter_bulan)->whereYear('created_at', date('Y'))->get();
            $kematian_pasangan = Kematian_pasangan::whereMonth('created_at', $filter_bulan)->whereYear('created_at', date('Y'))->get();
            $kelahiran = Kelahiran::whereMonth('created_at', $filter_bulan)->whereYear('created_at', date('Y'))->get();
            $kematian = Kematian::whereMonth('created_at', $filter_bulan)->whereYear('created_at', date('Y'))->get();
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
            'bulan' => $bulan,
            'surat' => $surat,
        ]);

    }

    public function rekap(Request $request)
    {

        $surat = array("Surat Pengantar","Surat Permohonan","Surat Persetujuan","Surat Izin","Surat Kematian Pasangan","Surat Kelahiran","Surat Kematian");
        $bulan = array("Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember");

        if (\Auth::check() && \Auth::user()->role == 'su'):
            if ($request->filter_bulan != null):
                $filter_bulan = $request->filter_bulan;
            else:
                $filter_bulan = date('m');
            endif;
            $keluarga = Keluarga::whereMonth('created_at', $filter_bulan)->whereYear('created_at', date('Y'))->get();
            $ayah = Ayah::whereMonth('created_at', $filter_bulan)->whereYear('created_at', date('Y'))->get();
            $ibu = Ibu::whereMonth('created_at', $filter_bulan)->whereYear('created_at', date('Y'))->get();
            $pengantar = Pengantar_nikah::whereMonth('created_at', $filter_bulan)->whereYear('created_at', date('Y'))->get();
            $permohonan = Permohonan_nikah::whereMonth('created_at', $filter_bulan)->whereYear('created_at', date('Y'))->get();
            $persetujuan = Persetujuan_nikah::whereMonth('created_at', $filter_bulan)->whereYear('created_at', date('Y'))->get();
            $izin = Izin_nikah::whereMonth('created_at', $filter_bulan)->whereYear('created_at', date('Y'))->get();
            $kematian_pasangan = Kematian_pasangan::whereMonth('created_at', $filter_bulan)->whereYear('created_at', date('Y'))->get();
            $kelahiran = Kelahiran::whereMonth('created_at', $filter_bulan)->whereYear('created_at', date('Y'))->get();
            $kematian = Kematian::whereMonth('created_at', $filter_bulan)->whereYear('created_at', date('Y'))->get();
        
        endif;

        return view('app.rekap',  [
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
            'bulan' => $bulan,
            'surat' => $surat,
        ]);

    }


    public function filterdashboard(Request $request)
    {
        if (\Auth::check() && \Auth::user()->role == 'su'):
            if ($request->filter_bulan != null):
                $filter_bulan = $request->filter_bulan;
            else:
                $filter_bulan = date('m');
            endif;
            $pengantar = Pengantar_nikah::whereMonth('created_at', $filter_bulan)->whereYear('created_at', date('Y'))->count('id');
            $permohonan = Permohonan_nikah::whereMonth('created_at', $filter_bulan)->whereYear('created_at', date('Y'))->count('id');
            $persetujuan = Persetujuan_nikah::whereMonth('created_at', $filter_bulan)->whereYear('created_at', date('Y'))->count('id');
            $izin = Izin_nikah::whereMonth('created_at', $filter_bulan)->whereYear('created_at', date('Y'))->count('id');
            $kematian_pasangan = Kematian_pasangan::whereMonth('created_at', $filter_bulan)->whereYear('created_at', date('Y'))->count('id');
            $kelahiran = Kelahiran::whereMonth('created_at', $filter_bulan)->whereYear('created_at', date('Y'))->count('id');
            $kematian = Kematian::whereMonth('created_at', $filter_bulan)->whereYear('created_at', date('Y'))->count('id');
            $data = array($pengantar, $permohonan, $persetujuan, $izin, $kematian_pasangan, $kelahiran, $kematian);
        endif;

        // dd($pengantar);

        echo json_encode($data);
    }

    public function rekapcetak(Request $request)
    {
        $surat = array("Surat Pengantar","Surat Permohonan","Surat Persetujuan","Surat Izin","Surat Kematian Pasangan","Surat Kelahiran","Surat Kematian");
        $bulan = array("Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember");

            foreach ($bulan as $b => $bulans):
                $filter_bulan = $b+1;
                $pengantar = Pengantar_nikah::whereMonth('created_at', $filter_bulan)->whereYear('created_at', date('Y'))->count('id');
                $permohonan = Permohonan_nikah::whereMonth('created_at', $filter_bulan)->whereYear('created_at', date('Y'))->count('id');
                $persetujuan = Persetujuan_nikah::whereMonth('created_at', $filter_bulan)->whereYear('created_at', date('Y'))->count('id');
                $izin = Izin_nikah::whereMonth('created_at', $filter_bulan)->whereYear('created_at', date('Y'))->count('id');
                $kematian_pasangan = Kematian_pasangan::whereMonth('created_at', $filter_bulan)->whereYear('created_at', date('Y'))->count('id');
                $kelahiran = Kelahiran::whereMonth('created_at', $filter_bulan)->whereYear('created_at', date('Y'))->count('id');
                $kematian = Kematian::whereMonth('created_at', $filter_bulan)->whereYear('created_at', date('Y'))->count('id');
                $data[$b] = array($pengantar, $permohonan, $persetujuan, $izin, $kematian_pasangan, $kelahiran, $kematian);
            endforeach;

            // dd($data);


        view()->share('app.rekapcetak', [
                    'pengantar' => $pengantar,
                    'permohonan' => $permohonan,
                    'persetujuan' => $persetujuan,
                    'izin' => $izin,
                    'kematian_pasangan' => $kematian_pasangan,
                    'kelahiran' => $kelahiran,
                    'kematian' => $kematian,
                    'bulan' => $bulan,
                    'surat' => $surat,
                    'data' => $data,
                    ]);
        $pdf = PDF::loadView('app.rekapcetak', [
                    'pengantar' => $pengantar,
                    'permohonan' => $permohonan,
                    'persetujuan' => $persetujuan,
                    'izin' => $izin,
                    'kematian_pasangan' => $kematian_pasangan,
                    'kelahiran' => $kelahiran,
                    'kematian' => $kematian,
                    'bulan' => $bulan,
                    'surat' => $surat,
                    'data' => $data,
                    ])->setPaper('a4', 'potrait');
        return $pdf->stream('Rekap Surat Tahun ' . date('Y'). '.pdf');
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
