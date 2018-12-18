<?php

namespace Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
// use Illuminate\Foundation\Testing\DatabaseMigrations;
use Artisan;
use JWTAuth;
abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    // public function setUp()
    // {
    // 	parent::setUp();

    // 	Artisan::call('db:seed');
    // }

    public function tearDown()
    {
    	parent::tearDown();
    }

    protected function headers($user = null)
    {
    	$headers = [
    		'Accept' => 'application/json'
    	];
    	if(!is_null($user))
    	{
    		$token = JWTAuth::fromUser($user);
    		JWTAuth::setToken($token);

    		$headers['Authorization'] = 'Bearer '.$token;
    	}
    }
}
