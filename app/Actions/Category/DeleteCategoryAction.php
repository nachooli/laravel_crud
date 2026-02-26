<?php

namespace App\Actions\Category;

use App\Models\Category;
use App\Repositories\Contracts\CategoryRepositoryInterface;

class DeleteCategoryAction
{
    public function __construct(
        private readonly CategoryRepositoryInterface $repository
    ) {}

    public function execute(Category $category): void
    {
        $this->repository->delete($category);
    }
}
