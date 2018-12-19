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
    
}
