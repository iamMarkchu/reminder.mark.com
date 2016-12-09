<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Mail;

class SendReminders extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'reminders:send';

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
        //dump(config('mail'));die;
        Mail::raw('这是一封测试邮件', function ($message) {
            $to = 'markchu@megainformationtech.com.com';
            $message ->to($to)->subject('测试邮件');
        });
    }
}
