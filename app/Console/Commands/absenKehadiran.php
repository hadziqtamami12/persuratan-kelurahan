<?php

namespace App\Console\Commands;
use Illuminate\Console\Command;

use App\Models\Kehadiran;
use App\Models\Pegawai;
use App\Models\Jadwal;
use App\Models\Temporary;
use App\Models\Libur;
use App\Models\Pengecualian;
use App\Models\Komponen_gaji;
use Carbon\Carbon;

class absenKehadiran extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'kehadiran:absen';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Get Data Punishment pegawai yang tidak hadir';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $komponen_gaji = Komponen_gaji::all();
        $pegawais = Pegawai::all();
        
        if (date('d') <= 7):
            $tanggal_awal = date('Y-m-d', strtotime('first day of this month'));
            $tanggal_akhir = date('Y-m-d', strtotime('+5 day', strtotime($tanggal_awal)));
        elseif (date('d') <= 14):
            $tanggal_awal = date('Y-m-d', strtotime('+7 day', strtotime('first day of this month')));
            $tanggal_akhir = date('Y-m-d', strtotime('+5 day', strtotime($tanggal_awal)));
        elseif (date('d') <= 21):
            $tanggal_awal = date('Y-m-d', strtotime('+14 day', strtotime('first day of this month')));
            $tanggal_akhir = date('Y-m-d', strtotime('+5 day', strtotime($tanggal_awal)));
        elseif (date('d') <= date('t')):
            $tanggal_awal = date('Y-m-d', strtotime('+21 day', strtotime('first day of this month')));
            $tanggal_akhir = date('Y-m-d', strtotime('+5 day', strtotime($tanggal_awal)));
        endif;
        


        foreach ($pegawais as $p):
            $range = Kehadiran::whereBetween('tanggal', [$tanggal_awal ,$tanggal_akhir])
            ->where('pegawai_id', $p->id)
            ->get();

            foreach ($range as $item):
                $libur = Libur::where('tanggal', $item->tanggal)
                    ->where('pegawai_id', $p->id)
                    ->get();
                $cekKehadiran = Kehadiran::where('tanggal', $item->tanggal)
                    ->where('jam_masuk', null)
                    ->where('jam_istirahat', null)
                    ->where('jam_masuk_istirahat', null)
                    ->where('jam_pulang', null)
                    ->where('pegawai_id', $p->id)
                    ->get();
                $pengecualian = Pengecualian::where('tanggal', date('Y-m-d', strtotime('-1 day', strtotime($item->tanggal))))
                ->where('pegawai_id', $p->id)
                ->get();

                $temp = Temporary::where('tanggal', $item->tanggal)
                ->where('pegawai_id', $p->id)
                ->where('status', 'out-absen-harian')
                ->get();

                if ($temp->isEmpty()):
                    if ($cekKehadiran->isEmpty()):
                        continue;
                    else:
                        if($libur->isEmpty()):
                            if($pengecualian->isEmpty()):
                                $temporary_out = new Temporary;
                                $temporary_out->tanggal = Carbon::now();
                                $temporary_out->status = 'out-absen-harian';
                                $temporary_out->pegawai_id = $p->id;
                                $temporary_out->nominal = $komponen_gaji[0]->nominal;
                                $temporary_out->save();
                            else:
                                continue;
                            endif;
                        else:
                            continue;
                        endif;
                    endif;
                endif;
            endforeach;

        endforeach;


        $this->info('Data absen kehadiran Pegawai berhasil ditambahkan');

    }
}
