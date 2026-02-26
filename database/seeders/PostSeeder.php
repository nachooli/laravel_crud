<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Database\Seeder;

/**
 * Seeder para Post
 */
class PostSeeder extends Seeder
{
    public function run(): void
    {
        $categories = Category::all();

        Post::factory(5)
            ->published()
            ->create()
            ->each(function (Post $post) use ($categories) {
                $post->categories()->attach(
                    $categories->random(2)->pluck('id')
                );
            });

        Post::factory(5)->draft()->create();
        Post::factory(5)->inactive()->create();
    }
}
