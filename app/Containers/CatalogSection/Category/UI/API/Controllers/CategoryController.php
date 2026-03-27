<?php

namespace App\Containers\CatalogSection\Category\UI\API\Controllers;

use App\Containers\CatalogSection\Category\Actions\CreateCategoryAction;
use App\Containers\CatalogSection\Category\Actions\DeleteCategoryAction;
use App\Containers\CatalogSection\Category\Actions\FindCategoryByIdAction;
use App\Containers\CatalogSection\Category\Actions\GetAllCategoriesAction;
use App\Containers\CatalogSection\Category\Actions\UpdateCategoryAction;
use App\Containers\CatalogSection\Category\UI\API\Transformers\CategoryTransformer;
use App\Ship\Helper\ApiResponse;
use App\Ship\Parents\Controllers\Controller;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(GetAllCategoriesAction $action)
    {
        $categories = $action->run();
        return ApiResponse::success((new CategoryTransformer)->collection($categories));
    }

    public function store(Request $request, CreateCategoryAction $action)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'image_url' => 'nullable|string|url',
            'sort_order' => 'nullable|integer|min:0',
            'is_active' => 'nullable|boolean',
            'parent_id' => 'nullable|exists:categories,id',
        ]);

        $category = $action->run($data);

        return ApiResponse::success((new CategoryTransformer)->transform($category), 'Category created successfully');
    }

    public function show($id, FindCategoryByIdAction $action)
    {
        $category = $action->run($id);
        return ApiResponse::success((new CategoryTransformer)->transform($category));
    }

    public function update(Request $request, $id, UpdateCategoryAction $action)
    {
        $data = $request->validate([
            'name' => 'sometimes|string|max:255',
            'description' => 'sometimes|string',
            'image_url' => 'nullable|string|url',
            'sort_order' => 'nullable|integer|min:0',
            'is_active' => 'nullable|boolean',
            'parent_id' => 'nullable|exists:categories,id',
        ]);

        $category = $action->run($id, $data);

        return ApiResponse::success((new CategoryTransformer)->transform($category), 'Category updated successfully');
    }

    public function destroy($id, DeleteCategoryAction $action)
    {
        $action->run($id);

        return ApiResponse::success(null, 'Category deleted successfully');
    }
}
