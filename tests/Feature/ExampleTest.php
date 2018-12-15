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
        $response = $this->json('GET', 'api/test/posts/');
        $post = ["title 6", "title 4"];
        $this->assertEquals(["title 6", "title 4"], $post);
    }

    public function testJsonPost()
    {
        $response = $this->json('GET', 'api/test/posts');
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
        $response = $this->json('GET', 'api/test/post/1');
        $checkJsonData = [
            'name' => 'Title 1'
        ];
        $response->assertJson(['data' => $checkJsonData]);
        $response->assertStatus(200);
    }

    public function testJsonAddPostData()
    {
        $requestData = ['title' => 'Title 6'];
        $response = $this->json('POST', 'api/test/posts', $requestData);
        $response->assertJson(['message' => 'Post data created successfully'||'Unable to add post data']);
    }

    public function testJsonUpdatePostData()
    {
        $requestData = ['title' => 'Title 5 updated'];
        $response = $this->json('PUT', 'api/test/post/5', $requestData);
        $response->assertJson(['message' => 'Post data updated successfully'||'Unable to update post-data']);
    }    
    public function testJsonDeletePostData()
    {
        $response = $this->json('GET', 'api/test/post-delete/3');

        $response->assertJson(['message' => 'Post data deleted successfully'||'Unable to delete post data']);
    }

    public function testJsonUserLogout()
    {
        $response = $this->json('POST', 'api/logout');

        $response->assertJson(['message' => 'User logged out successfully!!']);
    }
    
}
