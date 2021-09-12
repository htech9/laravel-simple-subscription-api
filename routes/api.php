<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('/post', function (Request $request) {
    $validatedData = $request->validate([
        'title'       => 'required|max:255',
        'description' => 'required|max:255',
        'website_url' => 'required'
    ]);

    // ensure that the subscription is not a duplicate

    // queue_email_to_subsribers
    $exitCode = Artisan::call('app:send-email-to-subscribers', [
        'website_url' => $validatedData['website_url'],
        'title' => $validatedData['title'],
        'description' => $validatedData['description'],
        '--queue' => 'default'
    ]);
});

Route::post('/subscription', function (Request $request) {
    $validatedData = $request->validate([
        'post_id'          => 'required',
        'subscriber_email' => 'required',
        'website_url'      => 'required'
    ]);

    // subscribe_user
    Subscriber::
});
