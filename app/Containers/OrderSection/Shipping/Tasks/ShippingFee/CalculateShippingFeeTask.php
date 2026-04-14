<?php

namespace App\Containers\OrderSection\Shipping\Tasks\ShippingFee;

use App\Ship\Parents\Tasks\Task;

class CalculateShippingFeeTask extends Task
{
    public function run($shippingInfo)
    {
        $T = $shippingInfo['expected_time'];
        $t = $shippingInfo['time_coefficient'];
        $D = $shippingInfo['distance'];
        $d = $shippingInfo['distance_coefficient'];
        $BaseFee = $shippingInfo['base_fee'];
        $MaxFee = $shippingInfo['max_fee'];
        $MinFee = $shippingInfo['min_fee'];
        $density_factor = $shippingInfo['density_factor'];
        $estimated_stops = $shippingInfo['estimated_stops'];

        $TC = ($T * $t) + ($D * $d);
        $ZoneEfficiency = $density_factor * $estimated_stops;

        if ($ZoneEfficiency <= 0) {
            throw new \Exception('Zone efficiency must be greater than 0');
        }

        $CostCoefficient = $TC / $ZoneEfficiency;
        $TotalFee = ($CostCoefficient * 5000) + $BaseFee;

        if ($TotalFee > $MaxFee) {
            $TotalFee = $MaxFee;
        }

        if ($TotalFee < $MinFee) {
            $TotalFee = $MinFee;
        }

        return $TotalFee;
    }
}
