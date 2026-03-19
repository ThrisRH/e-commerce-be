<?php

namespace App\Http\Controllers;

use App\Facades\AttributeValidatorFacade;
use App\Helper\ApiResponse;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;

class ProductController extends Controller
{
    public function index()
    {
        $product = Product::latest()->paginate(10);

        return ApiResponse::success($product);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'image_url' => 'required|string|url',
            'stock' => 'required|integer|min:0',
            'price' => 'required|numeric|min:0',
            'brand_id' => 'required|exists:brands,id',
            'category_id' => 'required|exists:categories,id',
            'attributes' => 'required|array',
            'attributes.*.attribute_id' => 'required|exists:attributes,id',
            'attributes.*.value' => 'required',
        ]);

        DB::transaction(function () use ($data, &$product) {
            AttributeValidatorFacade::validate($data['category_id'], $data['attributes']);

            $product = Product::create([
                'name' => $data['name'],
                'category_id' => $data['category_id'],
                'description' => $data['description'],
                'image_url' => $data['image_url'],
                'stock' => $data['stock'],
                'price' => $data['price'],
                'brand_id' => $data['brand_id'],
            ]);

            foreach ($data['attributes'] as $attr) {
                $product->attributes()->create([
                    'attribute_id' => $attr['attribute_id'],
                    'value' => $attr['value'],
                ]);
            }
        });

        return ApiResponse::success($product, 'Product created successfully', Response::HTTP_CREATED);
    }

    public function show($id)
    {
        $product = Product::find($id);

        if (empty($product)) {
            return ApiResponse::error('Product not found', Response::HTTP_NOT_FOUND);
        }

        return ApiResponse::success($product);
    }

    public function update(Request $request, Product $product)
    {
        $data = $request->validate([
            'name' => 'sometimes|string|max:255',
            'description' => 'sometimes|string',
            'image_url' => 'sometimes|string|url',
            'stock' => 'sometimes|integer|min:0',
            'price' => 'sometimes|numeric|min:0',
            'brand_id' => 'sometimes|exists:brands,id',
            'category_id' => 'sometimes|exists:categories,id',
            'is_active' => 'sometimes|boolean',
            'attributes' => 'sometimes|array',
            'attributes.*.attribute_id' => 'required|exists:attributes,id',
            'attributes.*.value' => 'required',
        ]);

        if (empty($data)) {
            return ApiResponse::error('No data provided', Response::HTTP_BAD_REQUEST);
        }

        DB::transaction(function () use ($data, &$product) {
            AttributeValidatorFacade::validate($data['category_id'], $data['attributes']);

            $product->attributes()->delete();

            foreach ($data['attributes'] as $attr) {
                $product->attributes()->create([
                    'attribute_id' => $attr['attribute_id'],
                    'value' => $attr['value'],
                ]);
            }
        });

        return ApiResponse::success($product, 'Product updated successfully', Response::HTTP_OK);
    }

    public function destroy($id)
    {
        $product = Product::find($id);

        if (empty($product)) {
            return ApiResponse::error('Product not found', Response::HTTP_NOT_FOUND);
        }

        $product->delete();

        return ApiResponse::success(null, 'Product deleted successfully', Response::HTTP_OK);
    }
}
