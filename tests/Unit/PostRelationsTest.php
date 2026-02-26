<?php

namespace Tests\Unit;

use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Foundation\Testing\RefreshDatabase;

/**
 * Test para las relaciones.
 * Garantiza que las relaciones no se rompen con refactors o modificaciones de código.
 */
class PostRelationsTest extends TestCase
{
    use RefreshDatabase;

    #[Test]
    public function post_belongs_to_user()
    {
        $post = Post::factory()->create();

        $this->assertNotNull($post->owner);
    }

    #[Test]
    public function post_can_have_categories()
    {
        $post = Post::factory()->create();
        $categories = Category::factory(3)->create();

        $post->categories()->attach($categories);

        $this->assertCount(3, $post->categories);
    }
}

