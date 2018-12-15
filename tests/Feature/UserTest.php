<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\User;
use Hash;
class UserTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */

     public function testJsonAddUserData()
    {
        $requestData = [
            'username' => 'Debarun Saha',
            'email' => 'debarun@itobuz.com',
            'password' => Hash::make('debarun@123'),
        ];
        $response = $this->json('POST', 'api/users/', $requestData);
        $response->assertJson(['message' => 'Created user-data'||'Unable to create user-data']);
    }

    // public function testJsonUserLogin()
    // {
    // 	$requestData = [
    // 		'email'=>'test@itobuz.com',
    // 		'password'=>'test@123'
    // 	];
    // 	$response = $this->json('POST', 'api/login', $requestData);

    // 	$response->assertJson(['message' => 'User logged-in successfully']);
    // }

    // public function testJsonUserLogout()
    // {
    // 	$response = $this->json('POST', 'api/logout/');

    // 	$response->assertJson(['message' => 'User logged out successfully']);
    // }
}
