<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     */
    protected function schedule(Schedule $schedule): void
    {
        // $schedule->command('generate:roll-number-slips')->daily();
        // $schedule->command('jobpost:update-status')->hourly();
        $schedule->command('jobpost:update-status')->daily();
        // $schedule->command('jobpost:update-status')->daily()->environments(['local']);
    }

    /**
     * Register the commands for the application.
     */
    protected function commands(): void
    {
        $this->load(__DIR__ . '/Commands');

        // Load additional console routes if needed
        require base_path('routes/console.php');
    }
}
