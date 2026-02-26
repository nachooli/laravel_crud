<?php

namespace App\Actions\Category;

use App\Models\Category;
use App\Repositories\Contracts\CategoryRepositoryInterface;

class UpdateCategoryAction
{
    public function __construct(
        private readonly CategoryRepositoryInterface $repository
    ) {}

    public function execute(Category $category, array $data): Category
    {
        return $this->repository->update($category, $data);
    }
}
