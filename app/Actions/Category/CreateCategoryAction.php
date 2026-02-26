<?php

namespace App\Actions\Category;

use App\Models\Category;
use App\Repositories\Contracts\CategoryRepositoryInterface;

class CreateCategoryAction
{
    public function __construct(
        private readonly CategoryRepositoryInterface $repository
    ) {}

    public function execute(array $data): Category
    {
        return $this->repository->create($data);
    }
}
