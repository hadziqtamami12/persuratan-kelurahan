<?php

namespace App\Console\Commands;
use Illuminate\Console\Command;

use App\Models\Kehadiran;
use App\Models\Pegawai;
use App\Models\Jadwal;
use App\Models\Pola;
use App\Models\Temporary;
use App\Models\Lembur;
use App\Models\Pengecualian;
use App\Models\Komponen_gaji;
use Carbon\Carbon;

class bonusMasukLibur extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'bonus:liburmasuk';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Schedule penamabahan data bonus masuk ketika libur pegawai';

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
                $tanggal_akhir = date('Y-m-d', strtotime('+6 day', strtotime($tanggal_awal)));
            elseif (date('d') <= 14):
                $tanggal_awal = date('Y-m-d', strtotime('+7 day', strtotime('first day of this month')));
                $tanggal_akhir = date('Y-m-d', strtotime('+6 day', strtotime($tanggal_awal)));
            elseif (date('d') <= 21):
                $tanggal_awal = date('Y-m-d', strtotime('+14 day', strtotime('first day of this month')));
                $tanggal_akhir = date('Y-m-d', strtotime('+6 day', strtotime($tanggal_awal)));
            elseif (date('d') <= date('t')):
                $tanggal_awal = date('Y-m-d', strtotime('+21 day', strtotime('first day of this month')));
                $tanggal_akhir = date('Y-m-d', strtotime('+6 day', strtotime($tanggal_awal)));
            endif;
            
    
    
            foreach ($pegawais as $p):
                $range = Kehadiran::whereBetween('tanggal', [$tanggal_awal ,$tanggal_akhir])
                ->where('pegawai_id', $p->id)
                ->get();
                foreach ($range as $item):
                    $jadwals = Jadwal::where('tanggal', $item->tanggal)
                    ->where('pegawai_id', $p->id)
                    ->orderBy('tanggal', 'desc')
                    ->orderBy('pegawai_id', 'asc')->get();
                    $polas = Pola::findOrFail($jadwals[0]->pola_id);
                    $countDate = Kehadiran::whereBetween('tanggal', [$tanggal_awal ,$tanggal_akhir])
                        ->where('jam_masuk', '<=' ,$polas['jam_masuk'])
                        ->where('jam_istirahat', '>=' ,$polas['jam_istirahat'])
                        ->where('jam_masuk_istirahat', '<=' ,$polas['jam_istirahat_masuk'])
                        ->where('jam_pulang', '>=' ,$polas['jam_pulang'])
                        ->where('pegawai_id', $p->id)
                        ->get()->count('pegawai_id');
                endforeach;
                if ($countDate == 7):
                    $temporary_in = new Temporary;
                    $temporary_in->tanggal = Carbon::now();
                    $temporary_in->status = 'in-bonus-masuk-libur';
                    $temporary_in->pegawai_id = $p->id;
                    $temporary_in->nominal = $komponen_gaji[0]->nominal;
                    $temporary_in->save();
                else:
                    continue;
                endif;
            endforeach;

            $this->info('Data bonus Pegawai masuk ketika libur berhasil ditambahkan');
    
    }
}
