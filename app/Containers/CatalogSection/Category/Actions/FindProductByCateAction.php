<?php

namespace App\Containers\CatalogSection\Category\Actions;

use App\Containers\CatalogSection\Category\Tasks\FindCategoryByIdTask;
use App\Containers\CatalogSection\Category\Tasks\FindProductByCateTask;
use App\Ship\Parents\Actions\Action;
use Http\Discovery\Exception\NotFoundException;

class FindProductByCateAction extends Action
{
    public function run($id)
    {
        $cate = app(FindCategoryByIdTask::class)->run($id);

        if (! $cate) {
            return throw new NotFoundException('Category not found');
        }

        return app(FindProductByCateTask::class)->run($id);
    }
}
