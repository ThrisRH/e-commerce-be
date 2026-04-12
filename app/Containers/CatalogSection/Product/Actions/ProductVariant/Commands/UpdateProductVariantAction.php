<?php

namespace App\Containers\CatalogSection\Product\Actions\ProductVariant\Commands;

use App\Containers\CatalogSection\Product\Models\ProductVariant;
use App\Containers\CatalogSection\Product\Tasks\Products\NewProductFlow\CreateProductVariantValueTask;
use App\Containers\CatalogSection\Product\Tasks\Products\NewProductFlow\ResetProductVariantValuesTask;
use App\Containers\CatalogSection\Product\Tasks\Products\NewProductFlow\UpdateProductVariantTask;
use App\Ship\Parents\Actions\Action;
use Illuminate\Support\Facades\DB;

class UpdateProductVariantAction extends Action
{
    public function __construct(
        private UpdateProductVariantTask $updateProductVariantTask,
        private ResetProductVariantValuesTask $resetProductVariantValuesTask,
        private CreateProductVariantValueTask $createProductVariantValueTask
    ) {}

    public function run(ProductVariant $variant, array $data): ProductVariant
    {
        return DB::transaction(function () use ($variant, $data) {
            $this->updateProductVariantTask->run($variant, $data);

            if (isset($data['attributes'])) {
                $this->resetProductVariantValuesTask->run($variant);
                foreach ($data['attributes'] as $attr) {
                    $attr['product_variant_id'] = $variant->id;
                    $this->createProductVariantValueTask->run($attr);
                }
            }

            return $variant->refresh();
        });
    }
}
