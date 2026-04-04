<?php

namespace App\Containers\CatalogSection\Category\Actions\CategoryAttributes;

use App\Containers\CatalogSection\Category\Tasks\CategoryAttributes\CreateCategoryAttributeTask;
use App\Ship\Parents\Actions\Action;

class CreateCategoryAttributeAction extends Action
{
    public function __construct(private CreateCategoryAttributeTask $task) {}

    public function run(array $data): bool
    {
        $category_id = $data['category_id'];
        $attribute_ids = $data['attribute_ids'];
        $is_required = $data['is_required'];

        foreach ($attribute_ids as $attribute_id) {
            $this->task->run([
                'category_id' => $category_id,
                'attribute_id' => $attribute_id,
                'is_required' => $is_required,
            ]);
        }

        return true;
    }
}
