<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class ParticipateInForumTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function unauthenticated_users_may_not_add_replies(){
//        $this->expectException('Illuminate\Auth\AuthenticationException');

        $this->withExceptionHandling()
            ->post('/threads/some-channel/1/replies', [])
            ->assertRedirect('/login');
    }

    /** @test */
    public function a_authenticated_user_may_participate_in_forum_threads(){

        //Given we have authenticated user
//      $user = factory('App\User')->create();
        $this->be($user = create('App\User')); //authenticated

        //And an existing thread
        $thread = create('App\Thread');

        //When the user adds reply to the thread
        $reply = make('App\Reply'); //make a reply in memory instead of create() creating it in database.
        $this->post($thread->path().'/replies', $reply->toArray()); //$this->post is a POST request o server, stimulating user clicking reply button which will send POST request to server

        //Then their reply should be visible on the page
        $this->get($thread->path())->assertSee($reply->body);
    }
}
