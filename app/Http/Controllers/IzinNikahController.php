<?php

namespace App\Http\Controllers;
use App\Models\Keluarga;
use App\Models\Pasangan;
use App\Models\Ayah;
use App\Models\Ibu;
use App\Models\Izin_nikah;
use Illuminate\Http\Request;
use PDF;

class IzinNikahController extends Controller
{
   
    //
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data_request = $request->all();
        if (\Auth::check() && \Auth::user()->role == 'su'):
            $izin = Izin_nikah::select('izin_nikahs.*', 'keluargas.nama', 'keluargas.nik', 'pasangans.nama', 'pasangans.nik')
                        ->join('pasangans', 'pasangans.id', '=', 'izin_nikahs.pasangan_id')
                        ->join('keluargas', 'keluargas.id', '=', 'pasangans.keluarga_id')
                        ->paginate(10);
            $keluarga = Keluarga::paginate(10);
            $pasangan = Pasangan::select('pasangans.*', 'keluargas.id as keluargaID', 'keluargas.nama as nama_pasangan', 'keluargas.user_id')
                        ->join('keluargas', 'keluargas.id', '=', 'pasangans.keluarga_id')
                        ->paginate(10);
        else:
            $keluarga = Keluarga::where('keluargas.user_id', \Auth::user()->id)
                        ->paginate(10);
            $pasangan = Pasangan::select('pasangans.*', 'keluargas.id as keluargaID', 'keluargas.nama as nama_pasangan', 'keluargas.user_id')
                        ->join('keluargas', 'keluargas.id', '=', 'pasangans.keluarga_id')
                        ->where('keluargas.user_id', \Auth::user()->id)
                        ->paginate(10);
            $izin = Izin_nikah::select('izin_nikahs.*', 'keluargas.nama', 'keluargas.nik', 'pasangans.nama', 'pasangans.nik')
                        ->join('pasangans', 'pasangans.id', '=', 'izin_nikahs.pasangan_id')
                        ->join('keluargas', 'keluargas.id', '=', 'pasangans.keluarga_id')
                        ->where('keluargas.user_id', \Auth::user()->id)
                        ->paginate(10);
        endif;

        return view('app.izin', [
            'izin' => $izin,
            'pasangan' => $pasangan,
            'keluarga' => $keluarga,
            'data_request' => $data_request,
        ])->with('i', ($request->input('page', 1) - 1) * 10);
        
    }

    public function izinadd(Request $request)
    {
        $request->validate([
            'pasangan_id' => 'required',
            
        ]);

        // dd($request);
        $data_pasangan = Pasangan::where('id', $request->pasangan_id)->first();
        $izin = new izin_nikah;
        $izin->pasangan_id = $request->pasangan_id;
        $izin->keluarga_id = $data_pasangan->keluarga_id;
        $izin->save();
        // dd($izin);

        if($izin){
            return redirect()->back()->with(['success' => 'Data izin Nikah'.$request->input('nama').'berhasil disimpan']);
        }else{
            return redirect()->back()->with(['danger' => 'Data Tidak Terekam!']);
        }
    }

    public function izinedit(Request $request)
    {
        $izin = Izin_nikah::findOrFail($request->get('id'));
        echo json_encode($izin);
    }

    public function izinupdate(Request $request, Izin_nikah $izin)
    {
        $request->validate([
            'pasangan_id' => 'required',
         
        ]);

        // dd($request);
        $data_pasangan = Pasangan::where('id', $request->pasangan_id)->first();
        $izin = Izin_nikah::find($request->id);
        $izin->pasangan_id = $request->pasangan_id;
        $izin->keluarga_id = $data_pasangan->keluarga_id;
        $izin->update();

        if($izin){
            return redirect()->back()->with(['success' => 'Data Keluarga'.$request->input('nama').'berhasil disimpan']);
        }else{
            return redirect()->back()->with(['danger' => 'Data Tidak Terekam!']);
        }
    }

    public function izincetak($id)
    {
       
        $izin = Izin_nikah::where('id', $id)->first();
        $pasangan = Pasangan::where('id', $izin->pasangan_id)
                        ->first();
        $keluarga = Keluarga::where('id', $izin->keluarga_id)
                        ->first();
        $ayah = Ayah::where('user_id', $keluarga->user_id)
                     ->first();
        $ibu = Ibu::where('user_id', $keluarga->user_id)
                     ->first();
        
        
        view()->share('app.izincetak', ['izin'=> $izin,'keluarga' => $keluarga, 'pasangan' => $pasangan, 'ayah' => $ayah, 'ibu' => $ibu]);
        $pdf = PDF::loadView('app.izincetak', ['izin'=> $izin,'keluarga' => $keluarga, 'pasangan' => $pasangan, 'ayah' => $ayah, 'ibu' => $ibu])->setPaper('a4', 'potrait');
        return $pdf->stream('Surat izin Nikah.pdf');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
    public function update(Request $request, izin $izin)
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
        $izin = Izin_nikah::where('id', $id)
              ->delete();
        return redirect()->back()
                        ->with('success','Post deleted successfully');
    }
}