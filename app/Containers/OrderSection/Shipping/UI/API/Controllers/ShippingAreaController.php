<?php

namespace App\Containers\OrderSection\Shipping\UI\API\Controllers;

use App\Containers\OrderSection\Shipping\Actions\Area\CreateShippingAreaAction;
use App\Containers\OrderSection\Shipping\Actions\Area\DeleteShippingAreaAction;
use App\Containers\OrderSection\Shipping\Actions\Area\GetAllShippingAreasAction;
use App\Containers\OrderSection\Shipping\Actions\Area\UpdateShippingAreaAction;
use App\Containers\OrderSection\Shipping\UI\API\Transformers\ShippingAreaTransformer;
use App\Ship\Helper\ApiResponse;
use App\Ship\Parents\Controllers\Controller;
use Illuminate\Http\Request;

class ShippingAreaController extends Controller
{
    public function index(GetAllShippingAreasAction $action)
    {
        $areas = $action->run();

        $transfomer = new ShippingAreaTransformer;
        $data = $transfomer->collection($areas);

        return ApiResponse::success($data);
    }

    public function store(Request $request, CreateShippingAreaAction $action)
    {
        $data = $request->validate([
            'city_id' => 'nullable|exists:shipping_cities,id',
            'province_id' => 'nullable|exists:shipping_provinces,id',
            'level_code' => 'nullable|string|max:255',
        ]);
        $area = $action->run($data);

        return ApiResponse::success($area, 201);
    }

    public function update(Request $request, UpdateShippingAreaAction $action)
    {
        $data = $request->validate([
            'city_id' => 'nullable|exists:shipping_cities,id',
            'province_id' => 'nullable|exists:shipping_provinces,id',
            'level_code' => 'nullable|string|max:255',
        ]);
        $area = $action->run($request->id, $data);

        return ApiResponse::success($area);
    }

    public function delete(int $id, DeleteShippingAreaAction $action)
    {
        $action->run($id);

        return ApiResponse::success(null, 'Shipping area deleted successfully');
    }
}
