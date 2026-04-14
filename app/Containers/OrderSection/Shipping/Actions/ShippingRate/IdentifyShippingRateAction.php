<?php

namespace App\Containers\OrderSection\Shipping\Actions\ShippingRate;

use App\Containers\OrderSection\Shipping\Tasks\ShippingMethod\FindShippingMethodByIdTask;
use App\Containers\OrderSection\Shipping\Tasks\ShippingRate\FindShippingRateTask;
use App\Containers\OrderSection\Shipping\Tasks\ShippingZone\GetShippingZoneByAddressTask;
use App\Ship\Parents\Actions\Action;

class IdentifyShippingRateAction extends Action
{
    public function run(array $data)
    {
        $shippingZone = app(GetShippingZoneByAddressTask::class)->run($data['province'], $data['district']);

        if (! $shippingZone) {
            return null;
        }

        $shippingMethod = app(FindShippingMethodByIdTask::class)->run($data['shipping_method_id']);

        if (! $shippingMethod) {
            return null;
        }

        return app(FindShippingRateTask::class)->run($shippingZone->id, $shippingMethod->id);
    }
}
