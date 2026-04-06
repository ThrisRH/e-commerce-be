<?php

namespace App\Containers\PromotionSection\Promotion\UI\API\Controllers;

use App\Containers\PromotionSection\Promotion\Actions\Promotions\CreatePromotionAction;
use App\Containers\PromotionSection\Promotion\Actions\Promotions\DeletePromotionAction;
use App\Containers\PromotionSection\Promotion\Actions\Promotions\GetPromotionAction;
use App\Containers\PromotionSection\Promotion\Actions\Promotions\UpdatePromotionAction;
use App\Containers\PromotionSection\Promotion\UI\API\Transformers\PromotionTransformer;
use App\Ship\Helper\ApiResponse;
use App\Ship\Parents\Controllers\Controller;
use Illuminate\Http\Request;

class PromotionController extends Controller
{
    public function index(GetPromotionAction $action, Request $request)
    {
        $promotions = $action->run($request->limit ?? 10);

        return ApiResponse::success((new PromotionTransformer)->collection($promotions));
    }

    public function store(Request $request, CreatePromotionAction $action)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string|max:500',
            'type' => 'required|string|in:percentage,fixed',
            'strategy_key' => 'nullable|string|in:default,holiday_bonus',
            'value' => 'required|numeric',
            'max_discount' => 'nullable|numeric',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
            'stackable' => 'nullable|boolean',
            'is_active' => 'nullable|boolean',
            'priority' => 'nullable|integer',
            'usage_limit' => 'nullable|integer',

            'category_ids' => 'nullable|array',
            'category_ids.*' => 'exists:categories,id',
            'brand_ids' => 'nullable|array',
            'brand_ids.*' => 'exists:brands,id',
            'product_ids' => 'nullable|array',
            'product_ids.*' => 'exists:products,id',
        ]);

        $promotion = $action->run($data);

        return ApiResponse::success((new PromotionTransformer)->transform($promotion), 'Promotion created successfully');
    }

    public function show($id, GetPromotionAction $action)
    {
        $promotion = $action->runOne($id);

        return ApiResponse::success((new PromotionTransformer)->transform($promotion->load(['categories', 'brands', 'products'])));
    }

    public function update(Request $request, $id, UpdatePromotionAction $action)
    {
        $data = $request->validate([
            'name' => 'sometimes|required|string|max:255',
            'description' => 'nullable|string|max:500',
            'is_active' => 'sometimes|boolean',
            'category_ids' => 'sometimes|array',
            'brand_ids' => 'sometimes|array',
        ]);

        $promotion = $action->run($id, $data);

        return ApiResponse::success((new PromotionTransformer)->transform($promotion), 'Promotion updated successfully');
    }

    public function destroy($id, DeletePromotionAction $action)
    {
        $action->run($id);

        return ApiResponse::success(null, 'Promotion deleted successfully');
    }
}
