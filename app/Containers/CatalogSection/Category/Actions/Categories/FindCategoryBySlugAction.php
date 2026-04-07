<?php

namespace App\Containers\CatalogSection\Category\Actions\Categories;

use App\Containers\CatalogSection\Category\Tasks\Categories\FindCategoryBySlugTask;
use App\Ship\Exceptions\NotFoundException;
use App\Ship\Parents\Actions\Action;

class FindCategoryBySlugAction extends Action
{
    public function __construct(
        protected FindCategoryBySlugTask $findCategoryBySlugTask
    ) {}

    public function run(string $slug)
    {
        $category = $this->findCategoryBySlugTask->run($slug);

        if (!$category) {
            throw new NotFoundException('Category not found.');
        }

        return $category;
    }
}
