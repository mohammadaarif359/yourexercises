<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class NotifyLastLoginPatient extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'notify:last-login-patient';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Notify to patient which is not login last 2 days';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        echo "run run";
        return Command::SUCCESS;
    }
}
