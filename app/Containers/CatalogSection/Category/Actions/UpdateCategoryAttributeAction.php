<?php

namespace App\Containers\CatalogSection\Category\Actions;

use App\Containers\CatalogSection\Category\Tasks\FindCategoryAttributeByIdTask;
use App\Containers\CatalogSection\Category\Tasks\UpdateCategoryAttributeTask;
use App\Ship\Parents\Actions\Action;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class UpdateCategoryAttributeAction extends Action
{
    public function __construct(private FindCategoryAttributeByIdTask $findByIdTask, private UpdateCategoryAttributeTask $updateTask) {}

    public function run($id, array $data)
    {
        $model = $this->findByIdTask->run($id);

        if (!$model) {
            throw new NotFoundHttpException('Category attribute not found');
        }

        return $this->updateTask->run($model, $data);
    }
}
