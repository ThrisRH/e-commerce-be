<?php

namespace App\Containers\CatalogSection\Product\Actions\Products\Commands;

use App\Containers\CatalogSection\Product\Models\Product;
use App\Containers\CatalogSection\Product\Tasks\Products\NewProductFlow\CreateProductSpecificationTask;
use App\Containers\CatalogSection\Product\Tasks\Products\NewProductFlow\UpdateBaseProductTask;
use App\Ship\Parents\Actions\Action;
use Illuminate\Support\Facades\DB;

class UpdateProductAction extends Action
{
    public function __construct(
        private UpdateBaseProductTask $updateBaseProductTask,
        private CreateProductSpecificationTask $createProductSpecificationTask
    ) {}

    public function run(Product $product, array $data): Product
    {
        return DB::transaction(function () use ($product, $data) {
            $this->updateBaseProductTask->run($product, $data);

            if (isset($data['specs'])) {
                $product->productSpecifications()->delete();
                foreach ($data['specs'] as $spec) {
                    $spec['product_id'] = $product->id;
                    $this->createProductSpecificationTask->run($spec);
                }
            }

            return $product->refresh();
        });
    }
}
