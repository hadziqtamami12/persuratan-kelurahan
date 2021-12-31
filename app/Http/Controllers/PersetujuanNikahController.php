<?php

namespace App\Http\Controllers;
use App\Models\Keluarga;
use App\Models\Pasangan;
use App\Models\Ayah;
use App\Models\Ibu;
use App\Models\Persetujuan_nikah;
use Illuminate\Http\Request;
use PDF;

class PersetujuanNikahController extends Controller
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
            $persetujuan = Persetujuan_nikah::select('persetujuan_nikahs.*', 'keluargas.nama', 'keluargas.nik', 'pasangans.nama', 'pasangans.nik')
                        ->join('pasangans', 'pasangans.id', '=', 'persetujuan_nikahs.pasangan_id')
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
            $persetujuan = Persetujuan_nikah::select('persetujuan_nikahs.*', 'keluargas.nama', 'keluargas.nik', 'pasangans.nama', 'pasangans.nik')
                        ->join('pasangans', 'pasangans.id', '=', 'persetujuan_nikahs.pasangan_id')
                        ->join('keluargas', 'keluargas.id', '=', 'pasangans.keluarga_id')
                        ->where('keluargas.user_id', \Auth::user()->id)
                        ->paginate(10);
        endif;

        return view('app.persetujuan', [
            'persetujuan' => $persetujuan,
            'pasangan' => $pasangan,
            'keluarga' => $keluarga,
            'data_request' => $data_request,
        ])->with('i', ($request->input('page', 1) - 1) * 10);
        
    }

    public function persetujuanadd(Request $request)
    {
        $request->validate([
            'pasangan_id' => 'required',
            
        ]);

        // dd($request);
        $data_pasangan = Pasangan::where('id', $request->pasangan_id)->first();
        $persetujuan = new Persetujuan_nikah;
        $persetujuan->pasangan_id = $request->pasangan_id;
        $persetujuan->keluarga_id = $data_pasangan->keluarga_id;
        $persetujuan->save();
        // dd($persetujuan);

        if($persetujuan){
            return redirect()->back()->with(['success' => 'Data persetujuan'.$request->input('nama').'berhasil disimpan']);
        }else{
            return redirect()->back()->with(['danger' => 'Data Tidak Terekam!']);
        }
    }

    public function persetujuanedit(Request $request)
    {
        $persetujuan = Persetujuan_nikah::findOrFail($request->get('id'));
        echo json_encode($persetujuan);
    }

    public function persetujuanupdate(Request $request, Persetujuan_nikah $persetujuan)
    {
        $request->validate([
            'pasangan_id' => 'required',
         
        ]);

        // dd($request);
        $data_pasangan = Pasangan::where('id', $request->pasangan_id)->first();
        $persetujuan = Persetujuan_nikah::find($request->id);
        $persetujuan->pasangan_id = $request->pasangan_id;
        $persetujuan->keluarga_id = $data_pasangan->keluarga_id;
        $persetujuan->update();

        if($persetujuan){
            return redirect()->back()->with(['success' => 'Data Keluarga'.$request->input('nama').'berhasil disimpan']);
        }else{
            return redirect()->back()->with(['danger' => 'Data Tidak Terekam!']);
        }
    }

    public function persetujuancetak($id)
    {
       
        $persetujuan = Persetujuan_nikah::where('id', $id)->first();
        $pasangan = Pasangan::where('id', $persetujuan->pasangan_id)
                        ->first();
        $keluarga = Keluarga::where('id', $persetujuan->keluarga_id)
                        ->first();
        $ayah = Ayah::where('user_id', $keluarga->user_id)
                     ->first();
        $ibu = Ibu::where('user_id', $keluarga->user_id)
                     ->first();
        
        
        view()->share('app.persetujuancetak', ['persetujuan'=> $persetujuan,'keluarga' => $keluarga, 'pasangan' => $pasangan, 'ayah' => $ayah, 'ibu' => $ibu]);
        $pdf = PDF::loadView('app.persetujuancetak', ['persetujuan'=> $persetujuan,'keluarga' => $keluarga, 'pasangan' => $pasangan, 'ayah' => $ayah, 'ibu' => $ibu])->setPaper('a4', 'potrait');
        return $pdf->stream('Surat Persetujuan Nikah.pdf');
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
    public function update(Request $request, persetujuan $persetujuan)
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
        $persetujuan = Persetujuan_nikah::where('id', $id)
              ->delete();
        return redirect()->back()
                        ->with('success','Post deleted successfully');
    }
}