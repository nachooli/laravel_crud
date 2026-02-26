<?php

namespace App\Http\Controllers;

use App\Actions\Post\PostRecordsAction;
use App\Http\Resources\PostRecordsResource;
use Illuminate\Http\JsonResponse;

class PostRecordsController extends Controller
{
    public function __construct(
        protected PostRecordsAction $postAction
    ) {}

    public function show(int $postId): JsonResponse
    {
        $post = $this->postAction->execute($postId);

        return $this->success(new PostRecordsResource($post));
    }
}
