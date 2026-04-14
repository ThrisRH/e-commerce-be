<?php

namespace App\Containers\OrderSection\Shipping\SubActions;

use App\Containers\OrderSection\Shipping\Tasks\ShippingFee\CalculateDistanceTimeTask;
use App\Containers\OrderSection\Shipping\Tasks\ShippingFee\CalculateShippingFeeTask;
use App\Containers\OrderSection\Shipping\Tasks\ShippingFee\GetCoordinatesTask;
use App\Containers\OrderSection\Shipping\Tasks\ShippingMethod\FindShippingMethodByIdTask;
use App\Containers\OrderSection\Shipping\Tasks\ShippingRate\FindShippingRateTask;
use App\Containers\OrderSection\Shipping\Tasks\ShippingZone\GetShippingZoneByAddressTask;
use App\Ship\Parents\Actions\Action;

class CalculateShippingFeeSubAction extends Action
{
    public function __construct(
        private GetCoordinatesTask $getCoordinatesTask,
        private CalculateDistanceTimeTask $calculateDistanceTimeTask,
        private GetShippingZoneByAddressTask $getShippingZoneByAddressTask,
        private FindShippingMethodByIdTask $findShippingMethodByIdTask,
        private FindShippingRateTask $findShippingRateTask,
        private CalculateShippingFeeTask $calculateShippingFeeTask,
    ) {}

    public function run(array $data)
    {

        $fromCoords = $this->getCoordinatesTask->run($data['from']['province'].', '.$data['from']['district'].', '.$data['from']['ward'] ?? '');
        $toCoords = $this->getCoordinatesTask->run($data['to']['province'].', '.$data['to']['district'].', '.$data['to']['ward'] ?? '');

        if (! $fromCoords || ! $toCoords) {
            return [
                'distance' => 0,
                'fee' => 0,
                'message' => 'Could not determine coordinates for the provided addresses.',
            ];
        }

        $distanceTime = $this->calculateDistanceTimeTask->run($fromCoords, $toCoords);
        $distanceInKm = round($distanceTime['distance'] / 1000, 2);
        $expectedTimeInHours = round($distanceTime['expected_time'] / 3600, 2);

        $shippingZone = $this->getShippingZoneByAddressTask->run($data['to']['province'], $data['to']['district']);

        if (! $shippingZone) {
            throw new \Exception('Shipping zone not found');
        }

        $shippingMethod = $this->findShippingMethodByIdTask->run($data['shipping_method_id']);

        if (! $shippingMethod) {
            throw new \Exception('Shipping method not found');
        }

        $shippingRate = $this->findShippingRateTask->run($shippingZone->id, $shippingMethod->id);

        if (! $shippingRate) {
            throw new \Exception('Shipping rate not found');
        }

        $shippingInfo = [
            'distance' => round($distanceInKm, 2),
            'distance_coefficient' => $shippingMethod->distance_coefficient,
            'expected_time' => $expectedTimeInHours,
            'time_coefficient' => $shippingMethod->time_coefficient,
            'base_fee' => $shippingRate->base_fee,
            'max_fee' => $shippingRate->max_fee,
            'min_fee' => $shippingRate->min_fee,
            'density_factor' => $shippingZone->density_factor,
            'estimated_stops' => $shippingZone->estimated_stops,
        ];

        $totalFee = $this->calculateShippingFeeTask->run($shippingInfo);

        return [
            'shipping_info' => $shippingInfo,
            'fee' => round($totalFee, 0),
        ];
    }
}
