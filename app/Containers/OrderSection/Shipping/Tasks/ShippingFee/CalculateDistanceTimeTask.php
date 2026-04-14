<?php

namespace App\Containers\OrderSection\Shipping\Tasks\ShippingFee;

use App\Ship\Parents\Tasks\Task;
use Illuminate\Support\Facades\Http;

class CalculateDistanceTimeTask extends Task
{
    public function run(array $from, array $to): array
    {
        $coordinates = sprintf('%s,%s;%s,%s', $from['lon'], $from['lat'], $to['lon'], $to['lat']);
        $url = "http://router.project-osrm.org/route/v1/driving/{$coordinates}?overview=false";

        $response = Http::get($url);

        if ($response->successful()) {
            $data = $response->json();
            if (! empty($data['routes'])) {
                return [
                    'distance' => $data['routes'][0]['distance'],
                    'expected_time' => $data['routes'][0]['duration'],
                ];
            }
        }

        return [];
    }
}
