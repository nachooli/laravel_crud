<?php

namespace App\Http\Controllers;

use App\Actions\Category\{CreateCategoryAction, DeleteCategoryAction, UpdateCategoryAction};
use App\Http\Requests\{StoreCategoryRequest, UpdateCategoryRequest};
use App\Http\Resources\CategoryResource;
use App\Models\Category;
use Illuminate\Http\JsonResponse;

class CategoryController extends Controller
{
    const CODE_STATUS_CREATED = 201;

    public function __construct(
        protected CreateCategoryAction $createAction,
        protected UpdateCategoryAction $updateAction,
        protected DeleteCategoryAction $deleteAction
    ) {}

    public function index(): JsonResponse
    {
        $categories = Category::all();
        return $this->success(CategoryResource::collection($categories));
    }

    public function store(StoreCategoryRequest $request): JsonResponse
    {
        $category = $this->createAction->execute($request->validated());

        return $this->success(
            new CategoryResource($category),
            self::CODE_STATUS_CREATED
        );
    }

    public function show(Category $category): JsonResponse
    {
        return $this->success(new CategoryResource($category));
    }

    public function update(UpdateCategoryRequest $request, Category $category): JsonResponse
    {
        $category = $this->updateAction->execute($category, $request->validated());

        return $this->success(
            new CategoryResource($category)
        );
    }

    public function destroy(Category $category): JsonResponse
    {
        $this->deleteAction->execute($category);

        return $this->success(
            null
        );
    }
}
