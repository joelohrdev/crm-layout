<?php

namespace App\Console\Commands;

use App\Models\Domain;
use Carbon\Carbon;
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
        $expiredDomains = Domain::whereNotNull('expires')
            ->where('expires', '<=', Carbon::yesterday())
            ->get();

        if($expiredDomains) {
            foreach($expiredDomains as $ed) {
                $daysAgo = Carbon::parse($ed->expires)->diffForHumans();
                SlackAlert::message("{$ed->name} expired {$daysAgo}! ⚠️");
            }
        }
    }
}
