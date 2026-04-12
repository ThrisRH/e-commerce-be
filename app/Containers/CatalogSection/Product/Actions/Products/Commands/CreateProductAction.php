<?php

namespace App\Containers\CatalogSection\Product\Actions\Products\Commands;

use App\Containers\CatalogSection\Category\Tasks\CategoryAttributes\ValidateCategoryAttributesTask;
use App\Containers\CatalogSection\Product\Tasks\Products\NewProductFlow\CreateBaseProductTask;
use App\Containers\CatalogSection\Product\Tasks\Products\NewProductFlow\CreateProductItemTask;
use App\Containers\CatalogSection\Product\Tasks\Products\NewProductFlow\CreateProductSpecificationTask;
use App\Containers\CatalogSection\Product\Tasks\Products\NewProductFlow\CreateProductVariantTask;
use App\Containers\CatalogSection\Product\Tasks\Products\NewProductFlow\CreateProductVariantValueTask;
use App\Containers\CatalogSection\Product\Tasks\Products\NewProductFlow\GenerateSKUTask;
use App\Ship\Parents\Actions\Action;
use Illuminate\Support\Facades\DB;

class CreateProductAction extends Action
{
    public function __construct(
        private CreateBaseProductTask $createBaseProductTask,
        private CreateProductItemTask $createProductItemTask,
        private GenerateSKUTask $generateSKUTask,
        private CreateProductVariantTask $createProductVariantTask,
        private CreateProductVariantValueTask $createProductVariantValueTask,
        private CreateProductSpecificationTask $createProductSpecificationTask,
        private ValidateCategoryAttributesTask $validateCategoryAttributesTask
    ) {}

    public function run(array $data)
    {
        return DB::transaction(function () use ($data) {
            $baseProduct = $this->createBaseProductTask->run($data);

            $this->validateCategoryAttributesTask->run($data['category_id'], $data['specs']);

            foreach ($data['specs'] as $spec) {
                $spec['product_id'] = $baseProduct->id;

                $this->createProductSpecificationTask->run($spec);
            }

            if (! empty($data['children'])) {
                foreach ($data['children'] as $childData) {
                    $childData['base_product_id'] = $baseProduct->id;
                    $childData['brand_id'] = $data['brand_id'];
                    $childData['category_id'] = $data['category_id'];

                    $childProduct = $this->createProductItemTask->run($childData);

                    foreach ($childData['variants'] as $variant) {

                        $sku = $this->generateSKUTask->run($childData);
                        $itemData = $variant;
                        $itemData['sku'] = $sku;
                        $itemData['product_item_id'] = $childProduct->id;

                        $variant = $this->createProductVariantTask->run($itemData);
                        $itemData['product_variant_id'] = $variant->id;

                        if (! empty($childData['attributes'])) {
                            foreach ($childData['attributes'] as $attribute) {
                                $attribute['product_variant_id'] = $variant->id;
                                $this->createProductVariantValueTask->run($attribute);
                            }
                        }

                        if (! empty($itemData['attribute_value_id'])) {
                            $this->createProductVariantValueTask->run($itemData);
                        }
                    }

                }

                return ['message' => 'Created Successfully'];
            }

        });
    }
}
