<?php

namespace App\Containers\CatalogSection\Attribute\Actions\Attributes;

use App\Containers\CatalogSection\Attribute\Tasks\Attributes\GetAttributeByIdTask;
use App\Containers\CatalogSection\Attribute\Tasks\Attributes\UpdateAttributeTask;
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
