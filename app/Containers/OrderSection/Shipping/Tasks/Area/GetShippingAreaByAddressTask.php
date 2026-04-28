<?php

namespace App\Containers\OrderSection\Shipping\Tasks\Area;

use App\Containers\OrderSection\Shipping\Models\ShippingArea;
use App\Containers\OrderSection\Shipping\Models\ShippingCity;
use App\Containers\OrderSection\Shipping\Models\ShippingProvince;
use App\Ship\Parents\Tasks\Task;

class GetShippingAreaByAddressTask extends Task
{
    public function run(?string $cityName, ?string $provinceName)
    {
        $cityId = null;
        if ($cityName) {
            $city = ShippingCity::where('name', 'LIKE', '%' . $cityName . '%')->first();
            $cityId = $city?->id;
        }

        $provinceId = null;
        if ($provinceName) {
            $province = ShippingProvince::where('name', 'LIKE', '%' . $provinceName . '%')->first();
            $provinceId = $province?->id;
        }

        if (!$cityId && !$provinceId) {
            return null;
        }

        return ShippingArea::where('city_id', $cityId)
            ->where('province_id', $provinceId)
            ->first();
    }
}
