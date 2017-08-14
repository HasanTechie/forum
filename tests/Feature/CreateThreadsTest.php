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

        $thread = make('App\Thread'); //can also use raw() if instance not needed.

        $this->post('/threads', $thread->toArray());
    }

    /** @test */
    public function guests_cannot_see_the_create_threads_page(){
        $this->withExceptionHandling()
            ->get('/threads/create')
            ->assertRedirect('/login');
    }

    /** @test */
    public function an_authenticated_user_can_create_new_forum_threads()
    {
        // give we have signed in user

        $this->signedIn();

        // When we hit endpoint to create thread

        $thread = make('App\Thread'); //can also use raw() if instance not needed.

        $this->post('/threads', $thread->toArray());

        // Then, when we visit the thread page
        // we should see the new thread
        $this->get($thread->path())
            ->assertSee($thread->title)
            ->assertSee($thread->body);
    }
}