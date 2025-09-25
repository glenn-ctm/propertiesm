<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;

class DeleteOnetimeUsers extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'one-time-users:delete';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Delete all One-time users after a month of registration';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        User::regulars()->where('created_at', '>=', now()->subDays(30)->toDateTimeString())->delete();
    }
}
