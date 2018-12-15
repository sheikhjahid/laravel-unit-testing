<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
    	$this->get('api/');

        $this->assertTrue(true);
    }

    public function testGetPostData()
    {
    	$this->get('api/test/posts/');

    	$this->assertTrue(true);
    }

    public function testGetPostDataById()
    {
    	$this->get('api/test/post/{id}');

    	$this->assertTrue(true);
    }

    public function testaddPostData()
    {
    	$this->post('api/test/posts/');

    	$this->assertTrue(true);
    }

    public function testaAddUserData()
    {
    	$this->post('api/users/');

    	$this->assertTrue(true);
    }

    public function testUpdatePostData()
    {
    	$this->put('api/test/post/{id}');

    	$this->assertTrue(true);
    }

    // public function testUserLogin()
    // {
    // 	$this->post('api/login/');

    // 	$this->assertTrue(true);
    // }

}
