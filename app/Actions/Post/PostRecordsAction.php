<?php

namespace App\Actions\Post;

use App\Models\Post;
use App\Repositories\Contracts\PostRepositoryInterface;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class PostRecordsAction
{
    public function __construct(
        private readonly PostRepositoryInterface $postRepository,
    ) {}

    /**
     * Ejecuta la acción para obtener un post con su actividad.
     *
     * @param int $postId
     * @return Post
     *
     * @throws ModelNotFoundException
     */
    public function execute(int $postId): Post
    {
        return $this->postRepository->findPostRecords($postId);
    }
}
