<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('/post', function (Request $request) {
    $validatedData = $request->validate([
        'id'          => ['required', 'unique:posts', 'max:255'],
        'title'       => ['required'],
        'description' => ['required'],
        'content'     => ['required'],
    ]);


});

Route::post('/subscription', function (Request $request) {
    $validatedData = $request->validate([
        'post_id'          => ['required', 'unique:posts', 'max:255'],
        'subscriber_id'    => ['required']
    ]);


});
