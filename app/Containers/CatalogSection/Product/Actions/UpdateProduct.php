<?php

namespace App\Containers\CatalogSection\Product\Actions;

use App\Containers\CatalogSection\Product\Models\Product;
use App\Containers\CatalogSection\Product\Tasks\ResetProductAttributesTask;
use App\Containers\CatalogSection\Product\Tasks\SyncProductAttributesTask;
use App\Containers\CatalogSection\Product\Tasks\UpdateProductTask;

class UpdateProduct
{
    public function run(Product $product, array $data)
    {
        $oldCategory = $product->category_id;

        app(UpdateProductTask::class)->run($product, $data);

        if (isset($data['category_id']) && $oldCategory != $data['category_id']) {
            app(ResetProductAttributesTask::class)->run($product);
        }

        if (isset($data['attributes']) && is_array($data['attributes'])) {
            app(SyncProductAttributesTask::class)->run($product, $data['attributes']);
        }

        return $product;
    }
}
