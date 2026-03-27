<?php

namespace App\Containers\CatalogSection\Category\Actions;

use App\Containers\CatalogSection\Category\Tasks\FindCategoryAttributeByIdTask;
use App\Containers\CatalogSection\Category\Tasks\DeleteCategoryAttributeTask;
use App\Ship\Parents\Actions\Action;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class DeleteCategoryAttributeAction extends Action
{
    public function __construct(private FindCategoryAttributeByIdTask $findByIdTask, private DeleteCategoryAttributeTask $deleteTask) {}

    public function run($id)
    {
        $model = $this->findByIdTask->run($id);

        if (!$model) {
            throw new NotFoundHttpException('Category attribute not found');
        }

        return $this->deleteTask->run($model);
    }
}
