<?php

namespace App\Containers\OrderSection\Shipping\UI\API\Controllers;

use App\Containers\OrderSection\Shipping\SubActions\CalculateShippingFeeSubAction;
use App\Ship\Helper\ApiResponse;
use App\Ship\Parents\Controllers\Controller;
use Illuminate\Http\Request;

class ShippingController extends Controller
{
    public function calculateFee(Request $request, CalculateShippingFeeSubAction $action)
    {
        $data = $request->validate([
            'from.city' => 'nullable|string',
            'from.province' => 'nullable|string',
            'to.city' => 'nullable|string',
            'to.province' => 'nullable|string',
            'shipping_method_id' => 'required|integer',
            'items' => 'required|array',
            'items.*.sku' => 'required|string',
            'items.*.slug' => 'required|string',
            'items.*.quantity' => 'required|integer|min:1',
        ]);

        if (empty($data['from'])) {
            $data['from'] = [
                'city' => 'HCM',
            ];
        }

        if (empty($data['from']['city'])) {
            $data['from']['city'] = $data['from']['district'] ?? null;
        }
        if (empty($data['to']['city'])) {
            $data['to']['city'] = $data['to']['district'] ?? null;
        }

        $result = $action->run($data);

        return ApiResponse::success($result);
    }
}
