<?php

namespace App\Containers\OrderSection\Order\Actions\Orders;

use App\Containers\OrderSection\Order\Tasks\Orders\GetAllOrderTask;
use App\Ship\Parents\Actions\Action;

class GetAllOrderAction extends Action
{
    public function run()
    {
        return app(GetAllOrderTask::class)->run();
    }
}
