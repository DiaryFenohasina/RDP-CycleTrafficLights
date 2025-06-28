<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    protected $cron = [
        'App\Console\Commands\Traffic',
    ];
    /**
     * Define the application's command schedule.
     */

    protected function schedule(Schedule $schedule): void
    {
        $schedule->command('app:traffic');
    }
    protected function commands()
    {
        $this->load(__DIR__ . '/Commands');

        require base_path('routes/console.php');
    }
}