<?php

namespace App\Containers\OrderSection\Order\Actions\Orders;

use App\Containers\OrderSection\Order\Tasks\Orders\GetAllOrderTask;
use App\Ship\Parents\Actions\Action;

class GetAllOrderAction extends Action
{
    private GetAllOrderTask $getAllOrderTask;

    public function __construct(GetAllOrderTask $getAllOrderTask)
    {
        $this->getAllOrderTask = $getAllOrderTask;
    }

    public function run()
    {
        return $this->getAllOrderTask->run();
    }
}
