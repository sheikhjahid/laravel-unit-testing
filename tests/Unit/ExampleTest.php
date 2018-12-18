<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Hash;
use App\Post;
use App\User;
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

    public function testAddUserData()
    {
        $requestData = [
            'username' => 'Sheikh Jahid',
            'email' => 'jahid@itobuz.com',
            'password' => Hash::make('jahid@123')
        ];
        $response = $this->json('POST','api/users/', $requestData)
                    ->assertJson(['message' => 'Created user-data']);
    }

     public function testUserLogin()
    {
        $requestData = [
            'email' => 'saikat@itobuz.com',
            'password' => 'saikat@123'
        ];
        $response = $this->json('POST','api/login/', $requestData)->assertStatus(200);
    }


    // public function testGetPostData()
    // {
    //     $user = User::find(38);
    //     $response = $this->actingAs($user, 'api');
    // 	$response = $this->json('GET','api/posts/')
    //          ->assertStatus(200);
    // }

    // public function testGetPostDataById()
    // {
       
    //     $user = User::find(38);
    //     $response = $this->actingAs($user, 'api');
    // 	$response = $this->json('GET','api/post/2')
    //          ->assertStatus(200);
    // }

    // public function testaddPostData()
    // {
    //     $requestData = [
    //         'title' => 'Title 7' 
    //     ];
    //     $user = User::find(38);
    //     $response = $this->actingAs($user, 'api');
    // 	$response = $this->json('POST','api/posts/', $requestData)
    //                ->assertStatus(200);
    //                // ->assertJsonStructure(['id','name']);
    // }

    

    // public function testGetUserData()
    // {
    //     $userData = array([
    //         'name' => 'Palash Chanda updated'
    //     ],
    //     [
    //         'name' => 'Saikat Mitra'
    //     ]);
    //     $user = User::find(38);
    //     $response = $this->actingAs($user, 'api');
    //     $response = $this->json('GET','api/users/')
    //          ->assertJson(['data' => $userData])
    //          ->assertStatus(200);
    // }

    // public function testGetUserDataById()
    // {   
    //     $userData = [
    //         'name' => 'Saikat Mitra'
    //     ];
    //     $user = User::find(38);
    //     $response = $this->actingAs($user, 'api');
    //     // $userData = User::find(33);
    //     $response = $this->json('GET','api/user/33')
    //          ->assertStatus(200)
    //          ->assertJson(['data' => $userData]);
    // }

    // public function testUpdateUserData()
    // {
    //     $requestData = [
    //         'username' => 'Saikat mitra updated',
    //         'email' => 'saikat+test@itobuz.com',
    //         'password' => Hash::make('saikat@123')
    //     ];
    //     $user = User::find(38);
    //     $response = $this->actingAs($user, 'api');
    //     $response = $this->put('api/user/33', $requestData)
    //          ->assertStatus(200);
    //          // ->assertJsonStructure(['message']);
    // }

    // public function deleteUserData()
    // {
    //     $user = User::find(38);
    //     $response = $this->actingAs($user, 'api');
    //     $response = $this->get('api/user-delete/33')
    //          ->assertStatus(200);
    //          // ->assertJsonStructure(['message']);
    // }

    // public function testUpdatePostData()
    // {
    //     $requestData = [
    //         'title' => 'Title 3 Updated'
    //     ];
    //     $user = User::find(38);
    //     $response = $this->actingAs($user, 'api');
    // 	$response = $this->put('api/post/2', $requestData)
    //          ->assertJson(['message' => 'Post data updated successfully']);
    // }

   
}
