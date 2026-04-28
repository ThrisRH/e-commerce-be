<?php

namespace App\Containers\OrderSection\Shipping\UI\API\Controllers;

use App\Containers\OrderSection\Shipping\Actions\Route\CreateShippingRouteAction;
use App\Containers\OrderSection\Shipping\Actions\Route\DeleteShippingRouteAction;
use App\Containers\OrderSection\Shipping\Actions\Route\FindShippingRouteByNameAction;
use App\Containers\OrderSection\Shipping\Actions\Route\GetAllShippingRoutesAction;
use App\Containers\OrderSection\Shipping\Actions\Route\UpdateShippingRouteAction;
use App\Containers\OrderSection\Shipping\UI\API\Transformers\ShippingRouteTransformer;
use App\Ship\Helper\ApiResponse;
use App\Ship\Parents\Controllers\Controller;
use Illuminate\Http\Request;

class ShippingRouteController extends Controller
{
    public function index(GetAllShippingRoutesAction $action)
    {
        $routes = $action->run();

        $transformer = app(ShippingRouteTransformer::class);

        $routes->setCollection(
            $transformer->collection($routes->getCollection())
        );

        return ApiResponse::success($routes);
    }

    public function store(Request $request, CreateShippingRouteAction $action)
    {
        $data = $request->validate([
            'start_id' => 'required|exists:shipping_areas,id',
            'end_id' => 'required|exists:shipping_areas,id',
            'cost' => 'required|numeric|min:0',
            'level_code' => 'nullable|string|max:255',
        ]);
        $route = $action->run($data);

        return ApiResponse::success($route, 201);
    }

    public function update(Request $request, UpdateShippingRouteAction $action)
    {
        $data = $request->validate([
            'start_id' => 'sometimes|required|exists:shipping_areas,id',
            'end_id' => 'sometimes|required|exists:shipping_areas,id',
            'cost' => 'sometimes|required|numeric|min:0',
            'level_code' => 'nullable|string|max:255',
        ]);
        $route = $action->run($request->id, $data);

        return ApiResponse::success($route);
    }

    public function findByRoute(Request $request, FindShippingRouteByNameAction $action)
    {
        $data = $request->validate([
            'from.city' => 'nullable|string',
            'from.province' => 'nullable|string',
            'to.city' => 'nullable|string',
            'to.province' => 'nullable|string',
        ]);

        $route = $action->run($data);

        return ApiResponse::success($route);
    }

    public function delete(int $id, DeleteShippingRouteAction $action)
    {
        $action->run($id);

        return ApiResponse::success(null, 'Shipping route deleted successfully');
    }
}
