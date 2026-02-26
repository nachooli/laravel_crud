<?php

namespace App\Repositories\Eloquent;

use App\Models\Category;
use App\Repositories\Contracts\CategoryRepositoryInterface;
use Illuminate\Support\Facades\DB;

class CategoryRepository implements CategoryRepositoryInterface
{
    /**
     * @inheritDoc
     */
    public function find(int $id): ?Category
    {
        return Category::find($id);
    }

    /**
     * @inheritDoc
     */
    public function create(array $data): Category
    {
        return Category::create($data);
    }

    /**
     * @inheritDoc
     */
    public function update(Category $category, array $data): Category
    {
        $category->update($data);
        return $category;
    }

    /**
     * @inheritDoc
     */
    public function delete(Category $category): void
    {
        DB::transaction(function () use ($category) {
            /*
             * Se hace el detach antes porque en la base de datos otorgada, la relación con post no
             * está en CASCADE, y entiendo que no se debería tocar esto; si no sería mucho más
             * limpio que la relación sí se borrase ON CASCADE
             */
            $category->posts()->detach();
            $category->delete();
        });
    }
}
