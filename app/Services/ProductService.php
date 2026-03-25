<?php

namespace App\Services;

use App\Facades\AttributeValidatorFacade;
use App\Helper\ApiResponse;
use App\Http\Resources\ProductResource;
use App\Models\CategoryAttribute;
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

            $attributes = $data['attributes'] ?? null;

            $product->update(array_filter([
                'name' => $data['name'] ?? null,
                'description' => $data['description'] ?? null,
                'image_url' => $data['image_url'] ?? null,
                'stock' => $data['stock'] ?? null,
                'price' => $data['price'] ?? null,
                'brand_id' => $data['brand_id'] ?? null,
                'category_id' => $data['category_id'] ?? null,
            ], fn ($value) => ! is_null($value)));

            if (! is_null($attributes) || $attributes == []) {

                $validAttributeIds = CategoryAttribute::where('category_id', $product->category_id)
                    ->pluck('attribute_id')
                    ->toArray();

                $new = collect($attributes)->keyBy('attribute_id');
                $newIds = $new->keys()->toArray();

                $product->productAttributes()->whereNotIn('attribute_id', $newIds)->delete();

                foreach ($new as $attrId => $attr) {

                    if (! isset($attr['value'])) {
                        return ApiResponse::error("Attribute $attrId must have value");
                    }
                    if (! in_array($attrId, $validAttributeIds)) {
                        return ApiResponse::error("Attribute $attrId is not valid for this category");
                    }

                    $product->productAttributes()->updateOrCreate(
                        ['attribute_id' => $attrId],
                        ['value' => $attr['value']]
                    );
                }
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
