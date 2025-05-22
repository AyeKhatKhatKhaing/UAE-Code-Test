<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class TestCronJob extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'run-cron-job';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Cron Job Running ...';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        Log::info('Cron job executed successfully at ' . now());
    }
}
