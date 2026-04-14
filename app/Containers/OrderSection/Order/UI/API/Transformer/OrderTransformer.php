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

            'subtotal' => $order->subtotal,
            'shipping_fee' => $order->shipping_fee,
            'total' => $order->total,

            'status' => $order->status,
            'payment_method' => $order->payment_method,
            'payment_status' => $order->payment_status,

            'shipping_name' => $order->shipping_name,
            'shipping_phone' => $order->shipping_phone,
            'shipping_address' => $order->shipping_address,

            'note' => $order->note,

            'items' => $order->orderItems->map(function ($item) {
                $price = $item->variant ? $item->variant->price : ($item->product->price ?? 0);
                return [
                    'id' => $item->id,
                    'product_id' => $item->product_id,
                    'variant_id' => $item->product_variant_id,

                    'product_name' => $item->variant?->productItem?->name ?? ($item->product->name ?? null),
                    'product_image' => $item->variant?->image_url ?? ($item->product->image_url ?? null),
                    'sku' => $item->variant?->sku,
                    'slug' => $item->variant?->productItem?->slug,

                    'quantity' => $item->quantity,
                    'price' => (float) $price,
                    'total' => (float) ($price * $item->quantity),
                    'attributes' => $item->variant?->variantValues->map(function ($value) {
                        return [
                            'name' => $value->attributeValue?->attribute?->name,
                            'value' => $value->attributeValue?->value,
                        ];
                    }),
                ];
            }),

            'created_at' => $order->created_at,
            'updated_at' => $order->updated_at,
        ];
    }
}
