<?php

namespace App\Containers\OrderSection\Shipping\Actions\City;

use App\Containers\OrderSection\Shipping\Tasks\City\GetAllShippingCitiesTask;
use App\Ship\Parents\Actions\Action;

class GetAllShippingCitiesAction extends Action
{
    public function run()
    {
        return app(GetAllShippingCitiesTask::class)->run();
    }
}
