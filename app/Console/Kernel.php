<?php

namespace App\Console;


use Illuminate\Foundation\Http\Kernel as HttpKernel;
use Illuminate\Console\Scheduling\Schedule; // Ajoute cette ligne
class Kernel extends HttpKernel
{


protected $commands = [
    \App\Console\Commands\ExportMaterielsToCSV::class,
];

protected function schedule(Schedule $schedule)
{
    // Schedule tasks here
}

protected function commands()
{
    $this->load(__DIR__.'/Commands');

    require base_path('routes/console.php');
}


}
