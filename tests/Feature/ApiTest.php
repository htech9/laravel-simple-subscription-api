<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

use App\Models\{Post,Subscription};

class ApiPostTest extends TestCase
{
    /**
     * Test post post api call.
     *
     * @return void
     */
    public function test_post_post()
    {
        Post::truncate();
        $response = $this->postJson('/api/post',[
            'website' => 'example.com',
            'title'   => 'Hello Laravel',
            'content' => 'Hello from HT9. You did it!',
            'author'  => 'ht9'
        ]);
        $response->assertStatus(200);
    }

    /*
    * Test post subcription api call.
    *
    * @return void
    */
   public function test_post_subscription()
   {
        Subscription::truncate();
        $response = $this->postJson('/api/subscription',[
            'website' => 'example.com',
            'email'   => 'subscriber@xmail.com'
        ]);
        $response->assertStatus(200);
   }
}
