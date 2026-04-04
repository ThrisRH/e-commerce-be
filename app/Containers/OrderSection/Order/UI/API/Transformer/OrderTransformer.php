<?php

namespace App\Containers\OrderSection\Order\UI\API\Transformer;

use App\Ship\Parents\Transformers\Transformer;

class OrderTransformer extends Transformer
{
    public function collection($orders)
    {
        return $orders->map(fn ($order) => $this->transform($order));
    }

    public function transform($order)
    {
        return [
            'id' => $order->id,
            'user_id' => $order->user_id,
            'tracking_code' => $order->tracking_code,
            'total_amount' => $order->total_amount,
            'shipping_fee' => $order->shipping_fee,
            'tracking_code' => $order->tracking_code,
            'status' => $order->status,
            'shipping_name' => $order->shipping_name,
            'shipping_phone' => $order->shipping_phone,
            'shipping_address' => $order->shipping_address,
            'payment_method' => $order->payment_method,
            'payment_status' => $order->payment_status,
            'transaction_id' => $order->transaction_id,
            'note' => $order->note,

            'items' => $order->orderItems,

            'created_at' => $order->created_at,
            'updated_at' => $order->updated_at,
        ];
    }
}
