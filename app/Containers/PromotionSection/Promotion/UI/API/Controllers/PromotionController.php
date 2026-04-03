<?php

namespace App\Containers\PromotionSection\Promotion\UI\API\Controllers;

use App\Containers\PromotionSection\Promotion\Actions\PromotionActions\CreatePromotionAction;
use App\Containers\PromotionSection\Promotion\Actions\PromotionActions\GetPromotionAction;
use App\Containers\PromotionSection\Promotion\UI\API\Transformers\PromotionTransformer;
use App\Ship\Helper\ApiResponse;
use App\Ship\Parents\Controllers\Controller;
use Illuminate\Http\Request;

class PromotionController extends Controller
{
    public function index()
    {
        $promotion = app(GetPromotionAction::class)->run();

        return ApiResponse::success((new PromotionTransformer)->transform($promotion));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'string|max:255',
            'type' => 'required|string|in:percentage,fixed,override',
            'value' => 'required|numeric',
            'max_discount' => 'nullable|numeric',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'stackable' => 'nullable|boolean',
            'is_active' => 'nullable|boolean',
            'priority' => 'nullable|integer',
            'usage_limit' => 'nullable|integer',
            'usage_count' => 'nullable|integer',
        ]);

        $promotion = app(CreatePromotionAction::class)->run($data);

        return ApiResponse::success((new PromotionTransformer)->transform($promotion), 'Promotion created successfully');
    }

    public function show($id) {}

    public function update(Request $request, $id) {}

    public function destroy($id) {}
}
