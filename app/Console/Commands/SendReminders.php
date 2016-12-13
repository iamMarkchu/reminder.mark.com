<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Mail;
use App\Reminder;
use DB;

class SendReminders extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'reminders:list';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
        $reminderlist = Reminder::where('status', 'serving')->get();
        $starttime = date('Y-m-d H:s');
        foreach ($reminderlist as $reminder) {
            $tmp = date('Y-m-d H:i', strtotime($reminder->enddate));
            if($starttime == $tmp){
                
            }
        }
    }
}
