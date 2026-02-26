<?php

namespace Tests\Feature;

use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;
use App\Models\Category;
use Illuminate\Foundation\Testing\RefreshDatabase;

/**
 * Tests para el CRUD de categories
 */
class CategoryApiTest extends TestCase
{
    use RefreshDatabase;

    const BASE_URL = "/api/v1/categories";

    #[Test]
    public function it_lists_categories()
    {
        Category::factory(3)->create();

        $response = $this->getJson(self::BASE_URL);

        $response->assertOk()
            ->assertJsonStructure([
                '*' => ['id', 'name', 'slug', 'visible']
            ]);
    }

    #[Test]
    public function it_creates_category_with_valid_data()
    {
        $response = $this->postJson(self::BASE_URL, [
            'name' => 'Backend',
            'slug' => 'backend',
            'visible' => true
        ]);

        $response->assertCreated();
        $this->assertDatabaseHas('categories', ['slug' => 'backend']);
    }

    #[Test]
    public function it_rejects_invalid_visible_value()
    {
        $response = $this->postJson(self::BASE_URL, [
            'name' => 'Backend',
            'slug' => 'backend',
            'visible' => 9
        ]);

        $response->assertStatus(422)
            ->assertJsonValidationErrors('visible');
    }
}
