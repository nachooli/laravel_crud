<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @property int $id
 * @property string $name
 * @property string $slug
 * @property bool $visible
 */
class CategoryResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id'      => $this->id,
            'name'    => $this->name,
            'slug'    => $this->slug,
            'visible' => $this->visible,
        ];
    }
}
