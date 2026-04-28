<?php

namespace App\Containers\OrderSection\Shipping\Actions\City;

use App\Containers\OrderSection\Shipping\Tasks\City\DeleteShippingCityTask;
use App\Ship\Parents\Actions\Action;

class DeleteShippingCityAction extends Action
{
    public function run($id): bool
    {
        return app(DeleteShippingCityTask::class)->run($id);
    }
}
