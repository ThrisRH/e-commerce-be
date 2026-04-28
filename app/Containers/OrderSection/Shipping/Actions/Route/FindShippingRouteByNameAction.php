<?php

namespace App\Containers\OrderSection\Shipping\Actions\Route;

use App\Containers\OrderSection\Shipping\Tasks\Area\GetShippingAreaByAddressTask;
use App\Containers\OrderSection\Shipping\Tasks\Route\FindShippingRouteByNameTask;
use App\Ship\Parents\Actions\Action;

class FindShippingRouteByNameAction extends Action
{
    public function __construct(
        private GetShippingAreaByAddressTask $getShippingAreaByAddressTask,
        private FindShippingRouteByNameTask $findShippingRouteByNameTask
    ) {}

    public function run($data)
    {
        $fromArea = $this->getShippingAreaByAddressTask->run($data['from']['city'], $data['from']['province'] ?? null);
        $toArea = $this->getShippingAreaByAddressTask->run($data['to']['city'], $data['to']['province'] ?? null);

        if (! $fromArea || ! $toArea) {
            throw new \Exception('Shipping area not found');
        }

        $route = $this->findShippingRouteByNameTask->run($fromArea->id, $toArea->id);

        return $route;
    }
}
