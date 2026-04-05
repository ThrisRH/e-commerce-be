<?php

namespace App\Containers\OrderSection\Order\Actions\Orders;

use App\Containers\OrderSection\Order\Tasks\Orders\GetOrderByIdTask;
use App\Ship\Parents\Actions\Action;

class GetOrderByIdAction extends Action
{
    public function __construct(private GetOrderByIdTask $task) {}

    public function run($id)
    {
        $order = $this->task->run($id);

        return $order;
    }
}
