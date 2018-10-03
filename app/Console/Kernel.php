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
        Commands\WordPress\ImportCommand::class,
        Commands\WordPress\MergeAllCommand::class,
        Commands\WordPress\MergeCategoryCommand::class,
        Commands\WordPress\MergeCommentCommand::class,
        Commands\WordPress\MergeMediaCommand::class,
        Commands\WordPress\MergePageCommand::class,
        Commands\WordPress\MergePostCommand::class,
        Commands\WordPress\MergeTagCommand::class,
        Commands\ReloadAllCommand::class,
        Commands\ReloadCacheCommand::class,
        Commands\ReloadDbCommand::class,
        Commands\MakeViewCommand::class,
        Commands\MakeServiceCommand::class,
        Commands\SeedDevelopmentDataCommand::class,
    ];

    /**
     * Define the application's command schedule.
     *
     * @param \Illuminate\Console\Scheduling\Schedule $schedule
     */
    protected function schedule(Schedule $schedule)
    {
        // $schedule->command('inspire')
        //          ->hourly();
    }

    /**
     * Register the commands for the application.
     */
    protected function commands()
    {
        $this->load(__DIR__ . '/Commands');

        require base_path('routes/console.php');
    }
}
