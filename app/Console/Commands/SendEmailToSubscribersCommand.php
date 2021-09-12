<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class SendEmailToSubscribersCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:send-email-to-subscribers';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Notify by email a subscriber about a new post';

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
        
        $mail_action = \Mail::to('your_receiver_email@gmail.com')->send(new \App\Mail\SubscriberNotificationMail([
            'website_url' => $this->argument('website_url'),
            'title' => $this->argument('title'),
            'description' => $this->argument('description')
        ]));
        return 0;
    }
}
