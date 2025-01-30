<?php

namespace App\Console\Commands;

use App\Models\Task;
use Illuminate\Console\Command;

class UpdatePendingTasks extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:update-pending-tasks';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update pending tasks';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->info("Updating pending tasks started");
        Task::where('status', 'pending')->where('next_execute_date_time', '<', now())
            ->update(['status' => 'done']);
        $this->info("Updating pending tasks completed");
    }
}
