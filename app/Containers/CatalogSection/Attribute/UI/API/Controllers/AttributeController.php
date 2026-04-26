<?php

namespace App\Containers\CatalogSection\Attribute\UI\API\Controllers;

use App\Containers\CatalogSection\Attribute\Actions\Attributes\CreateAttributeAction;
use App\Containers\CatalogSection\Attribute\Actions\Attributes\DeleteAttributeAction;
use App\Containers\CatalogSection\Attribute\Actions\Attributes\FindAttributeByIdAction;
use App\Containers\CatalogSection\Attribute\Actions\Attributes\GetAllAction;
use App\Containers\CatalogSection\Attribute\Actions\Attributes\UpdateAttributeAction;
use App\Containers\CatalogSection\Attribute\UI\API\Transformers\AttributeTransformer;
use App\Ship\Helper\ApiResponse;
use App\Ship\Parents\Controllers\Controller;
use Illuminate\Http\Request;

class AttributeController extends Controller
{
    public function index(GetAllAction $action)
    {
        $attributes = $action->run();

        return ApiResponse::success((new AttributeTransformer)->collection($attributes), 'Attributes retrieved successfully');
    }

    public function store(Request $request, CreateAttributeAction $action)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255|unique:attributes,name',
            'data_type' => 'nullable|in:string,integer,float,boolean',
            'unit' => 'nullable|string|max:255',
            'is_filterable' => 'boolean',
            'is_required' => 'boolean',
        ]);

        $attribute = $action->run($data);

        return ApiResponse::success((new AttributeTransformer)->transform($attribute), 'Attribute created successfully');
    }

    public function show($id, FindAttributeByIdAction $action)
    {
        $attribute = $action->run($id);

        return ApiResponse::success((new AttributeTransformer)->transform($attribute), 'Attribute found successfully');
    }

    public function update(Request $request, $id, UpdateAttributeAction $action)
    {
        $data = $request->validate([
            'name' => 'sometimes|string|max:255',
            'unit' => 'sometimes|nullable|string|max:255',
            'is_filterable' => 'sometimes|boolean',
            'is_required' => 'sometimes|boolean',
        ]);

        $attribute = $action->run($id, $data);

        return ApiResponse::success((new AttributeTransformer)->transform($attribute), 'Attribute updated successfully');
    }

    public function destroy($id, DeleteAttributeAction $action)
    {
        $action->run($id);

        return ApiResponse::success(null, 'Attribute deleted successfully');
    }
}
