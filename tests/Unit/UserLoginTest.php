<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
// use Illuminate\Foundation\Auth\User;
use Carbon\Carbon;
use App\User;
use Hash;
use Illuminate\Http\Response as HttpResponse;
use JWTAuth;
class UserLoginTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public $token;
    public function testAddUserData()
    {
    	$requestData = [
    		'username' => 'Sheikh Jahid',
    		'email' => 'jahid@itobuz.com',
    		'password' => Hash::make('jahid@123')
    	];

    	$response = $this->json('POST', 'api/users', $requestData)
    					 ->assertJsonStructure(['message']);
    }

   	public function testLoginSuccessfully() 
   	{
		$user = new User(['email' => 'saikat@itobuz.com']);

		$response = $this->actingAs($user, 'api')->post('login', ['email' => 'saikat@itobuz.com', 'password' => 'saikat@123']);
		// $token = $content->getContent('token');
	    $response = $this->assertJsonStructure(['message' => 'User logged-in']);
    }
}
