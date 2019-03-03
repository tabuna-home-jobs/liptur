<?php

namespace App\Console;

use App\Console\Commands\RussianTravelApi;
use App\Console\Commands\UpdatePost;
use App\Console\Commands\Weather;
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
        RussianTravelApi::class,
        UpdatePost::class,
        //Newsletter::class, // TODO: Обновить
        Weather::class,
    ];

    /**
     * Define the application's command schedule.
     *
     * @param \Illuminate\Console\Scheduling\Schedule $schedule
     *
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // $schedule->command('inspire')
        //          ->hourly();

        //$schedule->command('download:films липецк')->hourly();
        $schedule->command('weather:update')->hourly();

        $schedule->command('newsletter:send')->cron('0 12 * * 1');
        $schedule->command('newsletter:send')->cron('0 16 * * 5');

        $schedule->command('newsletter:send')->weeklyOn(1, '9:00');
        $schedule->command('newsletter:send')->weeklyOn(5, '10:00');
        $schedule->command('queue:work --daemon --once')->withoutOverlapping();
        $schedule->command('cache:clear')->hourly();
    }

    /**
     * Register the Closure based commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        require base_path('routes/console.php');
    }
}
