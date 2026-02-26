<?php

namespace Tests\Unit;

use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;
use App\Models\Post;
use Illuminate\Foundation\Testing\RefreshDatabase;

/**
 * Test unitario para modelos (Post)
 */
class PostTest extends TestCase
{
    use RefreshDatabase;

    #[Test]
    public function it_can_be_created()
    {
        $post = Post::factory()->create();

        $this->assertDatabaseHas('posts', [
            'id' => $post->id,
        ]);
    }
}
