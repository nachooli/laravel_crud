<?php

namespace Tests\Feature;

use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

/**
 * Test para comprobar si un id de Post existe
 */
class PostNotExistsTest extends TestCase
{
    #[Test]
    public function returns_404_if_post_not_exists()
    {
        $response = $this->getJson('/api/v1/posts/500/records');

        $response->assertStatus(404);
    }
}
