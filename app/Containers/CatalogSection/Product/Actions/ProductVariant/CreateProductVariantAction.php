<?php

namespace App\Containers\CatalogSection\Product\Actions\ProductVariant;

use App\Containers\CatalogSection\Product\Tasks\Products\NewProductFlow\CheckExistsSKUTask;
use App\Containers\CatalogSection\Product\Tasks\Products\NewProductFlow\CreateProductVariantTask;
use App\Containers\CatalogSection\Product\Tasks\Products\NewProductFlow\CreateProductVariantValueTask;
use App\Containers\CatalogSection\Product\Tasks\Products\NewProductFlow\GenerateSKUTask;
use App\Ship\Parents\Actions\Action;

class CreateProductVariantAction extends Action
{
    public function __construct(
        private GenerateSKUTask $generateSKUTask,
        private CreateProductVariantTask $createProductVariantTask,
        private CreateProductVariantValueTask $createProductVariantValueTask,
        private CheckExistsSKUTask $checkExistsSKUTask
    ) {}

    public function run($data)
    {
        do {
            $sku = $this->generateSKUTask->run($data);
        } while ($this->checkExistsSKUTask->run($sku));

        $data['sku'] = $sku;

        $variant = $this->createProductVariantTask->run($data);

        foreach ($data['attributes'] as $attribute) {
            $this->createProductVariantValueTask->run([
                'product_variant_id' => $variant->id,
                'attribute_value_id' => $attribute['attribute_value_id'],
            ]);
        }

        return $variant;
    }
}
