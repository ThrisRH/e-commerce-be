<?php

namespace App\Containers\OrderSection\Shipping\Tasks\ShippingFee;

use App\Containers\CatalogSection\Product\Tasks\Products\FindProductVariantBySkuAndSlugTask;
use App\Ship\Parents\Tasks\Task;

class CalculatePhysicalWeightTask extends Task
{
    public function __construct(
        private FindProductVariantBySkuAndSlugTask $findProductVariantBySkuAndSlugTask
    ) {}

    public function run(array $items, int $volumetricDivisor = 5000): array
    {
        $totalActualWeight = 0;
        $totalVolumetricWeight = 0;

        foreach ($items as $item) {
            $variant = $this->findProductVariantBySkuAndSlugTask->run($item['sku'], $item['slug']);
            if ($variant) {
                $quantity = $item['quantity'];

                $totalActualWeight += ($variant->weight ?? 0) * $quantity;

                if ($variant->length && $variant->width && $variant->height) {
                    $itemVolumetricWeight = ($variant->length * $variant->width * $variant->height) / $volumetricDivisor;
                    $totalVolumetricWeight += $itemVolumetricWeight * $quantity;
                }
            }
        }

        return [
            'actual_weight' => $totalActualWeight,
            'volumetric_weight' => $totalVolumetricWeight,
            'chargeable_weight' => max($totalActualWeight, $totalVolumetricWeight),
        ];
    }
}
