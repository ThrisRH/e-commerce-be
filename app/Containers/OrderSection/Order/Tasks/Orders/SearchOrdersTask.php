<?php

namespace App\Containers\OrderSection\Order\Tasks\Orders;

use App\Containers\OrderSection\Order\Models\Order;
use App\Ship\Parents\Tasks\Task;

class SearchOrdersTask extends Task
{
    public function run(array $filters)
    {
        $query = Order::query();

        if (collect($filters)->get('tracking_code')) {
            $query->where('tracking_code', $filters['tracking_code']);
        }

        if (collect($filters)->get('shipping_phone')) {
            $query->where('shipping_phone', $filters['shipping_phone']);
        }

        return $query->latest()->get();
    }
}
