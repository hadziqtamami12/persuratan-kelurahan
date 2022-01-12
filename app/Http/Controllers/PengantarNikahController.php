<?php

namespace App\Http\Controllers;
use App\Models\Keluarga;
use App\Models\Pasangan;
use App\Models\Ayah;
use App\Models\Ibu;
use App\Models\Pengantar_nikah;
use Illuminate\Http\Request;
use PDF;

class PengantarNikahController extends Controller
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
            $pengantar = Pengantar_nikah::select('pengantar_nikahs.*', 'keluargas.nama', 'keluargas.nik', 'pasangans.nama', 'pasangans.nik')
                        ->join('pasangans', 'pasangans.id', '=', 'pengantar_nikahs.pasangan_id')
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
            $pengantar = Pengantar_nikah::select('pengantar_nikahs.*', 'keluargas.nama', 'keluargas.nik', 'pasangans.nama', 'pasangans.nik')
                        ->join('pasangans', 'pasangans.id', '=', 'pengantar_nikahs.pasangan_id')
                        ->join('keluargas', 'keluargas.id', '=', 'pasangans.keluarga_id')
                        ->where('keluargas.user_id', \Auth::user()->id)
                        ->paginate(10);
        endif;

        return view('app.pengantar', [
            'pengantar' => $pengantar,
            'pasangan' => $pasangan,
            'keluarga' => $keluarga,
            'data_request' => $data_request,
        ])->with('i', ($request->input('page', 1) - 1) * 10);
        
    }

    public function pengantaradd(Request $request)
    {
        $request->validate([
            'pasangan_id' => 'required',
        ]);

        // dd($request);
        $data_pasangan = Pasangan::where('id', $request->pasangan_id)->first();
        $pengantar = new Pengantar_nikah;
        $pengantar->pasangan_id = $request->pasangan_id;
        $pengantar->keluarga_id = $data_pasangan->keluarga_id;
        $pengantar->save();
        // dd($pengantar);

        if($pengantar){
            return redirect()->back()->with(['success' => 'Data pengantar'.$request->input('nama').'berhasil disimpan']);
        }else{
            return redirect()->back()->with(['danger' => 'Data Tidak Terekam!']);
        }
    }

    public function pengantaredit(Request $request)
    {
        $pengantar = Pengantar_nikah::findOrFail($request->get('id'));
        echo json_encode($pengantar);
    }

    public function pengantarupdate(Request $request, Pengantar_nikah $pengantar)
    {
        $request->validate([
            'pasangan_id' => 'required',
        ]);

        // dd($request);
        $data_pasangan = Pasangan::where('id', $request->pasangan_id)->first();
        $pengantar = Pengantar_nikah::find($request->id);
        $pengantar->pasangan_id = $request->pasangan_id;
        $pengantar->keluarga_id = $data_pasangan->keluarga_id;
        $pengantar->update();


        if($pengantar){
            return redirect()->back()->with(['success' => 'Data Keluarga'.$request->input('nama').'berhasil disimpan']);
        }else{
            return redirect()->back()->with(['danger' => 'Data Tidak Terekam!']);
        }
    }

    public function pengantarcetak($id)
    {
       
        $pengantar = Pengantar_nikah::where('id', $id)->first();
        $pasangan = Pasangan::where('id', $pengantar->pasangan_id)
                        ->first();
        $keluarga = Keluarga::where('id', $pengantar->keluarga_id)
                        ->first();
        $ayah = Ayah::where('user_id', $keluarga->user_id)
                     ->first();
        $ibu = Ibu::where('user_id', $keluarga->user_id)
                     ->first();
        
        view()->share('app.pengantarcetak', ['pengantar'=> $pengantar,'keluarga' => $keluarga, 'pasangan' => $pasangan, 'ayah' => $ayah, 'ibu' => $ibu]);
        $pdf = PDF::loadView('app.pengantarcetak', ['pengantar'=> $pengantar,'keluarga' => $keluarga, 'pasangan' => $pasangan, 'ayah' => $ayah, 'ibu' => $ibu])->setPaper('a4', 'potrait');
        return $pdf->stream('Surat Pengantar Nikah.pdf');
       
    }

    public function pengantardetail($id)
    {
       
        $pengantar = Pengantar_nikah::where('id', $id)->first();
        $pasangan = Pasangan::where('id', $pengantar->pasangan_id)
                        ->first();
        $keluarga = Keluarga::where('id', $pengantar->keluarga_id)
                        ->first();
        $ayah = Ayah::where('user_id', $keluarga->user_id)
                     ->first();
        $ibu = Ibu::where('user_id', $keluarga->user_id)
                     ->first();

        // dd($keluarga);

        return view('app.pengantardetail', [
            'pengantar'=> $pengantar,
            'keluarga' => $keluarga, 
            'pasangan' => $pasangan, 
            'ayah' => $ayah, 
            'ibu' => $ibu,
        ]);
       
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
    public function update(Request $request, Pengantar $pengantar)
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
        $pengantar = Pengantar_nikah::where('id', $id)
              ->delete();
        return redirect()->back()
                        ->with('success','Post deleted successfully');
    }
}