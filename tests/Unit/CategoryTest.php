<?php

namespace Tests\Unit;

use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;
use App\Models\Category;
use Illuminate\Foundation\Testing\RefreshDatabase;

/**
 * Test unitario para modelos (Category)
 */
class CategoryTest extends TestCase
{
    use RefreshDatabase;

    #[Test]
    public function it_can_be_created()
    {
        $category = Category::factory()->create();

        $this->assertDatabaseHas('categories', [
            'id' => $category->id,
        ]);
    }

    #[Test]
    public function visible_scope_returns_only_visible_categories()
    {
        Category::factory()->count(3)->create(['visible' => true]);
        Category::factory()->count(2)->create(['visible' => false]);

        $visible = Category::visible()->get();

        $this->assertCount(3, $visible);
        $this->assertTrue($visible->every(fn($c) => $c->visible));
    }
}
