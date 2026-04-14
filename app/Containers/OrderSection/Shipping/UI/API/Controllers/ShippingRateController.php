<?php

namespace App\Containers\OrderSection\Shipping\UI\API\Controllers;

use App\Containers\OrderSection\Shipping\Actions\ShippingRate\CreateShippingRateAction;
use App\Containers\OrderSection\Shipping\Actions\ShippingRate\DeleteShippingRateAction;
use App\Containers\OrderSection\Shipping\Actions\ShippingRate\FindShippingRateByIdAction;
use App\Containers\OrderSection\Shipping\Actions\ShippingRate\GetAllShippingRatesAction;
use App\Containers\OrderSection\Shipping\Actions\ShippingRate\UpdateShippingRateAction;
use App\Containers\OrderSection\Shipping\Models\ShippingRate;
use App\Containers\OrderSection\Shipping\UI\API\Transformer\ShippingRateTransformer;
use App\Ship\Helper\ApiResponse;
use App\Ship\Parents\Controllers\Controller;
use Illuminate\Http\Request;

class ShippingRateController extends Controller
{
    public function index(GetAllShippingRatesAction $action)
    {
        $rates = $action->run();
        $transformer = new ShippingRateTransformer;

        return ApiResponse::success($rates->map(fn ($r) => $transformer->transform($r)));
    }

    public function store(Request $request, CreateShippingRateAction $action)
    {
        $data = $request->validate([
            'shipping_zone_id' => 'required|integer|exists:shipping_zones,id',
            'shipping_method_id' => 'required|integer|exists:shipping_methods,id',
            'base_fee' => 'required|integer|min:0',
            'max_fee' => 'nullable|integer|min:0',
            'min_fee' => 'nullable|integer|min:0',
        ]);

        $rate = $action->run($data);
        $transformer = new ShippingRateTransformer;

        return ApiResponse::success($transformer->transform($rate->load('shippingZone', 'shippingMethod')), 201);
    }

    public function show(FindShippingRateByIdAction $action, int $id)
    {
        $rate = $action->run($id);

        if (! $rate) {
            return ApiResponse::error('Shipping rate not found', 404);
        }

        $transformer = new ShippingRateTransformer;

        return ApiResponse::success($transformer->transform($rate));
    }

    public function update(Request $request, UpdateShippingRateAction $action, ShippingRate $shippingRate)
    {
        $data = $request->validate([
            'shipping_zone_id' => 'sometimes|integer|exists:shipping_zones,id',
            'shipping_method_id' => 'sometimes|integer|exists:shipping_methods,id',
            'base_fee' => 'sometimes|integer|min:0',
            'max_fee' => 'nullable|integer|min:0',
            'min_fee' => 'nullable|integer|min:0',
        ]);

        $rate = $action->run($shippingRate, $data);
        $transformer = new ShippingRateTransformer;

        return ApiResponse::success($transformer->transform($rate));
    }

    public function destroy(DeleteShippingRateAction $action, ShippingRate $shippingRate)
    {
        $action->run($shippingRate);

        return ApiResponse::success(null, 204);
    }
}
