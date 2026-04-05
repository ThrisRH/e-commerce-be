<?php

namespace App\Containers\CatalogSection\Category\Actions\Categories;

use App\Containers\CatalogSection\Category\Actions\CategoryAttributes\CreateCategoryAttributeAction;
use App\Containers\CatalogSection\Category\Models\Category;
use App\Containers\CatalogSection\Category\Tasks\Categories\UpdateCategoryTask;
use App\Ship\Parents\Actions\Action;

class UpdateCategoryAction extends Action
{
    public function __construct(private UpdateCategoryTask $task, private CreateCategoryAttributeAction $createCategoryAttributeAction) {}

    public function run($id, array $data): Category
    {
        $category = $this->task->run($id, $data);

        if (isset($data['attribute_ids'])) {
            $category->categoryAttributes()->delete();

            $this->createCategoryAttributeAction->run([
                'category_id' => $category->id,
                'attribute_ids' => $data['attribute_ids'],
                'is_required' => $data['is_required'] ?? false,
            ]);
        }

        return $category;
    }
}
