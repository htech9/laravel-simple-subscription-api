<?php

namespace App\Events;

use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Event;
use App\Models\Post;

class PostSaved extends Event
{
    use Dispatchable, SerializesModels;

    /**
     * The customer referrer.
     *
     * @var \App\Models\Post
     */
    public $post;

    public function __construct(Post $post)
    {
        $this->post = $post;
    }
}
