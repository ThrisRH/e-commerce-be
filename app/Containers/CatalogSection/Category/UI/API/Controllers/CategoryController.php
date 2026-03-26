<?php

namespace App\Containers\CatalogSection\Category\UI\API\Controllers;

use App\Containers\CatalogSection\Category\Actions\FindCategoryByIdAction;
use App\Containers\CatalogSection\Category\Actions\GetAllCategoriesAction;
use App\Containers\CatalogSection\Category\Models\Category;
use App\Containers\CatalogSection\Category\UI\API\Transformers\CategoryTransformer;
use App\Ship\Helper\ApiResponse;
use App\Ship\Parents\Controllers\Controller;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CategoryController extends Controller
{
    public function index(GetAllCategoriesAction $action)
    {
        $categories = $action->run();
        return ApiResponse::success((new CategoryTransformer)->collection($categories));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'image_url' => 'nullable|string|url',
            'sort_order' => 'nullable|integer|min:0',
            'is_active' => 'nullable|boolean',
            'parent_id' => 'nullable|exists:categories,id',
        ]);

        try {
            $category = Category::create($data);

            return ApiResponse::success((new CategoryTransformer)->transform($category), 'Category created successfully', Response::HTTP_CREATED);

        } catch (QueryException $e) {
            return ApiResponse::error('Database error', Response::HTTP_INTERNAL_SERVER_ERROR);
        } catch (\Exception $e) {
            return ApiResponse::error('Something went wrong', Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function show($id, FindCategoryByIdAction $action)
    {
        $category = $action->run($id);
        return ApiResponse::success((new CategoryTransformer)->transform($category));
    }

    public function update(Request $request, Category $category)
    {
        $data = $request->validate([
            'name' => 'sometimes|string|max:255',
            'description' => 'sometimes|string',
            'image_url' => 'nullable|string|url',
            'sort_order' => 'nullable|integer|min:0',
            'is_active' => 'nullable|boolean',
            'parent_id' => 'nullable|exists:categories,id',
        ]);

        if (empty($data)) {
            return ApiResponse::error('No data provided', Response::HTTP_BAD_REQUEST);
        }

        $category->update($data);

        return ApiResponse::success((new CategoryTransformer)->transform($category), 'Category updated successfully', Response::HTTP_OK);
    }

    public function destroy($id)
    {
        $category = Category::find($id);

        if (empty($category)) {
            return ApiResponse::error('Category not found', Response::HTTP_NOT_FOUND);
        }

        $category->delete();

        return ApiResponse::success(null, 'Category deleted successfully', Response::HTTP_OK);
    }
}
