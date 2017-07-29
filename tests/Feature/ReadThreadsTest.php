<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class ReadThreadsTest extends TestCase
{
    use DatabaseMigrations;

    public function setUp(){
        parent::setUp();

        $this->thread = factory('App\Thread')->create();
    }

    /** @test */
    public function a_user_can_view_all_Threads()
    {
//        $thread = factory('App\Thread')->create();
//        $response = $this->get('/threads');
//        $response->assertSee($this->thread->title);
        $this->get('/threads')->assertSee($this->thread->title);

    }

    /** @test */
    public function a_user_can_read_a_single_Thread(){

//        $thread = factory('App\Thread')->create();
//        $response = $this->get('/threads/' . $this->thread->id);
//        $response->assertSee($this->thread->title);
        $this->get('/threads/' . $this->thread->id)->assertSee($this->thread->title);
    }

    /** @test */
    public function a_user_can_read_replies_that_are_associated_with_a_thread(){

        //Given we have a thread
        //$this->thread
        //and that thread includes replies
        $reply = factory('App\Reply')->create(['thread_id' => $this->thread->id]);
        //when we visit the thread page
        $this->get('/threads/' . $this->thread->id)->assertSee($reply->body);
        //then we should see replies
    }
}