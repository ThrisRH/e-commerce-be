<?php

namespace App\Containers\OrderSection\Order\Actions\Orders;

use App\Containers\OrderSection\Order\Tasks\Orders\SearchOrdersTask;
use App\Ship\Parents\Actions\Action;

class SearchOrdersAction extends Action
{
    public function __construct(
        protected SearchOrdersTask $searchOrdersTask
    ) {}

    public function run(array $filters)
    {
        return $this->searchOrdersTask->run($filters);
    }
}
