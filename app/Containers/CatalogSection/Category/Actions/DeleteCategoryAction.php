<?php

namespace App\Containers\CatalogSection\Category\Actions;

use App\Containers\CatalogSection\Category\Tasks\FindCategoryByIdTask;
use App\Containers\CatalogSection\Category\Tasks\DeleteCategoryTask;
use App\Ship\Parents\Actions\Action;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class DeleteCategoryAction extends Action
{
    public function __construct(private FindCategoryByIdTask $findByIdTask, private DeleteCategoryTask $deleteTask) {}

    public function run($id): bool
    {
        $category = $this->findByIdTask->run($id);

        if (!$category) {
            throw new NotFoundHttpException('Category not found');
        }

        return $this->deleteTask->run($category);
    }
}
