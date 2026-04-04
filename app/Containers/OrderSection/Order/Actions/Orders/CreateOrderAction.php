<?php

namespace App\Containers\OrderSection\Order\Actions\Orders;

use App\Containers\OrderSection\Order\Tasks\OrderItems\CreateOrderItemsTask;
use App\Containers\OrderSection\Order\Tasks\Orders\CalculatorOrderTotalTask;
use App\Containers\OrderSection\Order\Tasks\Orders\CreateOrderTask;
use App\Containers\OrderSection\Order\Tasks\Orders\GenerateOrderTrackingNumberTask;
use App\Ship\Parents\Actions\Action;
use Illuminate\Support\Facades\DB;

class CreateOrderAction extends Action
{
    private CreateOrderTask $createOrderTask;

    private CreateOrderItemsTask $createOrderItemsTask;

    private CalculatorOrderTotalTask $calculatorOrderTotalTask;

    private GenerateOrderTrackingNumberTask $generateOrderTrackingNumberTask;

    public function __construct(
        CreateOrderTask $createOrderTask,
        CreateOrderItemsTask $createOrderItemsTask,
        CalculatorOrderTotalTask $calculatorOrderTotalTask,
        GenerateOrderTrackingNumberTask $generateOrderTrackingNumberTask
    ) {
        $this->createOrderTask = $createOrderTask;
        $this->createOrderItemsTask = $createOrderItemsTask;
        $this->calculatorOrderTotalTask = $calculatorOrderTotalTask;
        $this->generateOrderTrackingNumberTask = $generateOrderTrackingNumberTask;
    }

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
