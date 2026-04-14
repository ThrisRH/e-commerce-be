<?php

namespace App\Containers\OrderSection\Shipping\Tasks\ShippingFee;

use App\Ship\Parents\Tasks\Task;
use Illuminate\Support\Facades\Http;

class GetCoordinatesTask extends Task
{
    public function run(string $address): ?array
    {

        $response = Http::withHeaders([
            'User-Agent' => 'Ecommerce-App',
        ])->get('https://nominatim.openstreetmap.org/search', [
            'q' => $address,
            'format' => 'json',
            'limit' => 1,
        ]);

        if ($response->successful() && ! empty($response->json())) {
            $data = $response->json()[0];

            return [
                'lat' => $data['lat'],
                'lon' => $data['lon'],
            ];
        }

        return null;
    }
}
