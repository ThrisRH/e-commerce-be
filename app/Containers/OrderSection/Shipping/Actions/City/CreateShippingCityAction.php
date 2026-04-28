<?php

namespace App\Containers\OrderSection\Shipping\Actions\City;

use App\Containers\OrderSection\Shipping\Models\ShippingCity;
use App\Containers\OrderSection\Shipping\Tasks\City\CreateShippingCityTask;
use App\Ship\Parents\Actions\Action;

class CreateShippingCityAction extends Action
{
    public function run(array $data): ShippingCity
    {
        return app(CreateShippingCityTask::class)->run($data);
    }
}
