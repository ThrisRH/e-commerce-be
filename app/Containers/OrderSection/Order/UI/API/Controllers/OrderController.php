<?php

namespace App\Containers\OrderSection\Order\UI\API\Controllers;

use App\Containers\OrderSection\Order\Actions\Orders\CreateOrderAction;
use App\Containers\OrderSection\Order\Actions\Orders\GetAllOrderAction;
use App\Containers\OrderSection\Order\Models\Order;
use App\Containers\OrderSection\Order\UI\API\Transformer\OrderTransformer;
use App\Ship\Helper\ApiResponse;
use App\Ship\Parents\Controllers\Controller;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $orders = app(GetAllOrderAction::class)->run();

        return ApiResponse::success(new OrderTransformer()->collection($orders));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, CreateOrderAction $action)
    {
        $data = $request->validate([
            'user_id' => 'required|exists:users,id',
            'total_amount' => 'required|numeric',
            'shipping_fee' => 'required|numeric',
            'status' => 'required|string',
            'shipping_name' => 'required|string',
            'shipping_phone' => 'required|string',
            'shipping_address' => 'required|string',
            'payment_method' => 'required|string',
            'payment_status' => 'required|string',
            'transaction_id' => 'nullable|string',
            'note' => 'nullable|string',
            'items' => 'required|array',
            'items.*.product_id' => 'required|exists:products,id',
            'items.*.quantity' => 'required|integer',
            'items.*.price' => 'required|numeric',
        ]);

        $order = $action->run($data);

        return ApiResponse::success(new OrderTransformer()->transform($order->load('orderItems')));

    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        //
    }
}
