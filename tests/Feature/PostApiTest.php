<?php

namespace Tests\Feature;

use App\Models\Post;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use PHPUnit\Framework\Attributes\Test;

class PostApiTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function guest_cannot_access_post_api()
    {
        $response = $this->getJson('/api/posts');

        $response->assertStatus(401); // Unauthenticated
    }

    /** @test */
    public function authenticated_user_can_get_posts()
    {
        $user = User::factory()->create();
        $this->actingAs($user, 'api');


        Post::factory()->count(3)->create(['user_id' => $user->id]);

        $response = $this->getJson('/api/posts');

        $response->assertStatus(200)
                 ->assertJsonStructure([
                     'data' => [['id', 'title', 'description', 'phone']],
                 ]);
    }

    /** @test */
    public function user_can_create_a_post()
    {
        $user = User::factory()->create();
        $this->actingAs($user, 'api');

        $postData = [
            'title' => 'Test Post',
            'description' => 'This is a test post',
            'phone' => '01000000000',
        ];

        $response = $this->postJson('/api/posts', $postData);

        $response->assertStatus(201)
                 ->assertJsonFragment(['title' => 'Test Post']);

        $this->assertDatabaseHas('posts', $postData);
    }
}
