<?php

namespace App\Containers\OrderSection\Order\Actions\Orders;

use App\Containers\OrderSection\Order\Tasks\Orders\GetOrderByIdTask;
use App\Containers\OrderSection\Order\Tasks\Orders\UpdateOrderTask;
use App\Ship\Parents\Actions\Action;

class UpdateOrderAction extends Action
{
    public function __construct(
        private GetOrderByIdTask $getOrderByIdTask,
        private UpdateOrderTask $updateOrderTask
    ) {}

    public function run(int $id, array $data)
    {
        $order = $this->getOrderByIdTask->run($id);
        return $this->updateOrderTask->run($order, $data);
    }
}
