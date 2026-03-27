<?php

namespace App\Containers\CatalogSection\Attribute\UI\API\Controllers;

use App\Containers\CatalogSection\Attribute\Actions\CreateAttributeAction;
use App\Containers\CatalogSection\Attribute\Actions\DeleteAttributeAction;
use App\Containers\CatalogSection\Attribute\Actions\FindAttributeByIdAction;
use App\Containers\CatalogSection\Attribute\Actions\GetAllAction;
use App\Containers\CatalogSection\Attribute\Actions\UpdateAttributeAction;
use App\Ship\Helper\ApiResponse;
use App\Ship\Parents\Controllers\Controller;
use Illuminate\Http\Request;

class AttributeController extends Controller
{
    public function index(GetAllAction $getAllAction)
    {
        $attributes = $getAllAction->run();

        return ApiResponse::success($attributes);
    }

    public function store(Request $request, CreateAttributeAction $action)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255|unique:attributes,name',
            'data_type' => 'required|in:string,integer,float,boolean',
            'unit' => 'nullable|string|max:255',
            'is_filterable' => 'boolean',
            'is_required' => 'boolean',
        ]);

        return ApiResponse::success($action->run($data));
    }

    public function show($id, FindAttributeByIdAction $action)
    {
        $attribute = $action->run($id);

        return ApiResponse::success($attribute);
    }

    public function update(Request $request, $id, UpdateAttributeAction $action)
    {
        $data = $request->validate([
            'name' => 'sometimes|string|max:255',
            'unit' => 'sometimes|nullable|string|max:255',
            'is_filterable' => 'sometimes|boolean',
            'is_required' => 'sometimes|boolean',
        ]);

        return ApiResponse::success($action->run($id, $data));
    }

    public function destroy($id, DeleteAttributeAction $action)
    {
        return ApiResponse::success($action->run($id));
    }
}
