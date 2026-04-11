<?php

namespace App\Containers\CatalogSection\Product\UI\API\Controllers;

use App\Containers\CatalogSection\Product\Actions\Products\CreateProductAction;
use App\Containers\CatalogSection\Product\Actions\Products\DeleteProductAction;
use App\Containers\CatalogSection\Product\Actions\Products\FindProductByIdAction;
use App\Containers\CatalogSection\Product\Actions\Products\FindProductsByKeywordAction;
use App\Containers\CatalogSection\Product\Actions\Products\GetAllByCateAction;
use App\Containers\CatalogSection\Product\Actions\Products\GetAllProductsAction;
use App\Containers\CatalogSection\Product\Actions\Products\GetProductItemBySlugAction;
use App\Containers\CatalogSection\Product\Actions\Products\GetProductItemDetailForAdminAction;
use App\Containers\CatalogSection\Product\Actions\Products\UpdateProductAction;
use App\Containers\CatalogSection\Product\Actions\ProductVariant\CreateProductVariantAction;
use App\Containers\CatalogSection\Product\Actions\ProductVariant\DeleteProductVariantAction;
use App\Containers\CatalogSection\Product\UI\API\Transformers\ProductDetailAdminTransformer;
use App\Containers\CatalogSection\Product\UI\API\Transformers\ProductDetailTransformer;
use App\Containers\CatalogSection\Product\UI\API\Transformers\ProductItemTransformer;
use App\Containers\CatalogSection\Product\UI\API\Transformers\ProductTransfomer;
use App\Ship\Helper\ApiResponse;
use App\Ship\Parents\Controllers\Controller;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ProductController extends Controller
{
    public function index(GetAllProductsAction $action, Request $request)
    {
        $productItems = $action->run($request->limit ?? 10);

        $transform = new ProductItemTransformer;

        $productItems->setCollection(
            $transform->collection($productItems->getCollection())
        );

        return ApiResponse::success($productItems, 'Product items retrieved successfully');
    }

    public function adminIndex($slug, GetProductItemDetailForAdminAction $action)
    {
        $productItem = $action->run($slug);

        $tranfomer = new ProductDetailAdminTransformer;

        $productItem = $tranfomer->transform($productItem);

        return ApiResponse::success($productItem, 'Product item detail retrieved successfully');
    }

    public function store(Request $request, CreateProductAction $action)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'image_url' => 'required|string|url',
            'brand_id' => 'required|exists:brands,id',
            'category_id' => 'required|exists:categories,id',

            'children' => 'required|array|min:1',
            'children.*.name' => 'required|string|max:255',

            'children.*.attributes' => 'nullable|array',
            'children.*.attributes.*.attribute_value_id' => 'required|exists:attribute_values,id',

            'children.*.variants' => 'required|array|min:1',

            'children.*.variants.*.image_url' => 'nullable|string|url',
            'children.*.variants.*.price' => 'required|numeric|min:0',
            'children.*.variants.*.stock' => 'required|integer|min:0',

            'children.*.variants.*.attribute_value_id' => 'nullable|exists:attribute_values,id',

            'specs' => 'required|array|min:1',

            'specs.*.attribute_id' => 'required|exists:attributes,id',
            'specs.*.value' => 'required|string',
            'specs.*.unit' => 'nullable|string',
        ]);

        $product = $action->run($data);

        return ApiResponse::success($product, 'Product created successfully', Response::HTTP_CREATED);
    }

    public function storeVariant(Request $request, CreateProductVariantAction $action)
    {
        $data = $request->validate([
            'product_item_id' => 'required|exists:product_items,id',
            'image_url' => 'required|string|url',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'attributes' => 'required|array|min:1',
            'attributes.*.attribute_value_id' => 'required|exists:attribute_values,id',
        ]);

        $variant = $action->run($data);

        return ApiResponse::success($variant, 'Product variant created successfully', Response::HTTP_CREATED);
    }

    public function show($id, FindProductByIdAction $action)
    {
        $product = $action->run($id);

        return ApiResponse::success($product, 'Product found successfully');
    }

    public function showByCate(Request $request, GetAllByCateAction $action)
    {
        $cate_id = $request->query('id');
        $number = $request->query('number');

        $products = $action->run($cate_id, $number ?? null);

        return ApiResponse::success(new ProductTransfomer()->collection($products));
    }

    public function findProductByKeyword(Request $request, FindProductsByKeywordAction $action)
    {
        $keyword = $request->query('keyword');
        $limit = $request->query('limit', 10);

        if (! $keyword) {
            return ApiResponse::error('Keyword is required', Response::HTTP_BAD_REQUEST);
        }

        $products = $action->run($keyword, (int) $limit);

        $transformer = app(ProductTransfomer::class);

        $products->setCollection(
            $transformer->collection($products->getCollection())
        );

        return ApiResponse::success($products);
    }

    public function getProductBySlug($slug, Request $request, GetProductItemBySlugAction $action)
    {
        $sku = $request->query('sku');
        $product = $action->run($slug, $sku);

        // dd($product);

        return ApiResponse::success(new ProductDetailTransformer()->transform($product));
    }

    public function update(Request $request, UpdateProductAction $updateAction, FindProductByIdAction $findAction)
    {
        // $product = $findAction->run($request['id']);

        // $isPut = $request->isMethod('put');

        // $data = $request->validate([
        //     'name' => ($isPut ? 'required' : 'sometimes').'|string|max:255',
        //     'description' => ($isPut ? 'required' : 'sometimes').'|string',
        //     'image_url' => ($isPut ? 'required' : 'sometimes').'|string|url',
        //     'stock' => ($isPut ? 'required' : 'sometimes').'|integer|min:0',
        //     'price' => ($isPut ? 'required' : 'sometimes').'|numeric|min:0',
        //     'brand_id' => ($isPut ? 'required' : 'sometimes').'|exists:brands,id',
        //     'category_id' => ($isPut ? 'required' : 'sometimes').'|exists:categories,id',
        //     'is_active' => ($isPut ? 'required' : 'sometimes').'|boolean',

        //     'attributes' => ($isPut ? 'required' : 'sometimes').'|array',
        //     'attributes.*.attribute_id' => 'required_with:attributes|exists:attributes,id',
        //     'attributes.*.value' => 'required_with:attributes',
        // ]);

        // if (empty($data)) {
        //     return ApiResponse::error('No data provided', Response::HTTP_BAD_REQUEST);
        // }

        // $product = $updateAction->run($product, $data);

        // return ApiResponse::success(new ProductTransfomer()->transform($product), 'Product updated successfully');
    }

    public function destroy($id, DeleteProductAction $action)
    {
        $action->run($id);

        return ApiResponse::success(null, 'Product deleted successfully');
    }

    public function deleteProductVariant($id, DeleteProductVariantAction $action)
    {
        $action->run($id);

        return ApiResponse::success(null, 'Product variant deleted successfully');
    }
}
