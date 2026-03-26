<?php

namespace App\Containers\CatalogSection\Brand\Actions;

use App\Containers\CatalogSection\Brand\Tasks\GetByBrandIdTask;
use App\Ship\Parents\Actions\Action;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class GetByBrandIdAction extends Action
{
    public function __construct(private GetByBrandIdTask $task) {}

    public function run(int $id)
    {
        $brand = $this->task->run($id);

        if (! $brand) {
            throw new NotFoundHttpException('Brand Not Found!');
        }

        return $brand;
    }
}
