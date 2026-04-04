<?php

namespace App\Containers\OrderSection\Order\Tasks\Orders;

use App\Containers\OrderSection\Order\Models\Order;
use App\Ship\Parents\Tasks\Task;
use Illuminate\Support\Str;

class GenerateOrderTrackingNumberTask extends Task
{
    public function run(): string
    {
        do {
            $trackingNumber = 'ORD-'.now()->format('Ymd').'-'.strtoupper(Str::random(6));
        } while (Order::where('tracking_code', $trackingNumber)->exists());

        return $trackingNumber;
    }
}
