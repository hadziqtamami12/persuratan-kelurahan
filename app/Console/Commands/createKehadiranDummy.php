<?php

namespace App\Console\Commands;
use Illuminate\Console\Command;

use Rats\Zkteco\Lib\ZKTeco;
use App\Models\Fingerprint;
use App\Models\Kehadiran;
use App\Models\Pegawai;
use App\Models\Jabatan;
use App\Models\Jadwal;
use App\Models\Pola;


class createKehadiranDummy extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'kehadiran:dummy';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create Dummy Data Kehadiran Pegawai';

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
        $pegawais = Pegawai::all();
        $batas_tanggal = date('t');
        for ($i = 0; $i < $batas_tanggal; $i++):
            foreach ($pegawais as $item):
                $data = new Kehadiran;
                $data->tanggal = date('Y-m-d', strtotime('+'.$i.' day', strtotime('first day of this month')));
                $data->pegawai_id = $item->id;
                $data->jam_masuk = null;
                $data->jam_istirahat = null;
                $data->jam_masuk_istirahat = null;
                $data->jam_pulang = null;
                $data->save();
            endforeach;
        endfor;

        $this->info('Data kehadiran dummy Pegawai berhasil ditambahkan');
    }
}
