<?php

namespace App\Http\Controllers;

use App\Models\Ayah;
use App\Models\Ibu;
use Illuminate\Http\Request;

class OrtuController extends Controller
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
            $ayah = Ayah::orderBy('user_id', 'desc')->paginate(10);
            $ibu = Ibu::orderBy('user_id', 'desc')->paginate(10);
        else:
            $ayah = Ayah::where('user_id', \Auth::user()->id)->get();
            $ibu = Ibu::where('user_id', \Auth::user()->id)->get();
        endif;

        return view('app.ortu', [
            'ayah' => $ayah,
            'ibu' => $ibu,
            'data_request' => $data_request
        ])->with('i', ($request->input('page', 1) - 1) * 20);
        
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

    public function ayahadd(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'nik' => 'required',
            'bin' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'kewarganegaraan' => 'required',
            'agama' => 'required',
            'pekerjaan' => 'required',
            'alamat' => 'required',
         
        ]);

        // dd($request);
        $ayah = new Ayah;
        $ayah->nama = $request->nama;
        $ayah->bin = $request->bin;
        $ayah->nik = $request->nik;
        $ayah->tempat_lahir = $request->tempat_lahir;
        $ayah->tanggal_lahir = $request->tanggal_lahir;
        $ayah->kewarganegaraan = $request->kewarganegaraan;
        $ayah->agama = $request->agama;
        $ayah->pekerjaan = $request->pekerjaan;
        $ayah->alamat = $request->alamat;
        $ayah->user_id = $request->user_id;
        $ayah->save();

        if($ayah){
            return redirect()->back()->with(['success' => 'Data'.$request->input('nama').'berhasil disimpan']);
        }else{
            return redirect()->back()->with(['danger' => 'Data Tidak Terekam!']);
        }
    }

    

    public function ibuadd(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'nik' => 'required',
            'bin' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'kewarganegaraan' => 'required',
            'agama' => 'required',
            'pekerjaan' => 'required',
            'alamat' => 'required',
         
        ]);

        $ibu = new Ibu;
        $ibu->nama = $request->nama;
        $ibu->bin = $request->bin;
        $ibu->nik = $request->nik;
        $ibu->tempat_lahir = $request->tempat_lahir;
        $ibu->tanggal_lahir = $request->tanggal_lahir;
        $ibu->kewarganegaraan = $request->kewarganegaraan;
        $ibu->agama = $request->agama;
        $ibu->pekerjaan = $request->pekerjaan;
        $ibu->alamat = $request->alamat;
        $ibu->user_id = $request->user_id;
        $ibu->save();

        if($ibu){
            return redirect()->back()->with(['success' => 'Data'.$request->input('nama').'berhasil disimpan']);
        }else{
            return redirect()->back()->with(['danger' => 'Data Tidak Terekam!']);
        }
    }

    public function ayahget(Request $request)
    {
        $ayah = Ayah::where('user_id', $request->user_id)->first();
        echo json_encode($ayah);
    }
    public function ibuget(Request $request)
    {
        $ibu = Ibu::where('user_id', $request->user_id)->first();
        echo json_encode($ibu);
    }

    public function ayahedit(Request $request)
    {
        $ayah = Ayah::findOrFail($request->get('id'));
        echo json_encode($ayah);
    }

    public function ibuedit(Request $request)
    {
        $ibu = Ibu::findOrFail($request->get('id'));
        echo json_encode($ibu);
    }

    public function ayahupdate(Request $request, Ayah $ayah)
    {
        $request->validate([
            'nama' => 'required',
            'nik' => 'required',
            'bin' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'kewarganegaraan' => 'required',
            'agama' => 'required',
            'pekerjaan' => 'required',
            'alamat' => 'required',
         
        ]);

        $ayah = Ayah::find($request->id);
        $ayah->update($request->all());

        if($ayah){
            return redirect()->back()->with(['success' => 'Data'.$request->input('nama').'berhasil disimpan']);
        }else{
            return redirect()->back()->with(['danger' => 'Data Tidak Terekam!']);
        }
    }

    

    public function ibuupdate(Request $request, Ibu $ibu)
    {
        $request->validate([
            'nama' => 'required',
            'nik' => 'required',
            'bin' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'kewarganegaraan' => 'required',
            'agama' => 'required',
            'pekerjaan' => 'required',
            'alamat' => 'required',
         
        ]);

        $ibu = Ibu::find($request->id);
        $ibu->update($request->all());
        
        if($ibu){
            return redirect()->back()->with(['success' => 'Data'.$request->input('nama').'berhasil disimpan']);
        }else{
            return redirect()->back()->with(['danger' => 'Data Tidak Terekam!']);
        }
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
        $ortus = Ortu::findOrFail($Request->get('id'));
        echo json_encode($ortus);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pegawai  $Pegawai
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ortu $ortus)
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
        $ortus = Ortu::where('id', $id)
              ->delete();
        return redirect()->back()
                        ->with('success','Post deleted successfully');
    }
}

