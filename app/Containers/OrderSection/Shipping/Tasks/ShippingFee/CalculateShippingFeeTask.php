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
        $density_factor = $shippingInfo['density_factor'];
        $estimated_stops = $shippingInfo['estimated_stops'];

        $TC = ($T * $t) + ($D * $d);
        $ZoneEfficiency = $density_factor * $estimated_stops;

        if ($ZoneEfficiency <= 0) {
            throw new \Exception('Zone efficiency must be greater than 0');
        }

        $CostCoefficient = $TC / $ZoneEfficiency;
        $ServiceFee = ($CostCoefficient * 5000);

        $ChargeableWeight = $shippingInfo['chargeable_weight'] ?? 0;
        $BaseWeight = $shippingInfo['base_weight'] ?? 2;
        $StepWeight = $shippingInfo['step_weight'] ?? 0.5;
        $StepFee = $shippingInfo['step_fee'] ?? 0;

        $WeightFee = 0;
        if ($ChargeableWeight > $BaseWeight) {
            $extra_steps = ceil(($ChargeableWeight - $BaseWeight) / ($StepWeight ?: 1));
            $WeightFee = $extra_steps * $StepFee;
        }

        $BaseFee = $shippingInfo['base_fee'] ?? 0;
        $TotalFee = $BaseFee + $ServiceFee + $WeightFee;

        $MaxFee = $shippingInfo['max_fee'];
        $MinFee = $shippingInfo['min_fee'];

        if ($TotalFee > $MaxFee && $MaxFee > 0) {
            $TotalFee = $MaxFee;
        }

        if ($TotalFee < $MinFee && $MinFee > 0) {
            $TotalFee = $MinFee;
        }

        return $TotalFee;
    }
}
