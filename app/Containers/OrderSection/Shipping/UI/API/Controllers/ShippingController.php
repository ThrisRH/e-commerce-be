<?php

namespace App\Containers\OrderSection\Shipping\UI\API\Controllers;

use App\Containers\OrderSection\Shipping\Actions\ShippingRate\IdentifyShippingRateAction;
use App\Containers\OrderSection\Shipping\SubActions\CalculateShippingFeeSubAction;
use App\Containers\OrderSection\Shipping\UI\API\Transformer\ShippingRateTransformer;
use App\Ship\Helper\ApiResponse;
use App\Ship\Parents\Controllers\Controller;
use Illuminate\Http\Request;

class ShippingController extends Controller
{
    public function calculateFee(Request $request, CalculateShippingFeeSubAction $action)
    {
        $data = $request->validate([
            'from.province' => 'nullable|string',
            'from.district' => 'nullable|string',
            'from.ward' => 'nullable|string',
            'to.province' => 'required|string',
            'to.district' => 'required|string',
            'to.ward' => 'nullable|string',
            'shipping_method_id' => 'required|integer',
        ]);

        if (empty($data['from'])) {
            $data['from'] = [
                'province' => 'Hồ Chí Minh',
                'district' => 'Quận 1',
                'ward' => 'Phường Bến Nghé',
            ];
        }

        $result = $action->run($data);

        return ApiResponse::success($result);
    }

    public function identifyShippingRate(Request $request, IdentifyShippingRateAction $action)
    {
        $data = $request->validate([
            'province' => 'required|string',
            'district' => 'required|string',
            'ward' => 'nullable|string',
            'shipping_method_id' => 'required|integer',
        ]);

        $shippingRate = $action->run($data);

        if (! $shippingRate) {
            return ApiResponse::error('Shipping rate not found for this address', 404);
        }

        $transformer = new ShippingRateTransformer;

        return ApiResponse::success($transformer->transform($shippingRate));
    }
}
