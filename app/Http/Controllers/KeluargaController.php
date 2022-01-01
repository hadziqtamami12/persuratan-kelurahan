<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\Keluarga;
use App\Models\User;
use Illuminate\Http\Request;

class KeluargaController extends Controller
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
        $data_request = $request->all();
        if (\Auth::check() && \Auth::user()->role == 'su'):
            $keluarga = Keluarga::orderBy('user_id', 'desc')->paginate(10);
            $user = User::all();
        else:
            $keluarga = Keluarga::where('user_id', \Auth::user()->id)->paginate(10);
            $user = User::all();
        endif;
        return view('app.keluarga', [
            'keluarga' => $keluarga,
            'user' => $user,
            'data_request' => $data_request,
        ])->with('i', ($request->input('page', 1) - 1) * 10);
        
    }

    public function keluargaadd(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'nik' => 'required',
            'jenkel' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'kewarganegaraan' => 'required',
            'agama' => 'required',
            'pekerjaan' => 'required',
            'alamat' => 'required',
            'status_nikah' => 'required',
         
        ]);

        // dd($request);
        $keluarga = new Keluarga;
        $keluarga->nama = $request->nama;
        $keluarga->nik = $request->nik;
        $keluarga->jenkel = $request->jenkel;
        $keluarga->tempat_lahir = $request->tempat_lahir;
        $keluarga->tanggal_lahir = $request->tanggal_lahir;
        $keluarga->kewarganegaraan = $request->kewarganegaraan;
        $keluarga->agama = $request->agama;
        $keluarga->pekerjaan = $request->pekerjaan;
        $keluarga->alamat = $request->alamat;
        $keluarga->status_nikah = $request->status_nikah;
        $keluarga->user_id = $request->user_id;
        $keluarga->save();

        if($keluarga){
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
     * @param  \App\Models\Keluarga  $Keluarga
     * @return \Illuminate\Http\Response
     */
    public function show(Keluarga $Keluarga)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Keluarga  $Keluarga
     * @return \Illuminate\Http\Response
     */
    public function keluargaedit(Request $Request)
    {
        $keluargas = Keluarga::findOrFail($Request->get('id'));
        echo json_encode($keluargas);
    }

    public function keluargaupdate(Request $request, Keluarga $keluarga)
    {
        $request->validate([
            'nama' => 'required',
            'nik' => 'required',
            'jenkel' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'kewarganegaraan' => 'required',
            'agama' => 'required',
            'pekerjaan' => 'required',
            'alamat' => 'required',
            'status_nikah' => 'required',
         
        ]);

        // dd($request);
        $keluarga = Keluarga::find($request->id);
        $keluarga->nama = $request->nama;
        $keluarga->nik = $request->nik;
        $keluarga->jenkel = $request->jenkel;
        $keluarga->tempat_lahir = $request->tempat_lahir;
        $keluarga->tanggal_lahir = $request->tanggal_lahir;
        $keluarga->kewarganegaraan = $request->kewarganegaraan;
        $keluarga->agama = $request->agama;
        $keluarga->pekerjaan = $request->pekerjaan;
        $keluarga->alamat = $request->alamat;
        $keluarga->status_nikah = $request->status_nikah;
        $keluarga->user_id = $request->user_id;
        $keluarga->update();

        if($keluarga){
            return redirect()->back()->with(['success' => 'Data Keluarga'.$request->input('nama').'berhasil disimpan']);
        }else{
            return redirect()->back()->with(['danger' => 'Data Tidak Terekam!']);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Keluarga  $Keluarga
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Keluarga $keluargas)
    {
       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Keluarga  $Keluarga
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

