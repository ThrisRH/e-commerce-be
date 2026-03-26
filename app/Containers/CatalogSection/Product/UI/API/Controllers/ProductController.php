<?php

namespace App\Containers\CatalogSection\Product\UI\API\Controllers;

use App\Containers\CatalogSection\Product\Actions\CreateProductAction;
use App\Containers\CatalogSection\Product\Actions\DeleteProductAction;
use App\Containers\CatalogSection\Product\Actions\FindProductByIdAction;
use App\Containers\CatalogSection\Product\Actions\GetAllProductsAction;
use App\Containers\CatalogSection\Product\Actions\UpdateProduct;
use App\Containers\CatalogSection\Product\Models\Product;
use App\Containers\CatalogSection\Product\UI\API\Transformers\ProductTransfomer;
use App\Ship\Helper\ApiResponse;
use App\Ship\Parents\Controllers\Controller;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ProductController extends Controller
{
    public function index(GetAllProductsAction $action)
    {
        $products = $action->run();
        return ApiResponse::success((new ProductTransfomer)->collection($products));
    }

    public function store(Request $request, CreateProductAction $action)
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

        $product = $action->run($data);

        return ApiResponse::success(new ProductTransfomer()->transform($product), 'Product created successfully', Response::HTTP_CREATED);
    }

    public function show($id, FindProductByIdAction $action)
    {
        $product = $action->run($id);
        return ApiResponse::success(new ProductTransfomer()->transform($product));
    }

    public function update(Request $request, Product $product, UpdateProduct $action)
    {
        $isPut = $request->isMethod('put');

        $data = $request->validate([
            'name' => ($isPut ? 'required' : 'sometimes').'|string|max:255',
            'description' => ($isPut ? 'required' : 'sometimes').'|string',
            'image_url' => ($isPut ? 'required' : 'sometimes').'|string|url',
            'stock' => ($isPut ? 'required' : 'sometimes').'|integer|min:0',
            'price' => ($isPut ? 'required' : 'sometimes').'|numeric|min:0',
            'brand_id' => ($isPut ? 'required' : 'sometimes').'|exists:brands,id',
            'category_id' => ($isPut ? 'required' : 'sometimes').'|exists:categories,id',

            'attributes' => ($isPut ? 'required' : 'sometimes').'|array',
            'attributes.*.attribute_id' => 'required_with:attributes|exists:attributes,id',
            'attributes.*.value' => 'required_with:attributes',
        ]);

        $product = $action->run($product, $data);

        return ApiResponse::success(new ProductTransfomer()->transform($product), 'Product updated successfully');
    }

    public function destroy($id, DeleteProductAction $action)
    {
        $action->run($id);
        return ApiResponse::success(null, 'Product deleted successfully');
    }
}
