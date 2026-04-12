<?php

namespace App\Containers\CatalogSection\Attribute\UI\API\Controllers;

use App\Containers\CatalogSection\Attribute\Actions\AttributeValues\CreateAttributeValueAction;
use App\Containers\CatalogSection\Attribute\Actions\AttributeValues\DeleteAttributeValueAction;
use App\Containers\CatalogSection\Attribute\Actions\AttributeValues\GetAttributeValueAction;
use App\Containers\CatalogSection\Attribute\Actions\AttributeValues\UpdateAttributeValueAction;
use App\Containers\CatalogSection\Attribute\UI\API\Transformers\AttributeValueTransformer;
use App\Ship\Helper\ApiResponse;
use App\Ship\Parents\Controllers\Controller;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AttributeValueController extends Controller
{
    public function index(Request $request, GetAttributeValueAction $action)
    {
        $limit = $request->input('limit');

        $attributeValues = $action->run($limit ? (int) $limit : null);

        $transformer = new AttributeValueTransformer;

        if (method_exists($attributeValues, 'getCollection')) {
            $attributeValues->setCollection(
                $transformer->collection($attributeValues->getCollection())
            );

            return ApiResponse::success($attributeValues, 'Attribute values retrieved successfully');
        }

        return ApiResponse::success($transformer->collection($attributeValues), 'Attribute values retrieved successfully');
    }

    public function store(Request $request, CreateAttributeValueAction $action)
    {
        $data = $request->validate([
            'attribute_id' => 'required|exists:attributes,id',
            'value' => 'required|string|max:255',
            'unit' => 'nullable|string|max:255',
        ]);

        $attributeValue = $action->run($data);

        return ApiResponse::success((new AttributeValueTransformer)->transform($attributeValue), 'Attribute value created successfully', Response::HTTP_CREATED);
    }

    public function update(Request $request, $id, UpdateAttributeValueAction $action)
    {
        $isPut = $request->isMethod('put');
        $data = $request->validate([
            'value' => $isPut ? 'required|string|max:255' : 'sometimes|string|max:255',
            'unit' => $isPut ? 'nullable|string|max:255' : 'sometimes|nullable|string|max:255',
            'attribute_id' => $isPut ? 'required|exists:attributes,id' : 'sometimes|exists:attributes,id',
        ]);

        $attributeValue = $action->run($id, $data);

        return ApiResponse::success((new AttributeValueTransformer)->transform($attributeValue), 'Attribute value updated successfully');
    }

    public function destroy($id, DeleteAttributeValueAction $action)
    {
        $action->run($id);

        return ApiResponse::success(null, 'Attribute value deleted successfully');
    }
}
