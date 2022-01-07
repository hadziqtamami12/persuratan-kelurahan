<?php

namespace App\Http\Controllers;
use App\Models\Dokumen_nikah;
use App\Models\Keluarga;
use Illuminate\Http\Request;

class DokumenNikahController extends Controller
{
    public function index(Request $request)
    {
        $data_request = $request->all();
        if (\Auth::check() && \Auth::user()->role == 'su'):
            $keluarga = Keluarga::orderBy('user_id', 'desc')->paginate(10);
            $dokumen = Dokumen_nikah::orderBy('user_id', 'desc')->paginate(10);
        else:
            $keluarga = Keluarga::where('user_id', \Auth::user()->id)->paginate(10);
            $dokumen = Dokumen_nikah::where('user_id', \Auth::user()->id)->paginate(10);
        endif;
        return view('app.dokumen_nikah', [
            'keluarga' => $keluarga,
            'dokumen' => $dokumen,
            'data_request' => $data_request,
        ])->with('i', ($request->input('page', 1) - 1) * 10);
        
    }

    public function dokumen_nikahadd(Request $request)
    {
        $request->validate([
            'keluarga_id' => 'required',
            
        ]);

        $dokumen = new Dokumen_nikah;
        $dokumen->keluarga_id = $request->keluarga_id;
        $dokumen->pengantar = $request->pengantar;
        $dokumen->ktp = $request->ktp;
        $dokumen->kk = $request->kk;
        $dokumen->kk_calon = $request->kk_calon;
        $dokumen->foto = $request->foto;
        $dokumen->foto_calon = $request->foto_calon;
        $dokumen->ijazah = $request->ijazah;
        $dokumen->surat_pernyataan = $request->surat_pernyataan;
        $dokumen->bukti_pajak = $request->bukti_pajak;
        $dokumen->save();

        if($dokumen){
            return redirect()->back()->with(['success' => 'Data dokumen Nikah'.$request->input('nama').'berhasil disimpan']);
        }else{
            return redirect()->back()->with(['danger' => 'Data Tidak Terekam!']);
        }
    }
}
