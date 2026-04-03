<?php

namespace App\Containers\OrderSection\Order\Actions\Orders;

use App\Containers\OrderSection\Order\Tasks\OrderItems\CreateOrderItemsTask;
use App\Containers\OrderSection\Order\Tasks\Orders\CalculatorOrderTotalTask;
use App\Containers\OrderSection\Order\Tasks\Orders\CreateOrderTask;
use App\Ship\Parents\Actions\Action;
use Illuminate\Support\Facades\DB;

class CreateOrderAction extends Action
{
    public function run(array $data)
    {
        $items = $data['items'];
        unset($data['items']);

        return DB::transaction(function () use ($data, $items) {
            $total = app(CalculatorOrderTotalTask::class)->run($items);

            $data['total_amount'] = $total;

            $order = app(CreateOrderTask::class)->run($data);

            foreach ($items as $item) {
                app(CreateOrderItemsTask::class)->run([
                    'order_id' => $order->id,
                    'product_id' => $item['product_id'],
                    'quantity' => $item['quantity'],
                ]);
            }

            return $order;
        });
    }
}
