<?php

namespace App\Containers\OrderSection\Order\Actions\Orders;

use App\Containers\CatalogSection\Product\Tasks\Products\FindProductByIdTask;
use App\Containers\OrderSection\Order\Tasks\OrderItems\CreateOrderItemsTask;
use App\Containers\OrderSection\Order\Tasks\Orders\CalculatorOrderTotalTask;
use App\Containers\OrderSection\Order\Tasks\Orders\CheckProductStockTask;
use App\Containers\OrderSection\Order\Tasks\Orders\CreateOrderTask;
use App\Containers\OrderSection\Order\Tasks\Orders\DecreaseProductStockTask;
use App\Containers\OrderSection\Order\Tasks\Orders\GenerateOrderTrackingNumberTask;
use App\Ship\Parents\Actions\Action;
use Illuminate\Support\Facades\DB;

class CreateOrderAction extends Action
{
    public function __construct(
        private CheckProductStockTask $checkProductStockTask,
        private FindProductByIdTask $findProductByIdTask,
        private DecreaseProductStockTask $decreaseProductStockTask,
        private CreateOrderTask $createOrderTask,
        private CreateOrderItemsTask $createOrderItemsTask,
        private CalculatorOrderTotalTask $calculatorOrderTotalTask,
        private GenerateOrderTrackingNumberTask $generateOrderTrackingNumberTask
    ) {}

    public function run(array $data)
    {
        $items = $data['items'];
        unset($data['items']);

        return DB::transaction(function () use ($data, $items) {
            $total = $this->calculatorOrderTotalTask->run($items);

            $data['total_amount'] = $total;
            $data['tracking_code'] = $this->generateOrderTrackingNumberTask->run();

            $order = $this->createOrderTask->run($data);

            foreach ($items as $item) {
                $product = $this->findProductByIdTask->run($item['product_id']);
                $this->checkProductStockTask->run($product, $item['quantity']);
                $this->decreaseProductStockTask->run($product, $item['quantity']);

                $this->createOrderItemsTask->run([
                    'order_id' => $order->id,
                    'product_id' => $item['product_id'],
                    'quantity' => $item['quantity'],
                ]);

            }

            return $order;
        });
    }
}
