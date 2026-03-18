<?php

namespace App\Http\Controllers;

use App\Helper\ApiResponse;
use App\Models\Product;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ProductController extends Controller
{
    public function index()
    {
        $product = Product::latest()->paginate(10);

        if (empty($product)) {
            return ApiResponse::error('No products found');
        }

        return ApiResponse::success($product);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'image_url' => 'string|url',
            'stock' => 'required|integer|min:0',
            'price' => 'required|numeric|min:0',
            'brand_id' => 'required|exists:brands,id',
            'category_id' => 'required|exists:categories,id',
            'is_active' => 'boolean',
        ]);

        try {
            $product = Product::create($data);

            return ApiResponse::success($product, 'Product created successfully', Response::HTTP_CREATED);
        } catch (\Exception $e) {
            return ApiResponse::error('Failed to create product', Response::HTTP_INTERNAL_SERVER_ERROR);
        }
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
        ]);

        if (empty($data)) {
            return ApiResponse::error('No data provided', Response::HTTP_BAD_REQUEST);
        }

        $product->update($data);

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
