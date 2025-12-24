<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class CheckQueueStatus extends Command
{
    protected $signature = 'queue:status';
    protected $description = 'Check the status of the queue';

    public function handle()
    {
        $pendingJobs = DB::table('jobs')->count();
        $failedJobs = DB::table('failed_jobs')->count();

        $this->info("📊 Queue Status:");
        $this->line("Pending jobs: {$pendingJobs}");
        $this->line("Failed jobs: {$failedJobs}");

        if ($pendingJobs > 0) {
            $this->warn("⚠️  There are {$pendingJobs} jobs waiting in the queue.");
        }

        if ($failedJobs > 0) {
            $this->error("❌ There are {$failedJobs} failed jobs. Run 'php artisan queue:failed' to see them.");
        }

        return 0;
    }
}
