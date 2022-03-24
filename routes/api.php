<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Models\{Website, Post, Subscriber};
use App\Http\Controllers\{PostController, SubscriptionController};

Route::post('/post', [PostController::class, 'store']);

Route::post('/subscription', [SubscriptionController::class, 'store']);
