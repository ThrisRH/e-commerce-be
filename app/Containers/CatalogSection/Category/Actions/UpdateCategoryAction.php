<?php

namespace App\Containers\CatalogSection\Category\Actions;

use App\Containers\CatalogSection\Category\Models\Category;
use App\Containers\CatalogSection\Category\Tasks\FindCategoryByIdTask;
use App\Containers\CatalogSection\Category\Tasks\UpdateCategoryTask;
use App\Ship\Parents\Actions\Action;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class UpdateCategoryAction extends Action
{
    public function __construct(
        private FindCategoryByIdTask $findByIdTask,
        private UpdateCategoryTask $updateTask,
        private CreateCategoryAttributeAction $createCategoryAttributeAction
    ) {}

    public function run($id, array $data): Category
    {
        return DB::transaction(function () use ($id, $data) {
            $category = $this->findByIdTask->run($id);

            if (!$category) {
                throw new NotFoundHttpException('Category not found');
            }

            $category = $this->updateTask->run($category, $data);

            if (isset($data['attribute_ids'])) {
                $category->categoryAttributes()->delete();

                $this->createCategoryAttributeAction->run([
                    'category_id' => $category->id,
                    'attribute_ids' => $data['attribute_ids'],
                    'is_required' => $data['is_required'] ?? false,
                ]);
            }

            return $category;
        });
    }
}
