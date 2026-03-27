<?php

namespace App\Containers\CatalogSection\Attribute\Actions;

use App\Containers\CatalogSection\Attribute\Tasks\GetAttributeByIdTask;
use App\Containers\CatalogSection\Attribute\Tasks\UpdateAttributeTask;
use App\Ship\Parents\Actions\Action;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class UpdateAttributeAction extends Action
{
    public function __construct(private GetAttributeByIdTask $findByIdTask, private UpdateAttributeTask $updateTask) {}

    public function run($id, array $data)
    {
        $attribute = $this->findByIdTask->run($id);

        if (!$attribute) {
            throw new NotFoundHttpException('Attribute not found');
        }

        return $this->updateTask->run($attribute, $data);
    }
}
