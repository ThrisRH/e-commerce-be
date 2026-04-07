<?php

namespace App\Containers\OrderSection\Order\Actions\Orders;

use App\Containers\OrderSection\Order\Tasks\Orders\GetWeeklyRevenueTask;
use App\Ship\Parents\Actions\Action;

class GetWeeklyRevenueAction extends Action
{
    public function run()
    {
        return app(GetWeeklyRevenueTask::class)->run();
    }
}
