<?php

namespace App\Http\Controllers;

use App\Models\Keluarga;
use App\Models\Ortu;
use Illuminate\Http\Request;

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
        //
        $keluargas = Keluarga::paginate(10);
        $ortus = Ortu::all();
        return view('app.dashboard', [
            'keluargas' => $keluargas,
            'ortus' => $ortus
        ])->with('i', ($request->input('page', 1) - 1) * 10);
        
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
        $request->validate([
            'nama' => 'required',
            'jenkel' => 'required',
            'tanggal_lahir' => 'required',
            'nik' => 'required',
            'tanggal_masuk' => 'required',
            'alamat' => 'required',
         
        ]);

        // dd($request);
        $pegawai = new Pegawai;
        $pegawai->nama = $request->nama;
        $pegawai->jenkel = $request->jenkel;
        $pegawai->tanggal_lahir = $request->tanggal_lahir;
        $pegawai->nik = $request->nik;
        $pegawai->tanggal_masuk = $request->tanggal_masuk;
        $pegawai->alamat = $request->alamat;
        $pegawai->nohp = $request->nohp;
        $pegawai->save();

         if($pegawai){
            return redirect()->route('pegawai')->with(['success' => 'Data Pegawai'.$request->input('nama').'berhasil disimpan']);
        }else{
            return redirect()->route('pegawai')->with(['danger' => 'Data Tidak Terekam!']);
        }
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
        $keluargas = Keluarga::findOrFail($Request->get('id'));
        echo json_encode($keluargas);
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
        $this->validate($request, [
            'nama' => 'required',
            'jenkel' => 'required',
            'tanggal_lahir' => 'required',
            'nik' => 'required',
            'tanggal_masuk' => 'required',
            'alamat' => 'required',
            ]);
   
        $pegawai = Keluarga::find($request->id);
        $pegawai->nama = $request->nama;
        $pegawai->jenkel = $request->jenkel;
        $pegawai->tanggal_lahir = $request->tanggal_lahir;
        $pegawai->nik = $request->nik;
        $pegawai->tanggal_masuk = $request->tanggal_masuk;
        $pegawai->alamat = $request->alamat;
        $pegawai->nohp = $request->nohp;
        $pegawai->update();
        // $keluargas->update($request->all());

        if($keluargas){
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
        $keluargas = Keluarga::where('id', $id)
              ->delete();
        return redirect()->back()
                        ->with('success','Post deleted successfully');
    }
}
