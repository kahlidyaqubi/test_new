<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use DB;

class SendEmails extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:send_emails';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send Emails Task Schedual';

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
     * @return mixed
     */
    public function handle()
    {
        DB::table('admin')->update(['updated_at'=>date('Y-m-d')]);
    }
}
