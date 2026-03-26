<?php

namespace App\Services;

use App\Actions\Product\SyncProductAttributes;
use App\Actions\Product\UpdateProduct as ProductUpdateProduct;
use App\Facades\AttributeValidatorFacade;
use App\Ship\Helper\ApiResponse;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;

class ProductService
{
    public function getAlls()
    {
        $product = Product::with('productAttributes.attribute', 'category', 'brand')->latest()->paginate(10);

        return ApiResponse::success(ProductResource::collection($product));
    }

    public function getById(int $id)
    {
        $product = Product::with('productAttributes.attribute', 'category', 'brand')->findOrFail($id);

        if (! $product) {
            return ApiResponse::error('Product not found', Response::HTTP_NOT_FOUND);
        }

        return ApiResponse::success(new ProductResource($product));
    }

    public function getBySlug($slug)
    {
        $product = Product::where('slug', $slug)->first();
        if (! $product) {
            return ApiResponse::error('Product not found', Response::HTTP_NOT_FOUND);
        }

        return ApiResponse::success($product);
    }

    public function create(array $data)
    {
        return DB::transaction(function () use ($data) {
            AttributeValidatorFacade::validate($data['category_id'], $data['attributes']);

            $product = Product::create([
                'name' => $data['name'],
                'description' => $data['description'],
                'image_url' => $data['image_url'],
                'stock' => $data['stock'],
                'price' => $data['price'],
                'brand_id' => $data['brand_id'],
                'category_id' => $data['category_id'],
            ]);

            foreach ($data['attributes'] as $attr) {
                $product->productAttributes()->create([
                    'attribute_id' => $attr['attribute_id'],
                    'value' => $attr['value'],
                ]);
            }

            return ApiResponse::success($product, 'Product created successfully', Response::HTTP_CREATED);
        });
    }

    public function update(int $id, array $data)
    {
        return DB::transaction(function () use ($id, $data) {

            $product = Product::find($id);

            if (! $product) {
                return ApiResponse::error('Product not found', Response::HTTP_NOT_FOUND);
            }

            app(ProductUpdateProduct::class)->handle($product, $data);

            if (array_key_exists('attributes', $data)) {
                app(SyncProductAttributes::class)->handle($product, $data['attributes']);
            }

            return ApiResponse::success(new ProductResource($product), 'Product updated successfully');
        });
    }

    public function delete(int $id)
    {
        $product = Product::find($id);

        if (! $product) {
            return ApiResponse::error('Product not found', Response::HTTP_NOT_FOUND);
        }

        $product->delete();

        return ApiResponse::success(null, 'Product deleted successfully');
    }
}
