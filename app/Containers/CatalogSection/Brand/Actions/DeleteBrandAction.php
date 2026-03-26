<?php

namespace App\Containers\CatalogSection\Brand\Actions;

use App\Containers\CatalogSection\Brand\Models\Brand;
use App\Containers\CatalogSection\Brand\Tasks\DeleteBrandTask;
use App\Ship\Parents\Actions\Action;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class DeleteBrandAction extends Action
{
    public function __construct(private DeleteBrandTask $task) {}

    public function run(int $id)
    {
        $brand = Brand::find($id);

        if (! $brand) {
            throw new NotFoundHttpException('Brand Not Found');
        }

        return $this->task->run($brand);
    }
}
