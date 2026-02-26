<?php

namespace Database\Seeders;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Database\Seeder;

/**
 * Seeder para Comment
 */
class CommentSeeder extends Seeder
{
    public function run(): void
    {
        $posts = Post::all();

        $posts->each(function ($post) {
            Comment::factory(5)->create([
                'post_id' => $post->id,
            ]);
        });
    }
}
