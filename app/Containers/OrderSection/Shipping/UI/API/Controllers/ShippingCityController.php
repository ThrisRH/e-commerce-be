<?php

namespace App\Containers\OrderSection\Shipping\UI\API\Controllers;

use App\Containers\OrderSection\Shipping\Actions\City\CreateShippingCityAction;
use App\Containers\OrderSection\Shipping\Actions\City\DeleteShippingCityAction;
use App\Containers\OrderSection\Shipping\Actions\City\GetAllShippingCitiesAction;
use App\Containers\OrderSection\Shipping\Actions\City\UpdateShippingCityAction;
use App\Containers\OrderSection\Shipping\UI\API\Transformers\ShippingCityTransformer;
use App\Ship\Helper\ApiResponse;
use App\Ship\Parents\Controllers\Controller;
use Illuminate\Http\Request;

class ShippingCityController extends Controller
{
    public function index(GetAllShippingCitiesAction $action)
    {
        $cities = $action->run();

        $transfomer = new ShippingCityTransformer;
        $data = $transfomer->collection($cities);

        return ApiResponse::success($data);
    }

    public function store(Request $request, CreateShippingCityAction $action)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'code' => 'required|string|max:255',
            'level_code' => 'nullable|string|max:255',
            'description' => 'nullable|string|max:255',
            'priority' => 'nullable|integer|min:0',
        ]);
        $city = $action->run($data);

        return ApiResponse::success($city, 201);
    }

    public function update(Request $request, UpdateShippingCityAction $action)
    {
        $data = $request->validate([
            'name' => 'nullable|string|max:255',
            'code' => 'nullable|string|max:255',
            'level_code' => 'nullable|string|max:255',
            'description' => 'nullable|string|max:255',
            'priority' => 'nullable|integer|min:0',
        ]);
        $city = $action->run($request->id, $data);

        return ApiResponse::success($city);
    }

    public function delete(int $id, DeleteShippingCityAction $action)
    {
        $action->run($id);

        return ApiResponse::success(null, 'Shipping city deleted successfully');
    }
}
