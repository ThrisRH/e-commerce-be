<?php

namespace App\Services;

use App\Helper\ApiResponse;
use App\Http\Resources\CategoryResource;
use App\Models\Category;
use Symfony\Component\HttpFoundation\Response;

class CategoryService
{
    public function getAlls()
    {
        $category = Category::with('categoryAttributes.attribute')->latest()->get();

        return ApiResponse::success(CategoryResource::collection($category));
    }

    public function getById($id)
    {
        $category = Category::with('categoryAttributes.attribute')->find($id);

        if (empty($category)) {
            return ApiResponse::error('Category not found', Response::HTTP_NOT_FOUND);
        }

        return ApiResponse::success(new CategoryResource($category));
    }
}
