<?php

namespace App\Containers\OrderSection\Order\UI\API\Controllers;

use App\Containers\OrderSection\Order\Actions\Orders\CreateOrderAction;
use App\Containers\OrderSection\Order\Actions\Orders\SearchOrdersAction;
use App\Containers\OrderSection\Order\Actions\Orders\GetAllOrderAction;
use App\Containers\OrderSection\Order\Actions\Orders\GetOrderByIdAction;
use App\Containers\OrderSection\Order\Actions\Orders\GetWeeklyRevenueAction;
use App\Containers\OrderSection\Order\Actions\Orders\UpdateOrderAction;
use App\Containers\OrderSection\Order\UI\API\Transformer\OrderTransformer;
use App\Ship\Enums\OrderStatus;
use App\Ship\Enums\PaymentStatus;
use App\Ship\Helper\ApiResponse;
use App\Ship\Parents\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

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
            'payment_method' => 'required|string',
            'note' => 'nullable|string',
            'items' => 'required|array',
            'items.*.product_id' => 'required|exists:products,id',
            'items.*.quantity' => 'required|integer',
            'distance' => 'nullable|integer',
        ]);

        $order = $action->run($data);

        return ApiResponse::success(new OrderTransformer()->transform($order->load('orderItems')));

    }

    public function show(Request $request, GetOrderByIdAction $action)
    {
        $order = $action->run($request->id);

        return ApiResponse::success(new OrderTransformer()->transform($order));
    }

    public function update(int $id, Request $request, UpdateOrderAction $action)
    {
        $data = $request->validate([
            'status' => ['sometimes', 'required', Rule::enum(OrderStatus::class)],
            'payment_status' => ['sometimes', 'required', Rule::enum(PaymentStatus::class)],
            'shipping_name' => 'sometimes|required|string',
            'shipping_phone' => 'sometimes|required|string',
            'shipping_address' => 'sometimes|required|string',
            'note' => 'sometimes|nullable|string',
        ]);

        $order = $action->run($id, $data);

        return ApiResponse::success(new OrderTransformer()->transform($order));
    }

    public function weeklyRevenue(GetWeeklyRevenueAction $action)
    {
        $revenue = $action->run();

        return ApiResponse::success($revenue);
    }

    public function search(Request $request, SearchOrdersAction $action)
    {
        $filters = $request->validate([
            'tracking_code' => 'nullable|string',
            'shipping_phone' => 'nullable|string',
        ]);

        $orders = $action->run($filters);

        return ApiResponse::success(app(OrderTransformer::class)->collection($orders));
    }
}
