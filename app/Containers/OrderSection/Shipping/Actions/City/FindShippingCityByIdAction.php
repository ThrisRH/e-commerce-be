<?php

namespace App\Containers\OrderSection\Shipping\Actions\City;

use App\Containers\OrderSection\Shipping\Models\ShippingCity;
use App\Containers\OrderSection\Shipping\Tasks\City\FindShippingCityByIdTask;
use App\Ship\Parents\Actions\Action;

class FindShippingCityByIdAction extends Action
{
    public function run($id): ShippingCity
    {
        return app(FindShippingCityByIdTask::class)->run($id);
    }
}
