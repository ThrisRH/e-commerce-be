<?php

namespace App\Containers\CatalogSection\Category\Actions;

use App\Containers\CatalogSection\Category\Models\Category;
use App\Containers\CatalogSection\Category\Tasks\FindCategoryByIdTask;
use App\Containers\CatalogSection\Category\Tasks\UpdateCategoryTask;
use App\Ship\Parents\Actions\Action;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class UpdateCategoryAction extends Action
{
    public function __construct(private FindCategoryByIdTask $findByIdTask, private UpdateCategoryTask $updateTask) {}

    public function run($id, array $data): Category
    {
        $category = $this->findByIdTask->run($id);

        if (!$category) {
            throw new NotFoundHttpException('Category not found');
        }

        return $this->updateTask->run($category, $data);
    }
}
