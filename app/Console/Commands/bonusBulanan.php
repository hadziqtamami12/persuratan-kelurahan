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

class bonusBulanan extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'bonus:month';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Schedule penamabahan data bonus bulanan pegawai';


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
        
        foreach ($pegawais as $p):
            $countDate = Temporary::whereYear('tanggal', date('Y'))
            ->whereMonth('tanggal', date('m'))
            ->where('pegawai_id', $p->id)
            ->get()->count();
            
            if ($countDate == 4):
                //add bonus mingguan to temporary tabel
                $temporary_in = new Temporary;
                $temporary_in->tanggal = Carbon::now();
                $temporary_in->status = 'in-bonus-bulanan';
                $temporary_in->pegawai_id = $p->id;
                $temporary_in->nominal = $komponen_gaji[1]->nominal;
                $temporary_in->save();
            else:
                continue;
            endif;
        endforeach;

        $this->info('Data bonus bulanan Pegawai berhasil ditambahkan');
    }
}
