<?php

namespace App\Containers\CatalogSection\Product\Actions\Products;

use App\Containers\CatalogSection\Category\Tasks\CategoryAttributes\ValidateCategoryAttributesTask;
use App\Containers\CatalogSection\Product\Tasks\Products\CreateProductTask;
use App\Ship\Parents\Actions\Action;
use Illuminate\Support\Facades\DB;

class CreateProductAction extends Action
{
    public function __construct(
        private ValidateCategoryAttributesTask $validateCategoryAttributesTask,
        private CreateProductTask $createProductTask
    ) {}

    public function run(array $data)
    {
        return DB::transaction(function () use ($data) {
            $this->validateCategoryAttributesTask->run($data['category_id'], $data['attributes']);

            $product = $this->createProductTask->run($data);

            foreach ($data['attributes'] as $attr) {
                $product->productAttributes()->create([
                    'attribute_id' => $attr['attribute_id'],
                    'value' => $attr['value'],
                ]);
            }

            return $product;
        });
    }
}
