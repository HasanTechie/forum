<?php

namespace Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    protected function signedIn($user = null){

        $user = $user ?: create('App\User'); //example of ?: is $action = (empty($_POST['action'])) ? 'default' : $_POST['action'];

        $this->actingAs($user);
    }
}
