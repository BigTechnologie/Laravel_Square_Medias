<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use EsperoSoft\Artisan\Console\Commands\MakeEntityCommand;
use EsperoSoft\Artisan\Console\Commands\MakeCrudCommand;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     */
    protected function schedule(Schedule $schedule): void
    {
        // $schedule->command('inspire')->hourly();
    }

    /**
     * Register the commands for the application.
     */
    protected function commands(): void
    {
        $this->load(__DIR__.'/Commands');
          // Registering the MakeEntityCommand as a ClosureCommand
        $this->getArtisan()->add( new MakeEntityCommand() );
         // Registering the MakeCrudCommand as a ClosureCommand
        $this->getArtisan()->add( new MakeCrudCommand() );

        require base_path('routes/console.php');
    }
}
