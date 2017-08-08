<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class CreateThreadsTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function guests_may_not_create_threads(){

        $this->expectException('Illuminate\Auth\AuthenticationException');

        $thread = factory('App\Thread')->make(); //can also use raw() if instance not needed.

        $this->post('/threads', $thread->toArray());
    }

    /** @test */
    public function an_authenticated_user_can_create_new_forum_threads()
    {
        // give we have signed in user

        $this->actingAs(factory('App\User')->create());

        // When we hit endpoint to create thread

        $thread = factory('App\Thread')->make(); //can also use raw() if instance not needed.

        $this->post('/threads', $thread->toArray());

        // Then, when we visit the thread page
        // we should see the new thread
        $this->get($thread->path())
            ->assertSee($thread->title)
            ->assertSee($thread->body);
    }
}