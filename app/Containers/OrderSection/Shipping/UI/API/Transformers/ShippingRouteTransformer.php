<?php

namespace App\Containers\OrderSection\Shipping\UI\API\Transformers;

use App\Containers\OrderSection\Shipping\Models\ShippingRoute;
use App\Ship\Parents\Transformers\Transformer;

class ShippingRouteTransformer extends Transformer
{
    protected array $defaultIncludes = [
        'start_area',
        'end_area',
    ];

    protected array $availableIncludes = [];

    public function collection($data)
    {
        return collect($data)->map(fn ($route) => $this->transform($route));
    }

    public function transform(ShippingRoute $route): array
    {
        return [
            'id' => $route->id,
            'start' => [
                'id' => $route->startArea->id,
                'city' => $route->startArea->city->name ?? null,
                'province' => $route->startArea->province->name ?? null,
                'level_code' => $route->startArea->level_code,
            ],
            'end' => [
                'id' => $route->endArea->id,
                'city' => $route->endArea->city->name ?? null,
                'province' => $route->endArea->province->name ?? null,
                'level_code' => $route->endArea->level_code,
            ],
            'cost' => $route->cost,
            'level_code' => $route->level_code,
            'created_at' => $route->created_at,
            'updated_at' => $route->updated_at,
        ];
    }

    public function includeStartArea(ShippingRoute $route)
    {
        return $route->startArea ? $this->transform($route->startArea, ShippingAreaTransformer::class) : null;
    }

    public function includeEndArea(ShippingRoute $route)
    {
        return $route->endArea ? $this->transform($route->endArea, ShippingAreaTransformer::class) : null;
    }
}
