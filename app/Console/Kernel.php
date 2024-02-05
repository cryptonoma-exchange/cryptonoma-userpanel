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
       Commands\WebSocketServer::class,
       Commands\WebSocketChatServer::class,
	   Commands\BuyTradeStatus::class,
       Commands\SellTradeStatus::class,
       Commands\MobileWebSocketServer::class,
       Commands\UpdateLivePrice::class,
       Commands\BinanceSocket::class,
       Commands\UpdateBinanceRules::class
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
		$schedule->command('update:buytrade')->everyFiveMinutes()->withoutOverlapping();
        $schedule->command('update:selltrade')->everyFiveMinutes()->withoutOverlapping();
        $schedule->command('update:binance_rules')->daily()->withoutOverlapping();
        $schedule->command('update:live_price')->everyFiveMinutes()->withoutOverlapping();
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
