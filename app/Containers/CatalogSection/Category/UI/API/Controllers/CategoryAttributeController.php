<?php

namespace App\Containers\CatalogSection\Category\UI\API\Controllers;

use App\Containers\CatalogSection\Category\Actions\CreateCategoryAttributeAction;
use App\Containers\CatalogSection\Category\Actions\DeleteCategoryAttributeAction;
use App\Containers\CatalogSection\Category\Actions\FindCategoryAttributeByIdAction;
use App\Containers\CatalogSection\Category\Actions\GetAllCategoryAttributesAction;
use App\Containers\CatalogSection\Category\Actions\UpdateCategoryAttributeAction;
use App\Ship\Helper\ApiResponse;
use App\Ship\Parents\Controllers\Controller;
use Illuminate\Http\Request;

class CategoryAttributeController extends Controller
{
    public function index(GetAllCategoryAttributesAction $action)
    {
        $categoryAttributes = $action->run();

        return ApiResponse::success($categoryAttributes);
    }

    public function store(Request $request, CreateCategoryAttributeAction $action)
    {
        $data = $request->validate([
            'category_id' => 'required|exists:categories,id',
            'attribute_ids' => 'required|array',
            'attribute_ids.*' => 'exists:attributes,id',
            'is_required' => 'boolean',
        ]);

        $categoryAttributes = $action->run($data);

        return ApiResponse::success($categoryAttributes);
    }

    public function show($id, FindCategoryAttributeByIdAction $action)
    {
        $categoryAttribute = $action->run($id);

        return ApiResponse::success($categoryAttribute);
    }

    public function update(Request $request, $id, UpdateCategoryAttributeAction $action)
    {
        $data = $request->validate([
            'category_id' => 'required|exists:categories,id',
            'attribute_id' => 'required|exists:attributes,id',
            'is_required' => 'boolean',
        ]);

        $categoryAttribute = $action->run($id, $data);

        return ApiResponse::success($categoryAttribute);
    }

    public function destroy($id, DeleteCategoryAttributeAction $action)
    {
        $categoryAttribute = $action->run($id);

        return ApiResponse::success($categoryAttribute);
    }
}
