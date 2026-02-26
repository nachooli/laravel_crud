<?php

namespace App\Repositories\Contracts;

use App\Models\Post;

interface PostRepositoryInterface
{
    /**
     * @param int $postId
     * @return Post
     */
    public function findPostRecords(int $postId): Post;

    /**
     * @param int $id
     * @return Post|null
     */
    public function find(int $id): ?Post;

    /**
     * @param array $data
     * @return Post
     */
    public function create(array $data): Post;

    /**
     * @param Post $category
     * @param array $data
     * @return Post
     */
    public function update(Post $category, array $data): Post;

    /**
     * @param Post $category
     * @return void
     */
    public function delete(Post $category): void;
}
