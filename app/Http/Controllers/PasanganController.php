<?php

namespace App\Http\Controllers;

use App\Models\Pasangan;
use App\Models\Keluarga;
use Illuminate\Http\Request;

class PasanganController extends Controller
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
            $pasangan = Pasangan::select('pasangans.*', 'keluargas.id as keluargaID', 'keluargas.nama as nama_pasangan', 'keluargas.user_id')
                        ->join('keluargas', 'keluargas.id', '=', 'pasangans.keluarga_id')
                        ->orderBy('keluargas.user_id', 'desc')
                        ->paginate(10);
            $keluarga = Keluarga::paginate(10);
        else:
            $keluarga = Keluarga::where('keluargas.user_id', \Auth::user()->id)
                        ->paginate(10);
            $pasangan = Pasangan::select('pasangans.*', 'keluargas.id as keluargaID', 'keluargas.nama as nama_pasangan', 'keluargas.user_id')
                        ->join('keluargas', 'keluargas.id', '=', 'pasangans.keluarga_id')
                        ->where('keluargas.user_id', \Auth::user()->id)
                        ->paginate(10);
        endif;

        return view('app.pasangan', [
            'pasangan' => $pasangan,
            'keluarga' => $keluarga,
            'data_request' => $data_request,
        ])->with('i', ($request->input('page', 1) - 1) * 10);
        
    }

    public function pasanganadd(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'keluarga_id' => 'required',
            'jenkel' => 'required',
            'nik' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'kewarganegaraan' => 'required',
            'agama' => 'required',
            'pekerjaan' => 'required',
            'alamat' => 'required',
            'status_nikah' => 'required',
         
        ]);

        // dd($request);
        $pasangan = new Pasangan;
        $pasangan->nama = $request->nama;
        $pasangan->keluarga_id = $request->keluarga_id;
        $pasangan->jenkel = $request->jenkel;
        $pasangan->nik = $request->nik;
        $pasangan->tempat_lahir = $request->tempat_lahir;
        $pasangan->tanggal_lahir = $request->tanggal_lahir;
        $pasangan->kewarganegaraan = $request->kewarganegaraan;
        $pasangan->agama = $request->agama;
        $pasangan->pekerjaan = $request->pekerjaan;
        $pasangan->alamat = $request->alamat;
        $pasangan->status_nikah = $request->status_nikah;
        $pasangan->save();

        if($pasangan){
            return redirect()->back()->with(['success' => 'Data Pasangan'.$request->input('nama').'berhasil disimpan']);
        }else{
            return redirect()->back()->with(['danger' => 'Data Tidak Terekam!']);
        }
    }

    public function pasanganedit(Request $request)
    {
        $pasangan = Pasangan::findOrFail($request->get('id'));
        echo json_encode($pasangan);
    }

    public function pasanganupdate(Request $request, Pasangan $pasangan)
    {
        $request->validate([
            'nama' => 'required',
            'keluarga_id' => 'required',
            'jenkel' => 'required',
            'nik' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'kewarganegaraan' => 'required',
            'agama' => 'required',
            'pekerjaan' => 'required',
            'alamat' => 'required',
            'status_nikah' => 'required',
         
        ]);

        // dd($request);
        $pasangan = Pasangan::find($request->id);
        $pasangan->nama = $request->nama;
        $pasangan->keluarga_id = $request->keluarga_id;
        $pasangan->jenkel = $request->jenkel;
        $pasangan->nik = $request->nik;
        $pasangan->tempat_lahir = $request->tempat_lahir;
        $pasangan->tanggal_lahir = $request->tanggal_lahir;
        $pasangan->kewarganegaraan = $request->kewarganegaraan;
        $pasangan->agama = $request->agama;
        $pasangan->pekerjaan = $request->pekerjaan;
        $pasangan->alamat = $request->alamat;
        $pasangan->status_nikah = $request->status_nikah;
        $pasangan->update();

        if($pasangan){
            return redirect()->back()->with(['success' => 'Data Keluarga'.$request->input('nama').'berhasil disimpan']);
        }else{
            return redirect()->back()->with(['danger' => 'Data Tidak Terekam!']);
        }
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
    public function update(Request $request, Pegawai $pasangans)
    {
        $this->validate($request, [
            'nama' => 'required',
            'jenkel' => 'required',
            'tanggal_lahir' => 'required',
            'nik' => 'required',
            'tanggal_masuk' => 'required',
            'alamat' => 'required',
            ]);
   
        $pegawai = Pasangan::find($request->id);
        $pegawai->nama = $request->nama;
        $pegawai->jenkel = $request->jenkel;
        $pegawai->tanggal_lahir = $request->tanggal_lahir;
        $pegawai->nik = $request->nik;
        $pegawai->tanggal_masuk = $request->tanggal_masuk;
        $pegawai->alamat = $request->alamat;
        $pegawai->nohp = $request->nohp;
        $pegawai->update();
        // $pasangans->update($request->all());

        if($pasangans){
            return redirect()->back()->with(['success' => 'Data Pegawai'.$request->input('nama').'berhasil disimpan']);
        }else{
            return redirect()->back()->with(['danger' => 'Data Tidak Terekam!']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pegawai  $Pegawai
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pasangans = Pasangan::where('id', $id)
              ->delete();
        return redirect()->back()
                        ->with('success','Post deleted successfully');
    }
}


