<?php

namespace App\Containers\CatalogSection\Attribute\Actions;

use App\Containers\CatalogSection\Attribute\Tasks\GetAttributeByIdTask;
use App\Containers\CatalogSection\Attribute\Tasks\DeleteAttributeTask;
use App\Ship\Parents\Actions\Action;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class DeleteAttributeAction extends Action
{
    public function __construct(private GetAttributeByIdTask $findByIdTask, private DeleteAttributeTask $deleteTask) {}

    public function run($id)
    {
        $attribute = $this->findByIdTask->run($id);

        if (!$attribute) {
            throw new NotFoundHttpException('Attribute not found');
        }

        return $this->deleteTask->run($attribute);
    }
}
