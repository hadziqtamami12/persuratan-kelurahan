<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        Commands\bonusMingguan::class,
        Commands\bonusBulanan::class,
        Commands\bonusMasukLibur::class,
        Commands\getLogKehadiran::class,
        Commands\createKehadiranDummy::class,
        Commands\absenKehadiran::class,

    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // $schedule->command('inspire')->hourly();
        $schedule->command('bonus:week')->weekly();
        $schedule->command('bonus:liburmasuk')->weekly();
        $schedule->command('bonus:month')->monthly();
        $schedule->command('kehadiran:log')->everyMinute();
        // $schedule->command('kehadiran:log')->everyTenMinutes();
        $schedule->command('kehadiran:dummy')->monthly();
        $schedule->command('kehadiran:absen')->daily();
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
