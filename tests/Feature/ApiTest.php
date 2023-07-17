<?php

namespace Tests\Feature;

use Illuminate\Support\Facades\Mail;
use Tests\TestCase;

use App\Models\{Post,Subscription};

class ApiPostTest extends TestCase
{
    /**
     * Test post post api call, expecting successful result
     *
     * @return void
     */
    public function test_post_post()
    {
        Post::truncate();
        $response = $this->callPostPost([
            'website' => 'example.com',
            'title'   => 'Hello Laravel',
            'content' => 'Hello from HT9. You did it!',
            'author'  => 'ht9'
        ]);
        $response->assertStatus(200);
    }

    /**
     * Test post post api call, expecting successful data save
     *
     * @return void
     */
    public function test_post_post_saves_with_success()
    {
        Post::truncate();
        $website = 'example.com';
        $title = 'Hello Laravel';
        $content = 'Hello from HT9. You did it!';
        $author = 'ht9';
        $this->callPostPost(compact('website', 'title', 'content', 'author'));

        $this->assertEquals(Post::count(), 1);
        $post = Post::first();
        $this->assertEquals($post->website, $website);
        $this->assertEquals($post->title, $title);
        $this->assertEquals($post->content, $content);
        $this->assertEquals($post->author, $author);

    }
    
    /**
     * Test post post api call, expecting successful data save
     *
     * @return void
     */
    public function test_post_post_makes_notification_mail_sent_with_success()
    {
        Post::truncate();
        Subscription::truncate();

        $recipient = 'subscriber@xmail.com';
        // Insert subscription
        Subscription::create([
            'website' => 'example.com',
            'email'   => $recipient
        ]);

        Mail::spy();

        $website = 'example.com';
        $title = 'Hello Laravel';
        $content = 'Hello from HT9. You did it!';
        $author = 'ht9';
        $this->callPostPost(compact('website', 'title', 'content', 'author'));
        
        Mail::shouldHaveReceived('to')->once()->with($recipient);
    }

    /*
    * Test post subcription api call, expecting successful result
    *
    * @return void
    */
   public function test_post_subscription_is_success()
   {
        Subscription::truncate();
        $response = $this->callPostSubscription([
            'website' => 'example.com',
            'email'   => 'subscriber@xmail.com'
        ]);
        $response->assertStatus(200);
   }

   /*
    * Test post subcription api call, expecting successful data save
    *
    * @return void
    */
    public function test_post_subscription_saves_with_success()
    {
        Subscription::truncate();
        $website = 'example.com';
        $email = 'subscriber@xmail.com';

        $this->callPostSubscription(compact('website', 'email'));

        $this->assertEquals(Subscription::count(), 1);
        $subscription = Subscription::first();
        $this->assertEquals($subscription->website, $website);
        $this->assertEquals($subscription->email, $email);
    }


    private function callPostPost($args) {
        return $this->postJson('/api/post', $args);
    }

    private function callPostSubscription($args) {
        return $this->postJson('/api/subscription', $args);
    }
}
