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
            'tracking_code' => $order->tracking_code,

            'total_amount' => $order->total_amount,
            'shipping_fee' => $order->shipping_fee,

            'status' => $order->status,
            'payment_method' => $order->payment_method,
            'payment_status' => $order->payment_status,

            'shipping_name' => $order->shipping_name,
            'shipping_phone' => $order->shipping_phone,
            'shipping_address' => $order->shipping_address,

            'note' => $order->note,

            'items' => $order->orderItems->map(function ($item) {
                return [
                    'id' => $item->id,
                    'product_id' => $item->product_id,

                    'product_name' => $item->product->name ?? null,
                    'product_image' => $item->product->image_url ?? null,

                    'quantity' => $item->quantity,
                    'price' => $item->product->price,
                    'total' => $item->product->price * $item->quantity,
                ];
            }),

            'created_at' => $order->created_at,
            'updated_at' => $order->updated_at,
        ];
    }
}
