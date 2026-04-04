<?php

namespace App\Containers\CatalogSection\Product\Actions\Products;

use App\Containers\CatalogSection\Product\Models\Product;
use App\Containers\CatalogSection\Product\Tasks\ProductAttributes\ResetProductAttributesTask;
use App\Containers\CatalogSection\Product\Tasks\ProductAttributes\SyncProductAttributesTask;
use App\Containers\CatalogSection\Product\Tasks\ProductAttributes\UpdateProductTask;
use App\Containers\CatalogSection\Product\Tasks\Products\CheckProductExistTask;
use App\Ship\Exceptions\DuplicateSlugException;
use App\Ship\Parents\Actions\Action;
use Illuminate\Support\Facades\DB;

class UpdateProductAction extends Action
{
    public function __construct(
        private CheckProductExistTask $checkProductExistTask,
        private UpdateProductTask $updateProductTask,
        private ResetProductAttributesTask $resetProductAttributesTask,
        private SyncProductAttributesTask $syncProductAttributesTask
    ) {}

    public function run(Product $product, array $data): ?Product
    {
        if (isset($data['name'])) {
            if ($this->checkProductExistTask->run($data['name'], $product->id)) {
                throw new DuplicateSlugException('name', $data['name']);
            }
        }

        return DB::transaction(function () use ($product, $data) {
            $oldCategory = $product->category_id;

            $product = $this->updateProductTask->run($product, $data);

            if (! $product) {
                return null;
            }

            if (isset($data['category_id']) && $oldCategory != $data['category_id']) {
                $this->resetProductAttributesTask->run($product);
            }

            if (! empty($data['attributes']) && is_array($data['attributes'])) {
                $this->syncProductAttributesTask->run($product, $data['attributes']);
            }

            return $product;
        });
    }
}
