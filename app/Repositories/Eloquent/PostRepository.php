<?php

namespace App\Repositories\Eloquent;

use App\Models\Post;
use App\Repositories\Contracts\PostRepositoryInterface;

/**
 * Repositorio de Post
 */
class PostRepository implements PostRepositoryInterface
{
    /**
     * @inheritDoc
     */
    public function findPostRecords(int $postId): Post
    {
        // with() para eager loading con las relaciones, para así evitar consultas extras innecesarias
        return Post::with([
            'owner',
            'comments.writer',
        ])->findOrFail($postId);
    }

    /**
     * @inheritDoc
     */
    public function find(int $id): ?Post
    {
        return Post::find($id);
    }

    /**
     * @inheritDoc
     */
    public function create(array $data): Post
    {
        return Post::create($data);
    }

    /**
     * @inheritDoc
     */
    public function update(Post $category, array $data): Post
    {
        $category->update($data);
        return $category;
    }

    /**
     * @inheritDoc
     */
    public function delete(Post $category): void
    {
        $category->delete();
    }
}
