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

class getLogKehadiran extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'kehadiran:log';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Get Log Data Kehadiran Pegawai';

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
        $zk = new ZKTeco('192.168.22.71', 4370);
        $zk->connect();
        $zk->disableDevice();
        $users = $zk->getUser();
        $att = $zk->getAttendance();
        $zk2 = new ZKTeco('192.168.22.73', 4370);
        $zk2->connect();
        $zk2->disableDevice();
        $att2 = $zk2->getAttendance();
        $hariini = date('Y-m-d');
            
        foreach ($users as $u):
            $data = Kehadiran::where('tanggal', $hariini)
            ->where('pegawai_id', $u['userid'])
            ->first();
            if ($data == null):
                continue;
            else:
                $jadwals = Jadwal::where('tanggal', $hariini)
                ->where('pegawai_id', $u['userid'])
                ->first();
                if ($jadwals != null):
                    $polas = Pola::findOrFail($jadwals->pola_id);
                else:
                    continue;
                endif;
                foreach ($att as $a):
                  
                    if(date('Y-m-d', strtotime($a['timestamp'])) == $hariini):
                        if($a['id'] != $u['userid']):
                            continue;
                        else:
                            $time = date('H:i', strtotime($a['timestamp']));
                            $data->tanggal = date('Y-m-d', strtotime($a['timestamp']));
                            $data->pegawai_id = $u['userid'];

                            if ($polas->nama == 'PS' || $polas->nama == 'ps'):
                                if ($data->jam_masuk == null && $time <= date('H:i', strtotime($polas->jam_masuk.'+60 minute'))):
                                    $data->jam_masuk = $time;
                                
                                elseif ($data->jam_istirahat == null  && $time >= date('H:i', strtotime($polas->jam_istirahat.'-30 minute')) && $time < date('H:i', strtotime('15:00')) ):
                                    $data->jam_istirahat = $time;
                                
                                elseif ($data->jam_masuk_istirahat == null && $time >= date('H:i', strtotime('15:00')) && $time <= date('H:i', strtotime($polas->jam_istirahat_masuk.'+30 minute')) ):
                                    $data->jam_masuk_istirahat = $time;
                                
                                elseif ($data->jam_pulang == null  && $time >= date('H:i', strtotime($polas->jam_pulang.'-30 minute')) && $time <= date('H:i', strtotime($polas->jam_pulang.'+60 minute')) ):
                                    $data->jam_pulang = $time;
                                endif;
                            else:
                                if ($data->jam_masuk == null && $time <= date('H:i', strtotime($polas->jam_masuk.'+60 minute'))):
                                    $data->jam_masuk = $time;
                                
                                elseif ($data->jam_istirahat == null  && $time >= date('H:i', strtotime($polas->jam_istirahat.'-30 minute')) && $time < date('H:i', strtotime($polas->jam_istirahat.'+30 minute')) ):
                                    $data->jam_istirahat = $time;
                                
                                elseif ($data->jam_masuk_istirahat == null && $time >= date('H:i', strtotime($polas->jam_istirahat_masuk.'-35 minute')) && $time <= date('H:i', strtotime($polas->jam_istirahat_masuk.'+30 minute')) ):
                                    $data->jam_masuk_istirahat = $time;
                                
                                elseif ($data->jam_pulang == null  && $time >= date('H:i', strtotime($polas->jam_pulang.'-30 minute')) && $time <= date('H:i', strtotime($polas->jam_pulang.'+60 minute')) ):
                                    $data->jam_pulang = $time;
                                endif;
                            endif;

                            // if ($data->jam_masuk == null && $time <= $polas->jam_masuk  && $time > date('H:i', strtotime($polas->jam_masuk.'+60 minute'))):
                            //     $data->jam_masuk = $time;
                            // elseif ($data->jam_istirahat == null  && $time <= date('H:i', strtotime($polas->jam_istirahat.'-30 minute')) && $time <= date('H:i', strtotime($polas->jam_istirahat.'+30 minute')) ):
                            //     $data->jam_istirahat = $time;
                            // elseif ($data->jam_masuk_istirahat == null && $time <= date('H:i', strtotime($polas->jam_masuk_istirahat.'-30 minute')) && $time >= date('H:i', strtotime($polas->jam_masuk_istirahat.'+30 minute'))):
                            //     $data->jam_masuk_istirahat = $time;
                            // elseif ($data->jam_pulang == null  && $time <= date('H:i', strtotime($polas->jam_pulang.'-30 minute')) && $time >= date('H:i', strtotime($polas->jam_pulang.'+60 minute')) ):
                            //     $data->jam_pulang = $time;
                            // endif;
                            // if ($data->jam_masuk == null && $time <= date('H:i', strtotime($polas->jam_masuk.'+60 minute'))):
                            //     $data->jam_masuk = $time;
                            // elseif ($data->jam_istirahat == null  && $time >= date('H:i', strtotime($polas->jam_istirahat.'-30 minute')) && $time < date('H:i', strtotime($polas->jam_istirahat.'+30 minute')) ):
                            //     $data->jam_istirahat = $time;
                            // elseif ($data->jam_masuk_istirahat == null && $time >= date('H:i', strtotime($polas->jam_istirahat_masuk.'-35 minute')) && $time <= date('H:i', strtotime($polas->jam_istirahat_masuk.'+30 minute')) ):
                            //     $data->jam_masuk_istirahat = $time;
                            // elseif ($data->jam_pulang == null  && $time >= date('H:i', strtotime($polas->jam_pulang.'-30 minute')) && $time <= date('H:i', strtotime($polas->jam_pulang.'+60 minute')) ):
                            //     $data->jam_pulang = $time;
                            // endif;
                            
                        endif;
                        $data->update();
                    endif;
                endforeach; //attedance 1
                foreach ($att2 as $a2):
                  
                    if(date('Y-m-d', strtotime($a2['timestamp'])) == $hariini):
                        if($a2['id'] != $u['userid']):
                            continue;
                        else:
                            $time = date('H:i', strtotime($a2['timestamp']));
                            $data->tanggal = date('Y-m-d', strtotime($a2['timestamp']));
                            $data->pegawai_id = $u['userid'];
  
                            if ($polas->nama == 'PS' || $polas->nama == 'ps'):
                                if ($data->jam_masuk == null && $time <= date('H:i', strtotime($polas->jam_masuk.'+60 minute'))):
                                    $data->jam_masuk = $time;
                                
                                elseif ($data->jam_istirahat == null  && $time >= date('H:i', strtotime($polas->jam_istirahat.'-30 minute')) && $time < date('H:i', strtotime('15:00')) ):
                                    $data->jam_istirahat = $time;
                                
                                elseif ($data->jam_masuk_istirahat == null && $time >= date('H:i', strtotime('15:00')) && $time <= date('H:i', strtotime($polas->jam_istirahat_masuk.'+30 minute')) ):
                                    $data->jam_masuk_istirahat = $time;
                                
                                elseif ($data->jam_pulang == null  && $time >= date('H:i', strtotime($polas->jam_pulang.'-30 minute')) && $time <= date('H:i', strtotime($polas->jam_pulang.'+60 minute')) ):
                                    $data->jam_pulang = $time;
                                endif;
                            else:
                                if ($data->jam_masuk == null && $time <= date('H:i', strtotime($polas->jam_masuk.'+60 minute'))):
                                    $data->jam_masuk = $time;
                                
                                elseif ($data->jam_istirahat == null  && $time >= date('H:i', strtotime($polas->jam_istirahat.'-30 minute')) && $time < date('H:i', strtotime($polas->jam_istirahat.'+30 minute')) ):
                                    $data->jam_istirahat = $time;
                                
                                elseif ($data->jam_masuk_istirahat == null && $time >= date('H:i', strtotime($polas->jam_istirahat_masuk.'-35 minute')) && $time <= date('H:i', strtotime($polas->jam_istirahat_masuk.'+30 minute')) ):
                                    $data->jam_masuk_istirahat = $time;
                                
                                elseif ($data->jam_pulang == null  && $time >= date('H:i', strtotime($polas->jam_pulang.'-30 minute')) && $time <= date('H:i', strtotime($polas->jam_pulang.'+60 minute')) ):
                                    $data->jam_pulang = $time;
                                endif;
                            endif;
  
                        endif;
                        $data->update();
                    endif;
                endforeach; //attedance 2
            endif;
        endforeach;

        $this->info('Data log kehadiran Pegawai berhasil ditambahkan');

    }
}
