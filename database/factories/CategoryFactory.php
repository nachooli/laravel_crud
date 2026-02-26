<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * Factory para Category
 */
class CategoryFactory extends Factory
{
    protected $model = Category::class;

    public function definition(): array
    {
        $name = $this->faker->unique()->word();

        return [
            'name' => ucfirst($name),
            'slug' => str($name)->slug(),
            'visible' => $this->faker->boolean(),
        ];
    }

    /**
     * @return $this
     */
    public function invisible(): static
    {
        return $this->state(fn() => ['visible' => false]);
    }
}
