<?php

namespace App\Http\Controllers;
use App\Models\Dokumen_nikah;
use App\Models\Keluarga;
use Illuminate\Http\Request;
use File;
use Storage;

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
            if (!empty($keluarga)):
                $dokumen = Dokumen_nikah::select('dokumen_nikahs.*', 'keluargas.id as keluargaID', 'keluargas.nama as nama_keluarga')->join('keluargas', 'keluargas.id', '=', 'dokumen_nikahs.keluarga_id')
                            ->where('keluargas.user_id', \Auth::user()->id)->paginate(10);
            endif;
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

        if ($request->hasFile('pengantar')) {
            $extension = $request->file('pengantar')->getClientOriginalExtension();
            // Filename To store
            $fileNameToStore = 'pengantar_'. $request->keluarga_id .'.'.$extension;
            $pengantar = $request->file('pengantar')->storeAs('pengantar', $fileNameToStore, 'public');
            }
       if ($request->hasFile('ktp')) {
            $extension = $request->file('ktp')->getClientOriginalExtension();
            // Filename To store
            $fileNameToStore = 'ktp_'. $request->keluarga_id .'.'.$extension;
            $ktp = $request->file('ktp')->storeAs('ktp', $fileNameToStore, 'public');
            }
        if ($request->hasFile('kk')) {
            $extension = $request->file('kk')->getClientOriginalExtension();
            // Filename To store
            $fileNameToStore = 'kk_'. $request->keluarga_id .'.'.$extension;
            $kk = $request->file('kk')->storeAs('kk', $fileNameToStore, 'public');
            }
        if ($request->hasFile('kk_calon')) {
            $extension = $request->file('kk_calon')->getClientOriginalExtension();
            // Filename To store
            $fileNameToStore = 'kk_calon_'. $request->keluarga_id .'.'.$extension;
            $kk_calon = $request->file('kk_calon')->storeAs('kk_calon', $fileNameToStore, 'public');
            }
        if ($request->hasFile('foto')) {
            $extension = $request->file('foto')->getClientOriginalExtension();
            // Filename To store
            $fileNameToStore = 'foto_'. $request->keluarga_id .'.'.$extension;
            $foto = $request->file('foto')->storeAs('foto', $fileNameToStore, 'public');
            }
        if ($request->hasFile('foto_calon')) {
            $extension = $request->file('foto_calon')->getClientOriginalExtension();
            // Filename To store
            $fileNameToStore = 'foto_calon_'. $request->keluarga_id .'.'.$extension;
            $foto_calon = $request->file('foto_calon')->storeAs('foto_calon', $fileNameToStore, 'public');
            }
        if ($request->hasFile('ijazah')) {
           $extension = $request->file('ijazah')->getClientOriginalExtension();
            // Filename To store
            $fileNameToStore = 'ijazah_'. $request->keluarga_id .'.'.$extension;
            $ijazah = $request->file('ijazah')->storeAs('ijazah', $fileNameToStore, 'public');
            }
        if ($request->hasFile('surat_pernyataan')) {
            $extension = $request->file('surat_pernyataan')->getClientOriginalExtension();
            // Filename To store
            $fileNameToStore = 'surat_pernyataan_'. $request->keluarga_id .'.'.$extension;
            $surat_pernyataan = $request->file('surat_pernyataan')->storeAs('surat_pernyataan', $fileNameToStore, 'public');
            }
        if ($request->hasFile('bukti_pajak')) {
            $extension = $request->file('bukti_pajak')->getClientOriginalExtension();
            // Filename To store
            $fileNameToStore = 'bukti_pajak_'. $request->keluarga_id .'.'.$extension;
            $bukti_pajak = $request->file('bukti_pajak')->storeAs('bukti_pajak', $fileNameToStore, 'public');
            }
        // Else add a dummy dokumen
        else {
            $path = 'Nophoto.jpg';
        }

        $dokumen = new Dokumen_nikah;
        $dokumen->keluarga_id = $request->keluarga_id;
        $dokumen->pengantar = $request->pengantar ? $pengantar : null;
        $dokumen->ktp = $request->ktp ? $ktp : null;
        $dokumen->kk = $request->kk ? $ktp : null;
        $dokumen->kk_calon = $request->kk_calon ? $kk_calon : null;
        $dokumen->foto = $request->foto ? $foto : null;
        $dokumen->foto_calon = $request->foto_calon ? $foto_calon : null;
        $dokumen->ijazah = $request->ijazah ? $ijazah : null;
        $dokumen->surat_pernyataan = $request->surat_pernyataan ? $surat_pernyataan : null;
        $dokumen->bukti_pajak = $request->bukti_pajak ? $bukti_pajak : null;
        $dokumen->save();

        if($dokumen){
            return redirect()->back()->with(['success' => 'Data dokumen Nikah'.$request->input('nama').'berhasil disimpan']);
        }else{
            return redirect()->back()->with(['danger' => 'Data Tidak Terekam!']);
        }
    }


    public function dokumen_nikahedit(Request $request)
    {
        $dokumen = Dokumen_nikah::findOrFail($request->get('id'));
        echo json_encode($dokumen);
    }

    public function dokumen_nikahupdate(Request $request, Dokumen_nikah $dokumen)
    {
        $request->validate([
            'keluarga_id' => 'required',
            
        ]);

        $dokumen = Dokumen_nikah::find($request->id);


        if ($request->hasFile('pengantar_edit') ) {
            
            $imagePath = public_path('storage/'.$dokumen->pengantar);
            if(Storage::exists($imagePath)){
                unlink($imagePath);
            }
            $extension = $request->file('pengantar_edit')->getClientOriginalExtension();
            // Filename To store
            $fileNameToStore = 'pengantar_'. $request->keluarga_id .'.'.$extension;
            $pengantar = $request->file('pengantar_edit')->storeAs('pengantar', $fileNameToStore, 'public');
            
            $dokumen->pengantar = $request->pengantar_edit ? $pengantar : $dokumen->pengantar;

        }
       if ($request->hasFile('ktp_edit')) {
           $imagePath = public_path('storage/'.$dokumen->ktp);
            if(Storage::exists($imagePath)){
                unlink($imagePath);
            }
           $extension = $request->file('ktp_edit')->getClientOriginalExtension();
           // Filename To store
           $fileNameToStore = 'ktp_'. $request->keluarga_id .'.'.$extension;
           $ktp = $request->file('ktp_edit')->storeAs('ktp', $fileNameToStore, 'public');
           
           $dokumen->ktp = $request->ktp_edit ? $ktp : $dokumen->ktp;
        }
        if ($request->hasFile('kk_edit')) {
            $imagePath = public_path('storage/'.$dokumen->kk);
            if(Storage::exists($imagePath)){
                unlink($imagePath);
            }
            $extension = $request->file('kk_edit')->getClientOriginalExtension();
            // Filename To store
            $fileNameToStore = 'kk_'. $request->keluarga_id .'.'.$extension;
            $kk = $request->file('kk_edit')->storeAs('kk', $fileNameToStore, 'public');

            $dokumen->kk = $request->kk_edit ? $kk : $dokumen->kk;

        }
        if ($request->hasFile('kk_calon_edit')) {
            $imagePath = public_path('storage/'.$dokumen->kk_calon);
            if(Storage::exists($imagePath)){
                unlink($imagePath);
            }
            $extension = $request->file('kk_calon_edit')->getClientOriginalExtension();
            // Filename To store
            $fileNameToStore = 'kk_calon_'. $request->keluarga_id .'.'.$extension;
            $kk_calon = $request->file('kk_calon_edit')->storeAs('kk_calon', $fileNameToStore, 'public');

            $dokumen->kk_calon = $request->kk_calon_edit ? $kk_calon : $dokumen->kk_calon;
        }
        if ($request->hasFile('foto_edit')) {
            $imagePath = public_path('storage/'.$dokumen->foto);
            if(Storage::exists($imagePath)){
                unlink($imagePath);
            }
            $extension = $request->file('foto_edit')->getClientOriginalExtension();
            // Filename To store
            $fileNameToStore = 'foto_'. $request->keluarga_id .'.'.$extension;
            $foto = $request->file('foto_edit')->storeAs('foto', $fileNameToStore, 'public');

            $dokumen->foto = $request->foto_edit ? $foto : $dokumen->foto;
        }
        if ($request->hasFile('foto_calon_edit')) {
            $imagePath = public_path('storage/'.$dokumen->foto_calon);
            if(Storage::exists($imagePath)){
                unlink($imagePath);
            }
            $extension = $request->file('foto_calon_edit')->getClientOriginalExtension();
            // Filename To store
            $fileNameToStore = 'foto_calon_'. $request->keluarga_id .'.'.$extension;
            $foto_calon = $request->file('foto_calon_edit')->storeAs('foto_calon', $fileNameToStore, 'public');

            $dokumen->foto_calon = $request->foto_calon_edit ? $foto_calon : $dokumen->foto_calon;
        }
        if ($request->hasFile('ijazah_edit')) {
            $imagePath = public_path('storage/'.$dokumen->ijazah);
            if(Storage::exists($imagePath)){
                unlink($imagePath);
            }
           $extension = $request->file('ijazah_edit')->getClientOriginalExtension();
            // Filename To store
            $fileNameToStore = 'ijazah_'. $request->keluarga_id .'.'.$extension;
            $ijazah = $request->file('ijazah_edit')->storeAs('ijazah', $fileNameToStore, 'public');

            $dokumen->ijazah = $request->ijazah_edit ? $ijazah : $dokumen->ijazah;
        }
        if ($request->hasFile('surat_pernyataan_edit')) {
            $imagePath = public_path('storage/'.$dokumen->surat_pernyataan);
            if(Storage::exists($imagePath)){
                unlink($imagePath);
            }
            $extension = $request->file('surat_pernyataan_edit')->getClientOriginalExtension();
            // Filename To store
            $fileNameToStore = 'surat_pernyataan_'. $request->keluarga_id .'.'.$extension;
            $surat_pernyataan = $request->file('surat_pernyataan_edit')->storeAs('surat_pernyataan', $fileNameToStore, 'public');

            $dokumen->surat_pernyataan = $request->surat_pernyataan_edit ? $surat_pernyataan : $dokumen->surat_pernyataan;
        }
        if ($request->hasFile('bukti_pajak_edit')) {
            $imagePath = public_path('storage/'.$dokumen->bukti_pajak);
            if(Storage::exists($imagePath)){
                unlink($imagePath);
            }
            $extension = $request->file('bukti_pajak_edit')->getClientOriginalExtension();
            // Filename To store
            $fileNameToStore = 'bukti_pajak_'. $request->keluarga_id .'.'.$extension;
            $bukti_pajak = $request->file('bukti_pajak_edit')->storeAs('bukti_pajak', $fileNameToStore, 'public');

            $dokumen->bukti_pajak = $request->bukti_pajak_edit ? $bukti_pajak : $dokumen->bukti_pajak;
        }
        // Else add a dummy dokumen
        else {
            $path = 'Nophoto.jpg';
        }

        
        $dokumen->keluarga_id = $request->keluarga_id;
        $dokumen->update();
        

        if($dokumen){
            return redirect()->back()->with(['success' => 'Data dokumen Nikah'.$request->input('nama').'berhasil disimpan']);
        }else{
            return redirect()->back()->with(['danger' => 'Data Tidak Terekam!']);
        }
    }
}
