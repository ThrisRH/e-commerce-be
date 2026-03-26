<?php

namespace App\Containers\CatalogSection\Product\Actions;

use App\Containers\CatalogSection\Category\Tasks\ValidateCategoryAttributesTask;
use App\Containers\CatalogSection\Product\Tasks\CreateProductTask;
use App\Ship\Parents\Actions\Action;
use Illuminate\Support\Facades\DB;

class CreateProductAction extends Action
{
    private $validateCategoryAttributesTask;
    private $createProductTask;

    public function __construct(
        ValidateCategoryAttributesTask $validateCategoryAttributesTask,
        CreateProductTask $createProductTask
    ) {
        $this->validateCategoryAttributesTask = $validateCategoryAttributesTask;
        $this->createProductTask = $createProductTask;
    }

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
