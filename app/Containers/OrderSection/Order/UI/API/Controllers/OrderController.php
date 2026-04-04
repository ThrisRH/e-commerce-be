<?php

namespace App\Containers\OrderSection\Order\UI\API\Controllers;

use App\Containers\OrderSection\Order\Actions\Orders\CreateOrderAction;
use App\Containers\OrderSection\Order\Actions\Orders\GetAllOrderAction;
use App\Containers\OrderSection\Order\UI\API\Transformer\OrderTransformer;
use App\Ship\Helper\ApiResponse;
use App\Ship\Parents\Controllers\Controller;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $orders = app(GetAllOrderAction::class)->run($request->limit ?? 10);

        $transformer = app(OrderTransformer::class);

        $orders->setCollection(
            $transformer->collection($orders->getCollection())
        );

        return ApiResponse::success($orders);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, CreateOrderAction $action)
    {
        $data = $request->validate([
            'user_id' => 'nullable|exists:users,id',
            'shipping_name' => 'required|string',
            'shipping_phone' => 'required|string',
            'shipping_address' => 'required|string',
            'note' => 'nullable|string',
            'items' => 'required|array',
            'items.*.product_id' => 'required|exists:products,id',
            'items.*.quantity' => 'required|integer',
        ]);

        $order = $action->run($data);

        return ApiResponse::success(new OrderTransformer()->transform($order->load('orderItems')));

    }
}
