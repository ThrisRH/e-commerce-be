<?php

namespace App\Containers\OrderSection\Shipping\Actions\City;

use App\Containers\OrderSection\Shipping\Models\ShippingCity;
use App\Containers\OrderSection\Shipping\Tasks\City\UpdateShippingCityTask;
use App\Ship\Parents\Actions\Action;

class UpdateShippingCityAction extends Action
{
    public function run($id, array $data): ShippingCity
    {
        return app(UpdateShippingCityTask::class)->run($id, $data);
    }
}
