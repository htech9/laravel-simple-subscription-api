<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Models\{Website, Post, Subscriber};

Route::post('/post', function (Request $request) {
    $validParams = $request->validate([
        'title'       => 'required|max:255',
        'description' => 'required|max:255',
        'website_url' => 'required'
    ]);

    // save new post
    $website = Website::where('url', $validParams['website_url'])->firstOrCreate();
    $post = new Post();
    $post->website = $validParams['website_url'];
    $post->save();

    // get subscribers
    $subscribers = Subscriber::where('website', $website)->get();

    // queue_email_to_subsribers
    foreach ($subscribers as $subscriber) {
        Artisan::call('app:send-email-to-subscribers', [
            'website_url' => $subscriber->website->url,
            'title'       => $post->title,
            'description' => $post->description,
            '--queue'     => 'default'
        ]);
    }
    
});

Route::post('/subscription', function (Request $request) {
    $validParams = $request->validate([
        'subscriber_email' => 'required|email:rfc,dns',
        'website_url'      => 'required|url'
    ]);

    try {
        // ensure website exists
        $website = Website::where('url', $validParams['website_url'])->firstOrFail();

        // ensure subscriber exists
        $subscriber = Subscriber::firstOrCreate(
            ['email'   => $validParams['subscriber_email']],
            ['website' => $website]
        );
    } catch (ModelNotFoundException $ex) { // User not found
        abort(422, 'Invalid email: administrator not found');
    } catch (Exception $ex) { // Anything that went wrong
        abort(500, 'Could not create office or assign it to administrator');
    }
});
