<?php

namespace App\Containers\CatalogSection\Brand\Actions;

use App\Containers\CatalogSection\Brand\Tasks\GetByBrandIdTask;
use App\Containers\CatalogSection\Brand\Tasks\UpdateBrandTask;
use App\Ship\Parents\Actions\Action;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class UpdateBrandAction extends Action
{
    public function __construct(private UpdateBrandTask $task, private GetByBrandIdTask $findByBrandIdTask) {}

    public function run(int $id, array $data)
    {
        $brand = $this->findByBrandIdTask->run($id);

        if (! $brand) {
            throw new NotFoundHttpException('Brand Not Found');
        }

        return $this->task->run($brand, $data);
    }
}
