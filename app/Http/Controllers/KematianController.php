<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\Kematian;
use App\Models\User;
use App\Models\Keluarga;
use App\Models\Pasangan;
use App\Models\Ayah;
use App\Models\Ibu;
use Illuminate\Http\Request;
use PDF;

class KematianController extends Controller
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
            $kematian = Kematian::select('kematians.*', 'ayahs.nama as nama_ayah', 'ayahs.user_id')
                        ->join('ayahs', 'ayahs.user_id', '=', 'kematians.user_id')
                        ->orderBy('kematians.user_id', 'desc')->paginate(10);
            $user = User::all();
        else:
            $kematian = Kematian::where('user_id', \Auth::user()->id)->paginate(10);
            $user = User::all();
        endif;
        return view('app.kematian', [
            'kematian' => $kematian,
            'user' => $user,
            'data_request' => $data_request,
        ])->with('i', ($request->input('page', 1) - 1) * 10);
        
    }

    public function kematianadd(Request $request)
    {
        $request->validate([
            'tanggal' => 'required',
            'nama' => 'required',
            'jenkel' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'agama' => 'required',
            'alamat' => 'required',
            'status_kawin' => 'required',
            'usia' => 'required',
            'tempat_kematian' => 'required',
            'penyebab_kematian' => 'required',
            'nama_pelapor' => 'required',
            'hubungan_pelapor' => 'required',
         
        ]);

        $kematian = new Kematian;
        $kematian->tanggal = $request->tanggal;
        $kematian->nama = $request->nama;
        $kematian->jenkel = $request->jenkel;
        $kematian->tempat_lahir = $request->tempat_lahir;
        $kematian->tanggal_lahir = $request->tanggal_lahir;
        $kematian->agama = $request->agama;
        $kematian->alamat = $request->alamat;
        $kematian->status_kawin = $request->status_kawin;
        $kematian->user_id = $request->user_id;
        $kematian->usia = $request->usia;
        $kematian->tempat_kematian = $request->tempat_kematian;
        $kematian->penyebab_kematian = $request->penyebab_kematian;
        $kematian->nama_pelapor = $request->nama_pelapor;
        $kematian->hubungan_pelapor = $request->hubungan_pelapor;
        $kematian->save();

        if($kematian){
            return redirect()->back()->with(['success' => 'Data Kematian'.$request->input('nama').'berhasil disimpan']);
        }else{
            return redirect()->back()->with(['danger' => 'Data Tidak Terekam!']);
        }
    }

    public function kematiancetak($id)
    {
       
        $kematian = Kematian::where('id', $id)->first();
        // $keluarga = Keluarga::where('id', $kematian->user_id)
        // ->first();
        // $pasangan = Pasangan::where('id', $kematian->user_id)
        //                 ->first();
        $ayah = Ayah::where('user_id', $kematian->user_id)
                     ->first();
        $ibu = Ibu::where('user_id', $kematian->user_id)
                     ->first();

        // if($keluarga->jenkel == 'laki-laki'):
        //     $data_bapak = $keluarga;
        //     $data_ibu = $pasangan;
        // else:
        //     $data_bapak = $pasangan;
        //     $data_ibu = $keluarga;
        // endif;
        
        $customPaper = array(0,0,793,1200);
        view()->share('app.kematiancetak', ['kematian'=> $kematian, 'ayah' => $ayah, 'ibu' => $ibu]);
        $pdf = PDF::loadView('app.kematiancetak', ['kematian'=> $kematian, 'ayah' => $ayah, 'ibu' => $ibu])->setPaper($customPaper, 'landscape');
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
     * @param  \App\Models\Kematian  $kematian
     * @return \Illuminate\Http\Response
     */
    public function show(Kematian $kematian)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kematian  $kematian
     * @return \Illuminate\Http\Response
     */
    public function kematianedit(Request $Request)
    {
        $kematian = Kematian::findOrFail($Request->get('id'));
        echo json_encode($kematian);
    }

    public function kematianupdate(Request $request, Kematian $kematian)
    {
        $request->validate([
            'nama' => 'required',
            'tanggal' => 'required',
            'jenkel' => 'required',
            'tempat_lahir' => 'required',
            'tanggal_lahir' => 'required',
            'agama' => 'required',
            'alamat' => 'required',
            'status_kawin' => 'required',
            'usia' => 'required',
            'tempat_kematian' => 'required',
            'penyebab_kematian' => 'required',
            'nama_pelapor' => 'required',
            'hubungan_pelapor' => 'required',
            
        ]);
        
        $kematian = Kematian::find($request->id);
        $kematian->tanggal = $request->tanggal;
        $kematian->nama = $request->nama;
        $kematian->jenkel = $request->jenkel;
        $kematian->tempat_lahir = $request->tempat_lahir;
        $kematian->tanggal_lahir = $request->tanggal_lahir;
        $kematian->agama = $request->agama;
        $kematian->pekerjaan = $request->pekerjaan;
        $kematian->status_kawin = $request->status_kawin;
        $kematian->user_id = $request->user_id;
        $kematian->usia = $request->usia;
        $kematian->tempat_kematian = $request->tempat_kematian;
        $kematian->penyebab_kematian = $request->penyebab_kematian;
        $kematian->nama_pelapor = $request->nama_pelapor;
        $kematian->hubungan_pelapor = $request->hubungan_pelapor;
        $kematian->update();

        if($kematian){
            return redirect()->back()->with(['success' => 'Data Kematian'.$request->input('nama').'berhasil disimpan']);
        }else{
            return redirect()->back()->with(['danger' => 'Data Tidak Terekam!']);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Kematian  $kematian
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kematian $kematians)
    {
       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kematian  $kematian
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kematians = Kematian::where('id', $id)
              ->delete();
        return redirect()->back()
                        ->with('success','Post deleted successfully');
    }
}

