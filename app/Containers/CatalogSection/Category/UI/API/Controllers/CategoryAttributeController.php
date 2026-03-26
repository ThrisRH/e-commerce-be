<?php

namespace App\Http\Controllers;

use App\Containers\CatalogSection\Category\Models\CategoryAttribute;
use App\Ship\Helper\ApiResponse;
use App\Ship\Parents\Controllers\Controller;
use Illuminate\Http\Request;

class CategoryAttributeController extends Controller
{
    public function index()
    {
        $categoryAttributes = CategoryAttribute::latest()->paginate(10);

        return ApiResponse::success($categoryAttributes);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'category_id' => 'required|exists:categories,id',
            'attribute_id' => 'required|exists:attributes,id',
            'is_required' => 'boolean',
        ]);

        $categoryAttributes = CategoryAttribute::create($data);

        return ApiResponse::success($categoryAttributes);
    }

    public function show($id)
    {
        $categoryAttribute = CategoryAttribute::find($id);

        return ApiResponse::success($categoryAttribute);
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'category_id' => 'required|exists:categories,id',
            'attribute_id' => 'required|exists:attributes,id',
            'is_required' => 'boolean',
        ]);

        $categoryAttribute = CategoryAttribute::find($id);

        if (! $categoryAttribute) {
            return ApiResponse::error('Category attribute not found');
        }

        $categoryAttribute->update($data);

        return ApiResponse::success($categoryAttribute);
    }

    public function destroy($id)
    {
        $categoryAttribute = CategoryAttribute::find($id);

        if (! $categoryAttribute) {
            return ApiResponse::error('Category attribute not found');
        }

        $categoryAttribute->delete();

        return ApiResponse::success($categoryAttribute);
    }
}
