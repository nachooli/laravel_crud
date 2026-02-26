<?php

namespace Tests\Unit;

use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;
use App\Models\Comment;
use Illuminate\Foundation\Testing\RefreshDatabase;

/**
 * Test unitario para modelos (Comment)
 */
class CommentTest extends TestCase
{
    use RefreshDatabase;

    #[Test]
    public function it_can_be_created()
    {
        $comment = Comment::factory()->create();

        $this->assertDatabaseHas('comments', [
            'id' => $comment->id,
        ]);
    }
}

