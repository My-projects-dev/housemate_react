<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Announcement;

class ResetStatus extends Command
{
    protected $signature = 'status:reset';
    protected $description = 'Statuses automatically set to 0 after 1 month';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        Announcement::where('status', 1)
            ->where('updated_at', '<', now()->subMonth())
            ->update(['status' => '0']);

        $this->info('Statuses reset successfully.');
    }
}
