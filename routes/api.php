<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('/post', function (Request $request) {
    $validatedData = $request->validate([
        'title'       => 'required|max:255',
        'description' => 'required|max:255',
        'website_url' => 'required'
    ]);

    // queue_email_to_subsribers
});

Route::post('/subscription', function (Request $request) {
    $validatedData = $request->validate([
        'post_id'          => 'required',
        'subscriber_email' => 'required',
        'website_url'      => 'required'
    ]);

    // subsribe_user

});
