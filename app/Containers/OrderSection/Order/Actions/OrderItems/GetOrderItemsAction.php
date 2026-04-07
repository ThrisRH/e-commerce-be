<?php

namespace App\Containers\OrderSection\Order\Actions\OrderItems;

use App\Containers\OrderSection\Order\Tasks\OrderItems\GetOrderItemsTask;
use App\Ship\Parents\Actions\Action;

class GetOrderItemsAction extends Action
{
    public function __construct(private GetOrderItemsTask $task) {}

    public function run()
    {
        return $this->task->run();
    }
}
