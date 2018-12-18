<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Post;
use Hash;
use App\User;
class ExampleTest extends TestCase
{
    // use SignerKey;
    /**
     * A basic test example.
     *
     * @return void
     */

    public function testBasicTest()
    {
        $response = $this->get('/api/');

        $response->assertStatus(200);
    }

    public function testJsonAddUserData()
    {

        $requestData = [
            'username' => 'Testing Test',
            'email' => 'testing+test@itobuz.com',
            'password' => 'test@123'
        ];
        // $user = User::find(38);
        // $response = $this->actingAs($user, 'api');
        $response = $this->json('POST', 'api/users/', $requestData);

        $response->assertJson(['message' => 'Created user-data'])
                 ->assertStatus(200);
    }

    // public function testJsonUserLogin()
    // {
    //     $response = $this->json('POST','api/login');
    //     $response->assertJson(['status' => 'success']);
    // }

    // public function testJsonPostData()
    // {
    //     $user = User::find(38);
    //     $response = $this->actingAs($user, 'api');
    //     $response = $this->json('GET', 'api/posts/');
    //     $post = ["title 6", "title 4"];
    //     $this->assertEquals(["title 6", "title 4"], $post);
    // }

    // public function testJsonPost()
    // {
    //     $user = User::find(38);
    //     $response = $this->actingAs($user, 'api');
    //     $response = $this->json('GET', 'api/posts');
    //     $response->assertStatus(200);    
    // }

    // public function testJsonGetPostDataById()
    // {
    //     $user = User::find(38);
    //     $response = $this->actingAs($user, 'api');
    //     $response = $this->json('GET', 'api/post/1');
    //     // $response->assertJsonStructure(['name']);
    //     $response->assertStatus(200);
    // }

    // public function testJsonAddPostData()
    // {
    //     $user = User::find(38);
    //     $requestData = ['title' => 'Title 9'];
    //     $response = $this->actingAs($user, 'api');
    //     $response = $this->json('POST', 'api/posts', $requestData);
    //     $response->assertJson(['message' => 'Post data created successfully']);
    //     $response->assertStatus(200);
    // }

    // public function testJsonUpdatePostData()
    // {
    //     $requestData = ['title' => 'Title 6 updated'];
    //     $user = User::find(38);
    //     $response = $this->actingAs($user, 'api');
    //     $response = $this->json('PUT', 'api/post/15', $requestData);
    //     $response->assertJson(['message' => 'Post data updated successfully']);
    //     $response->assertStatus(200);
    // }    
    // public function testJsonDeletePostData()
    // {
    //     $user = User::find(38);
    //     $response = $this->actingAs($user, 'api');
    //     $response = $this->json('GET', 'api/post-delete/15');

    //     $response->assertJson(['message' => 'Post data deleted successfully'])
    //              ->assertStatus(200);
    // }

    

    // public function testJsonGetUserData()
    // {
    //    $user = User::find(38);
    //    $response = $this->actingAs($user, 'api');
    //    $response = $this->json('GET','api/users/')
    //    // ->assertJsonStructure(['name'])
    //    ->assertStatus(200);
    // }

    // public function testJsonGetUserDataById()
    // {
    //     $checkUserData = [
    //         'name' => 'Saikat Mitra'
    //     ];
    //      $user = User::find(38);
    //      $response = $this->actingAs($user, 'api');
    //      $response = $this->json('GET','api/user/33');

    //      // $response->assertJsonStructure(['name'])
    //      $response->assertStatus(200);
    // }

    // public function testJsonUpdateUserData()
    // {
    //     $requestData = [
    //         'username' => 'Saikat Mitra updated',
    //         'email' => 'mitra@itobuz.com',
    //         'password' => Hash::make('mitra@123')
    //     ];
    //     $user = User::find(38);
    //     $response = $this->actingAs($user, 'api');
    //     $response = $this->json('PUT','api/user/33',$requestData);

    //     $response->assertJson(['message'=>'UserData updated successfully'])
    //              ->assertStatus(200);
    // }

    // public function testJsonDeleteUserData()
    // {
    //     $user = User::find(38);
    //     $response = $this->actingAs($user, 'api');
    //     $response = $this->json('GET', 'api/user-delete/38');
    //     $response->assertJson(['message' => 'User data deleted'])
    //              ->assertStatus(200);   
    // }
    // public function testJsonUserLogout()
    // {
    //     $response = $this->json('POST', 'api/logout');

    //     $response->assertJson(['message' => 'User logged out successfully!!']);
    // }
    
}
