<?php

namespace App\Http\Controllers;

use App\Models\Kematian_pasangan;
use App\Models\Keluarga;
use App\Models\Pasangan;
use App\Models\Ayah;
use App\Models\Ibu;
use Illuminate\Http\Request;
use PDF;


class KematianPasanganController extends Controller
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
            $kematian_pasangans = Kematian_pasangan::select('kematian_pasangans.*', 'keluargas.id as keluargaID', 'keluargas.nama as nama_pasangan', 'keluargas.user_id')
                        ->join('pasangans', 'pasangans.id', '=', 'kematian_pasangans.pasangan_id')
                        ->join('keluargas', 'keluargas.id', '=', 'kematian_pasangans.keluarga_id')
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
            $kematian_pasangans = Kematian_pasangan::select('kematian_pasangans.*', 'keluargas.id as keluargaID', 'keluargas.nama as nama_pasangan', 'keluargas.user_id')
                        ->join('pasangans', 'pasangans.id', '=', 'kematian_pasangans.pasangan_id')
                        ->join('keluargas', 'keluargas.id', '=', 'kematian_pasangans.keluarga_id')
                        ->where('keluargas.user_id', \Auth::user()->id)
                        ->paginate(10);
        endif;


        return view('app.kematian_pasangan', [
            'kematian_pasangan' => $kematian_pasangans,
            'keluarga' => $keluarga,
            'pasangan' => $pasangan,
            'data_request' => $data_request,
        ])->with('i', ($request->input('page', 1) - 1) * 10);
        
    }

    public function kematian_pasangan_get_id(Request $request)
    {
        $pasangan = Pasangan::where('keluarga_id', $request->id)
                    ->get();

        return response()->json($pasangan[0]);
    }

    public function kematian_pasanganadd(Request $request)
    {
        $request->validate([
            'keluarga_id' => 'required',
            'pasangan_id' => 'required',
            'tanggal' => 'required',
            'lokasi' => 'required',
         
        ]);

        // dd($request);
        $kematian_pasangans = new Kematian_pasangan;
        $kematian_pasangans->keluarga_id = $request->keluarga_id;
        $kematian_pasangans->pasangan_id = $request->pasangan_id;
        $kematian_pasangans->tanggal = $request->tanggal;
        $kematian_pasangans->lokasi = $request->lokasi;
        $kematian_pasangans->save();

        if($kematian_pasangans){
            return redirect()->back()->with(['success' => 'Data Kematian Pasangan'.$request->input('nama').'berhasil disimpan']);
        }else{
            return redirect()->back()->with(['danger' => 'Data Tidak Terekam!']);
        }
    }

    public function kematian_pasanganedit(Request $request)
    {
        $kematian_pasangans = Kematian_pasangan::findOrFail($request->get('id'));
        echo json_encode($kematian_pasangans);
    }

    public function kematian_pasanganupdate(Request $request, Kematian_pasangan $kematian_pasangans)
    {

        $request->validate([
            'keluarga_id' => 'required',
            'pasangan_id' => 'required',
            'tanggal' => 'required',
            'lokasi' => 'required',
         
        ]);

        

        $kematian_pasangans = Kematian_pasangan::find($request->id);
        $kematian_pasangans->keluarga_id = $request->keluarga_id;
        $kematian_pasangans->pasangan_id = $request->pasangan_id;
        $kematian_pasangans->tanggal = $request->tanggal;
        $kematian_pasangans->lokasi = $request->lokasi;
        $kematian_pasangans->update();

        if($kematian_pasangans){
            return redirect()->back()->with(['success' => 'Data Keluarga'.$request->input('nama').'berhasil disimpan']);
        }else{
            return redirect()->back()->with(['danger' => 'Data Tidak Terekam!']);
        }
    }

    public function kematian_pasangancetak($id)
    {
       
        $kematian_pasangan = Kematian_pasangan::where('id', $id)->first();
        $pasangan = Pasangan::where('id', $kematian_pasangan->pasangan_id)
                        ->first();
        $keluarga = Keluarga::where('id', $kematian_pasangan->keluarga_id)
                        ->first();
        $ayah = Ayah::where('user_id', $keluarga->user_id)
                     ->first();
        $ibu = Ibu::where('user_id', $keluarga->user_id)
                     ->first();
        
        
        view()->share('app.kematian_pasangancetak', ['kematian_pasangan'=> $kematian_pasangan,'keluarga' => $keluarga, 'pasangan' => $pasangan, 'ayah' => $ayah, 'ibu' => $ibu]);
        $pdf = PDF::loadView('app.kematian_pasangancetak', ['kematian_pasangan'=> $kematian_pasangan,'keluarga' => $keluarga, 'pasangan' => $pasangan, 'ayah' => $ayah, 'ibu' => $ibu])->setPaper('a4', 'potrait');
        return $pdf->stream('Surat Kematian Pasangan.pdf');
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
    public function update(Request $request, Pegawai $kematian_pasangans)
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
        $kematian_pasangans = Kematian_pasangan::where('id', $id)
              ->delete();
        return redirect()->back()
                        ->with('success','Post deleted successfully');
    }
}


