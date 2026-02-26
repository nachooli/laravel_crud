<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PostRecordsResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            "body" => [
                'post' => [
                    'id' => $this->id,
                    'title' => $this->title,
                    'short_content' => $this->short_content,
                    'owner' => new UserResource($this->whenLoaded('owner')),
                    'users' => UserResource::collection(
                        $this->comments->pluck('writer')->unique('id')->values()
                    ),
                    'comments' => CommentResource::collection($this->comments),
                ],
            ]
        ];
    }
}
