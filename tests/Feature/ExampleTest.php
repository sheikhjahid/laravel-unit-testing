<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Post;
use Hash;
class ExampleTest extends TestCase
{
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

    public function testJsonPostData()
    {
        $response = $this->json('GET', 'api/posts/');
        $post = ["title 6", "title 4"];
        $this->assertEquals(["title 6", "title 4"], $post);
    }

    public function testJsonPost()
    {
        $response = $this->json('GET', 'api/posts');
        $checkJsonData = array(
            [
                'name' => 'Title 1',
                'created_at' => null,
                'updated_at' => null
            ],
            [
                'name' => 'Title 2 updated',
            ]
        );
        $response->assertJson(['data' => $checkJsonData]);    
        $response->assertStatus(200);
    }

    public function testJsonGetPostDataById()
    {
        $response = $this->json('GET', 'api/post/1');
        $checkJsonData = [
            'name' => 'Title 1'
        ];
        $response->assertJson(['data' => $checkJsonData]);
        $response->assertStatus(200);
    }

    public function testJsonAddPostData()
    {
        $requestData = ['title' => 'Title 7'];
        $response = $this->json('POST', 'api/posts', $requestData);
        $response->assertJson(['message' => 'Post data created successfully']);
    }

    public function testJsonUpdatePostData()
    {
        $requestData = ['title' => 'Title 5 updated'];
        $response = $this->json('PUT', 'api/post/5', $requestData);
        $response->assertJson(['message' => 'Post data updated successfully']);
    }    
    public function testJsonDeletePostData()
    {
        $response = $this->json('GET', 'api/post-delete/3');

        $response->assertJson(['message' => 'Post data deleted successfully']);
    }

    public function testJsonAddUserData()
    {
        $requestData = [
            'username' => 'Another Test User',
            'email' => 'test@itobuz.com',
            'password' => 'test@123'
        ];
        $response = $this->json('POST', 'api/users/', $requestData);

        $response->assertJson(['message' => 'Created user-data']);
    }

    public function testJsonGetUserData()
    {
        $checkUserData = array([
            'id' => 2,
            'name' => 'Palash Chanda'
        ],
        [
            'id' => 9,
            'name' => 'Saikat Mitra'
        ]
        );

        $response = $this->json('GET','api/users/');

        $response->assertJson(['data' => $checkUserData]);

        $response->assertStatus(200);
    }

    public function testJsonGetUserDataById()
    {
        $checkUserData = [
            'name' => 'Saikat Mitra'
        ];
         $response = $this->json('GET','api/user/33');

         $response->assertJson(['data' => $checkUserData]);

         $response->assertStatus(200);

    }

    public function testJsonUpdateUserData()
    {
        $requestData = [
            'username' => 'Saikat Mitra updated',
            'email' => 'mitra@itobuz.com',
            'password' => Hash::make('mitra@123')
        ];

        $response = $this->json('PUT','api/user/33',$requestData);

        $response->assertJson(['message' => 'UserData updated successfully']);

        $response->assertStatus(200);

    }

    public function testJsonDeleteUserData()
    {
        $response = $this->json('GET', 'api/user-delete/33');

        $response->assertJson(['message' => 'User data deleted']);

        $response->assertStatus(200);
    }
    // public function testJsonUserLogout()
    // {
    //     $response = $this->json('POST', 'api/logout');

    //     $response->assertJson(['message' => 'User logged out successfully!!']);
    // }
    
}
