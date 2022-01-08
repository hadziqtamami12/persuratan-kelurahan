<?php

namespace App\Http\Controllers;

use App\Models\Kelahiran;
use App\Models\Keluarga;
use App\Models\Pasangan;
use App\Models\Ayah;
use App\Models\Ibu;
use Illuminate\Http\Request;
use PDF;

class KelahiranController extends Controller
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
            $kelahiran = Kelahiran::select('kelahirans.*', 'keluargas.id as keluargaID', 'pasangans.nama as nama_pasangan', 'keluargas.user_id')
                        ->join('keluargas', 'keluargas.id', '=', 'kelahirans.keluarga_id')
                        ->join('pasangans', 'pasangans.keluarga_id', '=', 'kelahirans.keluarga_id')
                        ->orderBy('keluargas.user_id', 'desc')
                        ->paginate(10);
            $keluarga = Keluarga::paginate(10);
        else:
            $keluarga = Keluarga::where('keluargas.user_id', \Auth::user()->id)
                        ->paginate(10);
            $kelahiran = Kelahiran::select('kelahirans.*', 'keluargas.id as keluargaID', 'pasangans.nama as nama_pasangan', 'keluargas.user_id')
                        ->join('keluargas', 'keluargas.id', '=', 'kelahirans.keluarga_id')
                        ->join('pasangans', 'pasangans.keluarga_id', '=', 'kelahirans.keluarga_id')
                        ->where('keluargas.user_id', \Auth::user()->id)
                        ->paginate(10);
        endif;

        return view('app.kelahiran', [
            'kelahiran' => $kelahiran,
            'keluarga' => $keluarga,
            'data_request' => $data_request,
        ])->with('i', ($request->input('page', 1) - 1) * 10);
        
    }

    public function kelahiranadd(Request $request)
    {
        $request->validate([
            'keluarga_id' => 'required',
            'nama' => 'required',
            'jenkel' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'alamat' => 'required',
            'anak_ke' => 'required',
            'nama_pelapor' => 'required',
            'hubungan_pelapor' => 'required',
            'no_kk' => 'required',
            'nama_penyalin' => 'required',
            'status_penyalin' => 'required',
            'jenkel_penyalin' => 'required',
         
        ]);

        // dd($request);
        $kelahiran = new Kelahiran;
        $kelahiran->nama = $request->nama;
        $kelahiran->nama_pelapor = $request->nama_pelapor;
        $kelahiran->keluarga_id = $request->keluarga_id;
        $kelahiran->jenkel = $request->jenkel;
        $kelahiran->hubungan_pelapor = $request->hubungan_pelapor;
        $kelahiran->tempat_lahir = $request->tempat_lahir;
        $kelahiran->tanggal_lahir = $request->tanggal_lahir;
        $kelahiran->anak_ke = $request->anak_ke;
        $kelahiran->no_kk = $request->no_kk;
        $kelahiran->nama_penyalin = $request->nama_penyalin;
        $kelahiran->alamat = $request->alamat;
        $kelahiran->status_penyalin = $request->status_penyalin;
        $kelahiran->jenkel_penyalin = $request->jenkel_penyalin;
        $kelahiran->save();

        if($kelahiran){
            return redirect()->back()->with(['success' => 'Data kelahiran'.$request->input('nama').'berhasil disimpan']);
        }else{
            return redirect()->back()->with(['danger' => 'Data Tidak Terekam!']);
        }
    }

    public function kelahiranedit(Request $request)
    {
        $kelahiran = Kelahiran::findOrFail($request->get('id'));
        echo json_encode($kelahiran);
    }

    public function kelahiranupdate(Request $request, Kelahiran $kelahiran)
    {
        $request->validate([
            'nama' => 'required',
            'nama_pelapor' => 'required',
            'keluarga_id' => 'required',
            'jenkel' => 'required',
            'hubungan_pelapor' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'anak_ke' => 'required',
            'no_kk' => 'required',
            'nama_penyalin' => 'required',
            'alamat' => 'required',
            'status_penyalin' => 'required',
            'jenkel_penyalin' => 'required',

         
        ]);

        // dd($request);
        $kelahiran = Kelahiran::find($request->id);
        $kelahiran->nama = $request->nama;
        $kelahiran->nama_pelapor = $request->nama_pelapor;
        $kelahiran->keluarga_id = $request->keluarga_id;
        $kelahiran->jenkel = $request->jenkel;
        $kelahiran->hubungan_pelapor = $request->hubungan_pelapor;
        $kelahiran->tempat_lahir = $request->tempat_lahir;
        $kelahiran->tanggal_lahir = $request->tanggal_lahir;
        $kelahiran->anak_ke = $request->anak_ke;
        $kelahiran->no_kk = $request->no_kk;
        $kelahiran->nama_penyalin = $request->nama_penyalin;
        $kelahiran->alamat = $request->alamat;
        $kelahiran->status_penyalin = $request->status_penyalin;
        $kelahiran->jenkel_penyalin = $request->jenkel_penyalin;
        $kelahiran->update();

        if($kelahiran){
            return redirect()->back()->with(['success' => 'Data Keluarga'.$request->input('nama').'berhasil disimpan']);
        }else{
            return redirect()->back()->with(['danger' => 'Data Tidak Terekam!']);
        }
    }

    public function kelahirancetak($id)
    {
       
        $kelahiran = Kelahiran::where('id', $id)->first();
        $keluarga = Keluarga::where('id', $kelahiran->keluarga_id)
        ->first();
        $pasangan = Pasangan::where('keluarga_id', $kelahiran->keluarga_id)
                        ->first();
        $ayah = Ayah::where('user_id', $keluarga->user_id)
                     ->first();
        $ibu = Ibu::where('user_id', $keluarga->user_id)
                     ->first();

        if($keluarga->jenkel == 'laki-laki'):
            $data_bapak = $keluarga;
            $data_ibu = $pasangan;
        else:
            $data_bapak = $pasangan;
            $data_ibu = $keluarga;
        endif;
        
        $customPaper = array(0,0,793,1200);
        view()->share('app.kelahirancetak', ['data_bapak' => $data_bapak , 'data_ibu' => $data_ibu , 'kelahiran'=> $kelahiran,'keluarga' => $keluarga, 'pasangan' => $pasangan, 'ayah' => $ayah, 'ibu' => $ibu]);
        $pdf = PDF::loadView('app.kelahirancetak', ['data_bapak' => $data_bapak , 'data_ibu' => $data_ibu , 'kelahiran'=> $kelahiran,'keluarga' => $keluarga, 'pasangan' => $pasangan, 'ayah' => $ayah, 'ibu' => $ibu])->setPaper($customPaper, 'landscape');
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
    public function update(Request $request, Pegawai $kelahirans)
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
        $kelahirans = Kelahiran::where('id', $id)
              ->delete();
        return redirect()->back()
                        ->with('success','Post deleted successfully');
    }
}


