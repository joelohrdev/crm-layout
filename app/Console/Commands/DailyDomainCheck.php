<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Spatie\SlackAlerts\Facades\SlackAlert;

class DailyDomainCheck extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'domain:daily';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Daily check for expired domains.';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        return SlackAlert::message('This is an automated message from the Domain Check');
    }
}
