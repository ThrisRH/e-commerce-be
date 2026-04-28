<?php

namespace App\Containers\OrderSection\Shipping\SubActions;

use App\Containers\OrderSection\Shipping\Tasks\Area\GetShippingAreaByAddressTask;
use App\Containers\OrderSection\Shipping\Tasks\Route\FindShippingRouteTask;
use App\Containers\OrderSection\Shipping\Tasks\ShippingFee\CalculatePhysicalWeightTask;
use App\Containers\OrderSection\Shipping\Tasks\ShippingMethod\FindShippingMethodByIdTask;
use App\Ship\Parents\Actions\Action;

class CalculateShippingFeeSubAction extends Action
{
    public function __construct(
        private GetShippingAreaByAddressTask $getShippingAreaByAddressTask,
        private FindShippingRouteTask $findShippingRouteTask,
        private FindShippingMethodByIdTask $findShippingMethodByIdTask,
        private CalculatePhysicalWeightTask $calculatePhysicalWeightTask,
    ) {}

    public function run(array $data)
    {
        $fromArea = $this->getShippingAreaByAddressTask->run(
            $data['from']['city'] ?? null,
            $data['from']['province'] ?? null
        );
        $toArea = $this->getShippingAreaByAddressTask->run(
            $data['to']['city'] ?? null,
            $data['to']['province'] ?? null
        );

        if (! $fromArea) {
            throw new \Exception('Origin shipping area not found for: '.($data['from']['city'] ?? '').', '.($data['from']['province'] ?? ''));
        }

        if (! $toArea) {
            throw new \Exception('Destination shipping area not found for: '.($data['to']['city'] ?? '').', '.($data['to']['province'] ?? ''));
        }

        $route = $this->findShippingRouteTask->run($fromArea->id, $toArea->id);

        if (! $route) {
            throw new \Exception("No shipping route found from {$fromArea->id} to {$toArea->id}.");
        }

        $shippingMethod = $this->findShippingMethodByIdTask->run($data['shipping_method_id']);
        if (! $shippingMethod) {
            throw new \Exception('Shipping method not found');
        }

        $items = $data['items'] ?? [];
        $physicalSpec = $this->calculatePhysicalWeightTask->run($items, $shippingMethod->volumetric_divisor ?? 5000);

        $totalFee = $route->cost;

        return [
            'shipping_info' => [
                'from_area_id' => $fromArea->id,
                'to_area_id' => $toArea->id,
                'route_id' => $route->id,
                'base_cost' => $route->cost,
                'chargeable_weight' => $physicalSpec['chargeable_weight'],
                'level_code' => $route->level_code,
            ],
            'physical_spec' => $physicalSpec,
            'fee' => round($totalFee, 0),
        ];
    }
}
