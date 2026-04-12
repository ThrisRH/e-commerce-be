<?php

namespace App\Containers\CatalogSection\Category\UI\API\Controllers;

use App\Containers\CatalogSection\Category\Actions\Categories\CreateCategoryAction;
use App\Containers\CatalogSection\Category\Actions\Categories\DeleteCategoryAction;
use App\Containers\CatalogSection\Category\Actions\Categories\FindCateByNameAction;
use App\Containers\CatalogSection\Category\Actions\Categories\FindCategoryByIdAction;
use App\Containers\CatalogSection\Category\Actions\Categories\FindCategoryBySlugAction;
use App\Containers\CatalogSection\Category\Actions\Categories\FindProductByCateAction;
use App\Containers\CatalogSection\Category\Actions\Categories\GetAllCategoriesAction;
use App\Containers\CatalogSection\Category\Actions\Categories\UpdateCategoryAction;
use App\Containers\CatalogSection\Category\UI\API\Transformers\CategoryTransformer;
use App\Containers\CatalogSection\Product\UI\API\Transformers\ProductItemTransformer;
use App\Containers\CatalogSection\Product\UI\API\Transformers\ProductTransfomer;
use App\Ship\Helper\ApiResponse;
use App\Ship\Parents\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CategoryController extends Controller
{
    public function index(GetAllCategoriesAction $action, Request $request)
    {
        $categories = $action->run($request->limit ?? 10);

        $transformer = app(CategoryTransformer::class);

        $categories->setCollection(
            $transformer->collection($categories->getCollection())
        );

        return ApiResponse::success($categories);
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
            'attribute_ids' => 'nullable|array',
            'attribute_ids.*' => 'exists:attributes,id',
            'is_required' => 'boolean',
        ]);

        $category = $action->run($data);

        return ApiResponse::success((new CategoryTransformer)->transform($category), 'Category created successfully');
    }

    public function show($id, FindCategoryByIdAction $action)
    {
        $category = $action->run($id);

        return ApiResponse::success((new CategoryTransformer)->transform($category));
    }

    public function findCateByName(Request $request, FindCateByNameAction $action)
    {
        $keyword = $request->query('keyword');
        $limit = $request->query('limit', 10);

        if (! $keyword) {
            return ApiResponse::error('Keyword is required', Response::HTTP_BAD_REQUEST);
        }

        $categories = $action->run($keyword, (int) $limit);

        $transformer = app(CategoryTransformer::class);

        $categories->setCollection(
            $transformer->collection($categories->getCollection())
        );

        return ApiResponse::success($categories);
    }

    public function findBySlug($slug, FindCategoryBySlugAction $action)
    {
        $category = $action->run($slug);

        return ApiResponse::success((new CategoryTransformer)->transform($category));
    }

    public function showByCateId($id, FindProductByCateAction $action, Request $request)
    {
        $products = $action->run($id, $request->limit ?? 25);

        $transformer = app(ProductItemTransformer::class);

        $products->setCollection(
            $transformer->collection($products->getCollection())
        );

        return ApiResponse::success($products);
    }

    public function update(Request $request, $id, UpdateCategoryAction $action)
    {
        $isPatch = $request->isMethod('PATCH');

        $rules = [
            'name' => ($isPatch ? 'sometimes|' : 'required|').'string|max:255',
            'description' => ($isPatch ? 'sometimes|' : 'required|').'string',
            'image_url' => 'nullable|string|url',
            'sort_order' => 'sometimes|integer|min:0',
            'is_active' => 'sometimes|boolean',
            'parent_id' => 'nullable|exists:categories,id',
            'attribute_ids' => 'sometimes|array',
            'attribute_ids.*' => 'exists:attributes,id',
            'is_required' => 'sometimes|boolean',
        ];

        $data = $request->validate($rules);

        $category = $action->run($id, $data);

        return ApiResponse::success((new CategoryTransformer)->transform($category), 'Category updated successfully');
    }

    public function destroy($id, DeleteCategoryAction $action)
    {
        $action->run($id);

        return ApiResponse::success(null, 'Category deleted successfully');
    }
}
