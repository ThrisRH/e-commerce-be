<?php

namespace App\Containers\OrderSection\Order\Actions\Orders;

use App\Containers\CatalogSection\Product\Tasks\Products\FindProductVariantBySkuAndSlugTask;
use App\Containers\OrderSection\Order\Tasks\OrderItems\CreateOrderItemsTask;
use App\Containers\OrderSection\Order\Tasks\Orders\CalculateShippingFeeTask;
use App\Containers\OrderSection\Order\Tasks\Orders\CalculateTotalQuantityTask;
use App\Containers\OrderSection\Order\Tasks\Orders\CalculatorOrderTotalTask;
use App\Containers\OrderSection\Order\Tasks\Orders\CheckProductStockTask;
use App\Containers\OrderSection\Order\Tasks\Orders\CreateOrderTask;
use App\Containers\OrderSection\Order\Tasks\Orders\DecreaseProductStockTask;
use App\Containers\OrderSection\Order\Tasks\Orders\GenerateOrderTrackingNumberTask;
use App\Containers\OrderSection\Shipping\SubActions\CalculateShippingFeeSubAction;
use App\Ship\Parents\Actions\Action;
use Illuminate\Support\Facades\DB;

class CreateOrderAction extends Action
{
    public function __construct(
        private CheckProductStockTask $checkProductStockTask,
        private FindProductVariantBySkuAndSlugTask $findProductVariantBySkuAndSlugTask,
        private DecreaseProductStockTask $decreaseProductStockTask,
        private CreateOrderTask $createOrderTask,
        private CreateOrderItemsTask $createOrderItemsTask,
        private CalculatorOrderTotalTask $calculatorOrderTotalTask,
        private CalculateShippingFeeTask $calculateShippingFeeTask,
        private CalculateTotalQuantityTask $calculateTotalQuantityTask,
        private GenerateOrderTrackingNumberTask $generateOrderTrackingNumberTask,

        private CalculateShippingFeeSubAction $calculateShippingFeeSubAction
    ) {}

    public function run(array $data)
    {
        $items = $data['items'];
        unset($data['items']);

        return DB::transaction(function () use ($data, $items) {
            $totalItemsPrice = $this->calculatorOrderTotalTask->run($items);
            $totalQuantity = $this->calculateTotalQuantityTask->run($items);

            $shippingFee = $this->calculateShippingFeeTask->run($totalQuantity, $totalItemsPrice);

            $data['subtotal'] = $totalItemsPrice;
            $data['shipping_fee'] = $shippingFee;
            $data['total'] = $totalItemsPrice + $shippingFee;
            $data['tracking_code'] = $this->generateOrderTrackingNumberTask->run();

            $shippingInfo = [
                'from' => $data['from'],
                'to' => $data['to'],
                'shipping_method_id' => $data['shipping_method_id'],
            ];

            $order = $this->createOrderTask->run($data);

            foreach ($items as $item) {
                $variant = $this->findProductVariantBySkuAndSlugTask->run($item['sku'], $item['slug']);

                if (! $variant) {
                    throw new \Exception("Product variant with SKU {$item['sku']} and slug {$item['slug']} not found");
                }

                $this->checkProductStockTask->run($variant, $item['quantity']);
                $this->decreaseProductStockTask->run($variant, $item['quantity']);

                $this->createOrderItemsTask->run([
                    'order_id' => $order->id,
                    'product_id' => $variant->productItem->product_id,
                    'product_variant_id' => $variant->id,
                    'quantity' => $item['quantity'],
                ]);

            }

            if ($order['subtotal'] < 4000000) {
                $shippingFee = $this->calculateShippingFeeSubAction->run($shippingInfo);
                dd($shippingFee);
            }

            $order['shipping_fee'] = 0;
            $order['total'] = $order['subtotal'];

            dd($order);

            return $order;
        });
    }
}
