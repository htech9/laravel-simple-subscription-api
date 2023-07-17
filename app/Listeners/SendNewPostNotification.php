<?php

namespace App\Listeners;

use App\Events\PostSaved;
use App\Models\Subscription;
use App\Mail\SubscriberNotificationMail;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;

class SendNewPostNotification
{
    use InteractsWithQueue;

    /**
     * The name of the connection the job should be sent to.
     *
     * @var string|null
     */
    public $connection = 'database';
 
    /**
     * The name of the queue the job should be sent to.
     *
     * @var string|null
     */
    public $queue = 'listeners';
 
    /**
     * The time (seconds) before the job should be processed.
     *
     * @var int
     */
    public $delay = 60;

    /**
     * Handle the event.
     *
     * @param  PostSaved  $event
     * @return void
     */
    public function handle(PostSaved $event)
    {
        Log::info($event->post);

        // get subscribers
        $subscribers = Subscription::where('website', $event->post->website)->get();
        Log::info('Subscribers count: '.count($subscribers));
    
        foreach ($subscribers as $subscriber) {
            Mail::to($subscriber->email)->send(
                new SubscriberNotificationMail([
                    'website_url' => $event->post->website,
                    'title' => $event->post->title,
                    'description' => $event->post->description
                ])
            );
        }
    }
}
