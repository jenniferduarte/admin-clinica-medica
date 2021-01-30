<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        //
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        # Apaga todos os horários disponíveis para marcação de consulta que estão vagos
        # e que já passaram da data corrente menos 2 dias
        $schedule->call(function () {
            DB::table('schedules')
                ->where('end_date', '<', Carbon::now()->subDays(2))
                ->where('vacant', 1)->delete();
        })->dailyAt('23:59')->emailOutputTo('eu@jenniferduarte.dev');

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
