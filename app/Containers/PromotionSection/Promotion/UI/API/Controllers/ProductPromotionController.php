<?php

namespace App\Containers\PromotionSection\Promotion\UI\API\Controllers;

use App\Containers\PromotionSection\Promotion\Actions\ProductPromotionActions\CreateProductPromotionAction;
use App\Containers\PromotionSection\Promotion\Actions\ProductPromotionActions\GetProductPromotionAction;
use App\Containers\PromotionSection\Promotion\UI\API\Transformers\ProductPromotionTransfomer;
use App\Ship\Helper\ApiResponse;
use App\Ship\Parents\Controllers\Controller;
use Illuminate\Http\Request;

class ProductPromotionController extends Controller
{
    public function index()
    {
        $data = app(GetProductPromotionAction::class)->run();

        return ApiResponse::success((new ProductPromotionTransfomer)->collection($data));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'product_id' => 'required|exists:products,id',
            'promotion_id' => 'required|exists:promotions,id',
        ]);

        $productPromotion = app(CreateProductPromotionAction::class)->run($data);

        return ApiResponse::success($productPromotion);
    }

    public function show($id) {}

    public function update(Request $request, $id) {}

    public function destroy($id) {}
}
