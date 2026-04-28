<?php

namespace App\Containers\OrderSection\Shipping\UI\API\Controllers;

use App\Containers\OrderSection\Shipping\Actions\Province\CreateShippingProvinceAction;
use App\Containers\OrderSection\Shipping\Actions\Province\DeleteShippingProvinceAction;
use App\Containers\OrderSection\Shipping\Actions\Province\GetAllShippingProvincesAction;
use App\Containers\OrderSection\Shipping\Actions\Province\UpdateShippingProvinceAction;
use App\Containers\OrderSection\Shipping\UI\API\Transformers\ShippingProvinceTransformer;
use App\Ship\Helper\ApiResponse;
use App\Ship\Parents\Controllers\Controller;
use Illuminate\Http\Request;

class ShippingProvinceController extends Controller
{
    public function index(GetAllShippingProvincesAction $action)
    {
        $provinces = $action->run();

        $transfomer = new ShippingProvinceTransformer;
        $data = $transfomer->collection($provinces);

        return ApiResponse::success($data);
    }

    public function store(Request $request, CreateShippingProvinceAction $action)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'code' => 'required|string|max:255',
            'level_code' => 'nullable|string|max:255',
            'description' => 'nullable|string|max:255',
            'priority' => 'nullable|integer|min:0',
        ]);
        $province = $action->run($data);

        return ApiResponse::success($province, 201);
    }

    public function update(Request $request, UpdateShippingProvinceAction $action)
    {
        $data = $request->validate([
            'name' => 'nullable|string|max:255',
            'code' => 'nullable|string|max:255',
            'level_code' => 'nullable|string|max:255',
            'description' => 'nullable|string|max:255',
            'priority' => 'nullable|integer|min:0',
        ]);
        $province = $action->run($request->id, $data);

        return ApiResponse::success($province);
    }

    public function delete(int $id, DeleteShippingProvinceAction $action)
    {
        $action->run($id);

        return ApiResponse::success(null, 'Shipping province deleted successfully');
    }
}
