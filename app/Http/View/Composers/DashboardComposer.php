<?php

namespace App\Http\View\Composers;

// use App\Faker;
use Illuminate\View\View;
use App\Models\Pengantar_nikah;
use App\Models\Permohonan_nikah;
use App\Models\Persetujuan_nikah;
use App\Models\Izin_nikah;
use App\Models\Kematian_pasangan;
use App\Models\Kelahiran;
use App\Models\Kematian;

class DashboardComposer
{
    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        
            $dashboard = [
                'pengantar' => Pengantar_nikah::select('pengantar_nikahs.*', 'pengantar_nikahs.created_at as waktu', 'keluargas.nama as nama', 'keluargas.id')->whereDate('pengantar_nikahs.created_at', date('Y-m-d'))->join('keluargas', 'keluargas.id', '=', 'pengantar_nikahs.keluarga_id')->get(),
                'permohonan' => Permohonan_nikah::select('permohonan_nikahs.*', 'permohonan_nikahs.created_at as waktu', 'keluargas.nama as nama', 'keluargas.id')->whereDate('permohonan_nikahs.created_at', date('Y-m-d'))->join('keluargas', 'keluargas.id', '=', 'permohonan_nikahs.keluarga_id')->get(),
                'persetujuan' => Persetujuan_nikah::select('persetujuan_nikahs.*', 'persetujuan_nikahs.created_at as waktu', 'keluargas.nama as nama', 'keluargas.id')->whereDate('persetujuan_nikahs.created_at', date('Y-m-d'))->join('keluargas', 'keluargas.id', '=', 'persetujuan_nikahs.keluarga_id')->get(),
                'izin' => Izin_nikah::select('izin_nikahs.*', 'izin_nikahs.created_at as waktu', 'keluargas.nama as nama', 'keluargas.id')->whereDate('izin_nikahs.created_at', date('Y-m-d'))->join('keluargas', 'keluargas.id', '=', 'izin_nikahs.keluarga_id')->get(),
                'kematian_pasangan' => Kematian_pasangan::select('kematian_pasangans.*', 'kematian_pasangans.created_at as waktu', 'keluargas.nama as nama', 'keluargas.id')->whereDate('kematian_pasangans.created_at', date('Y-m-d'))->join('keluargas', 'keluargas.id', '=', 'kematian_pasangans.keluarga_id')->get(),
                'kelahiran' => Kelahiran::select('kelahirans.*', 'kelahirans.created_at as waktu', 'keluargas.nama as nama', 'keluargas.id')->whereDate('kelahirans.created_at', date('Y-m-d'))->join('keluargas', 'keluargas.id', '=', 'kelahirans.keluarga_id')->get(),
            ];
        $view->with('dashboard', $dashboard);
    }
}