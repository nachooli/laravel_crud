<?php

namespace Database\Factories;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * Factory para Post
 */
class PostFactory extends Factory
{
    protected $model = Post::class;

    public function definition(): array
    {
        $title = $this->faker->sentence();

        return [
            'user_id' => User::factory(),
            'title' => $title,
            'slug' => str($title)->slug(),
            'picture' => $this->faker->imageUrl(640, 480, 'nature'),
            'short_content' => $this->faker->text(150),
            'content' => $this->faker->paragraphs(5, true),
            'added' => $this->faker->dateTimeBetween('-1 year'),
            'comment' => $this->faker->boolean(80),
            'pending' => $this->faker->boolean(20),
            'public' => $this->faker->boolean(90),
            'active' => true,
        ];
    }

    /**
     * State para un Post en estado de borrador
     *
     * @return $this
     */
    public function draft(): static
    {
        return $this->state(fn() => [
            'public' => false,
            'pending' => true,
        ]);
    }

    /**
     * State para un Post privado
     *
     * @return $this
     */
    public function private(): static
    {
        return $this->state(fn() => [
            'public' => false,
        ]);
    }

    /**
     * State para un Post publicado
     *
     * @return $this
     */
    public function published(): static
    {
        return $this->state(fn() => [
            'public' => true,
            'pending' => false,
            'active' => true,
        ]);
    }

    /**
     * State para un Post no activo
     *
     * @return $this
     */
    public function inactive(): static
    {
        return $this->state(fn() => [
            'active' => false,
        ]);
    }
}
