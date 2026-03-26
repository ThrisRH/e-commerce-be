<?php

namespace App\Containers\CatalogSection\Attribute\UI\API\Controllers;

use App\Containers\CatalogSection\Attribute\Actions\CreateAttributeAction;
use App\Containers\CatalogSection\Attribute\Actions\GetAllAction;
use App\Containers\CatalogSection\Attribute\Models\Attribute;
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

    public function create()
    {
        //
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

        try {
            return ApiResponse::success($action->run($data));
        } catch (\Exception $e) {
            return ApiResponse::error($e->getMessage());
        }
    }

    public function show($id)
    {
        try {
            $attribute = Attribute::findOrFail($id);

            return ApiResponse::success($attribute);
        } catch (\Exception $e) {
            return ApiResponse::error($e->getMessage());
        }
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'name' => 'sometimes|string|max:255',
            'unit' => 'sometimes|nullable|string|max:255',
            'is_filterable' => 'sometimes|boolean',
            'is_required' => 'sometimes|boolean',
        ]);

        try {
            $attribute = Attribute::findOrFail($id);
            $attribute->update($data);

            return ApiResponse::success($attribute);
        } catch (\Exception $e) {
            return ApiResponse::error($e->getMessage());
        }
    }

    public function destroy($id)
    {
        try {
            $attribute = Attribute::findOrFail($id);
            $attribute->delete();

            return ApiResponse::success($attribute);
        } catch (\Exception $e) {
            return ApiResponse::error($e->getMessage());
        }
    }
}
