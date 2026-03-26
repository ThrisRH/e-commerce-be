<?php

namespace App\Http\Controllers;

use App\Containers\AppSection\Product\Models\Product;
use App\Containers\CatalogSection\Product\Actions\UpdateProduct;
use app\Containers\CatalogSection\Product\UI\API\Transformers\ProductTransfomer;
use App\Services\ProductService;
use App\Ship\Helper\ApiResponse;
use App\Ship\Parents\Controllers\Controller;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    protected $productService;

    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }

    public function index()
    {
        return $this->productService->getAlls();
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

        return $this->productService->create($data);
    }

    public function show($id)
    {
        return $this->productService->getById($id);
    }

    public function update(Request $request, Product $product)
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

        $product = app(UpdateProduct::class)->run($product, $data);

        return ApiResponse::success(new ProductTransfomer()->transform($product));
    }

    public function destroy($id)
    {
        return $this->productService->delete($id);
    }
}
