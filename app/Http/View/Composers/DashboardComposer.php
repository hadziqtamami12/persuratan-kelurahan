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
                'pengantar' => Pengantar_nikah::select('pengantar_nikahs.*', 'pengantar_nikahs.created_at as waktu', 'keluargas.nama as nama', 'keluargas.id')->whereMonth('pengantar_nikahs.created_at', date('m'))->join('keluargas', 'keluargas.id', '=', 'pengantar_nikahs.keluarga_id')->get(),
                'permohonan' => Permohonan_nikah::select('permohonan_nikahs.*', 'permohonan_nikahs.created_at as waktu', 'keluargas.nama as nama', 'keluargas.id')->whereMonth('permohonan_nikahs.created_at', date('m'))->join('keluargas', 'keluargas.id', '=', 'permohonan_nikahs.keluarga_id')->get(),
                'persetujuan' => persetujuan_nikah::select('persetujuan_nikahs.*', 'persetujuan_nikahs.created_at as waktu', 'keluargas.nama as nama', 'keluargas.id')->whereMonth('persetujuan_nikahs.created_at', date('m'))->join('keluargas', 'keluargas.id', '=', 'persetujuan_nikahs.keluarga_id')->get(),
            ];
        $view->with('dashboard', $dashboard);
    }
}