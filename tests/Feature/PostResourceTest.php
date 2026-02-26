<?php

namespace Tests\Feature;

use App\Models\Post;
use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

/**
 * Test para validar la estructura del json del Post
 */
class PostResourceTest extends TestCase
{
    use RefreshDatabase;

    #[Test]
    public function post_activity_has_expected_structure()
    {
        $post = Post::factory()
            ->hasComments(2)
            ->create();

        $response = $this->getJson("/api/v1/posts/$post->id/records");

        $response->assertOk()
            ->assertJsonStructure([
                'body' => [
                    'post' => [
                        'id',
                        'title',
                        'short_content',
                        'owner',
                        'users',
                        'comments',
                    ]
                ]
            ]);
    }
}
