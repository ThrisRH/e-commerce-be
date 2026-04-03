<?php

namespace App\Containers\CatalogSection\Category\Actions;

use App\Containers\CatalogSection\Category\Tasks\FindCategoryByIdTask;
use App\Containers\CatalogSection\Category\Tasks\FindProductByCateIdTask;
use App\Ship\Parents\Actions\Action;

class FindCategoryByIdAction extends Action
{
    public function run($id)
    {
        $category = app(FindCategoryByIdTask::class)->run($id);
        $products = app(FindProductByCateIdTask::class)->run($id);

        $category->products = $products;

        return $category;
    }
}
