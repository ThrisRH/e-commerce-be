<?php

namespace App\Containers\CatalogSection\Product\Actions;

use App\Containers\CatalogSection\Product\Models\Product;
use App\Containers\CatalogSection\Product\Tasks\CheckProductExistTask;
use App\Containers\CatalogSection\Product\Tasks\ResetProductAttributesTask;
use App\Containers\CatalogSection\Product\Tasks\SyncProductAttributesTask;
use App\Containers\CatalogSection\Product\Tasks\UpdateProductTask;
use App\Ship\Exceptions\DuplicateSlugException;
use App\Ship\Parents\Actions\Action;
use Illuminate\Support\Facades\DB;

class UpdateProductAction extends Action
{
    public function __construct(
        private CheckProductExistTask $checkProductExistTask
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

            $product = app(UpdateProductTask::class)->run($product, $data);

            if (! $product) {
                return null;
            }

            if (isset($data['category_id']) && $oldCategory != $data['category_id']) {
                app(ResetProductAttributesTask::class)->run($product);
            }

            if (! empty($data['attributes']) && is_array($data['attributes'])) {
                app(SyncProductAttributesTask::class)->run($product, $data['attributes']);
            }

            return $product;
        });
    }
}

