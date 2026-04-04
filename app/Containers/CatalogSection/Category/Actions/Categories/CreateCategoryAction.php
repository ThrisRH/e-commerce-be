<?php

namespace App\Containers\CatalogSection\Category\Actions\Categories;

use App\Containers\CatalogSection\Category\Actions\CategoryAttributes\CreateCategoryAttributeAction;
use App\Containers\CatalogSection\Category\Models\Category;
use App\Containers\CatalogSection\Category\Tasks\Categories\CreateCategoryTask;
use App\Ship\Parents\Actions\Action;
use Illuminate\Support\Facades\DB;

class CreateCategoryAction extends Action
{
    public function __construct(
        private CreateCategoryTask $task,
        private CreateCategoryAttributeAction $createCategoryAttributeAction
    ) {}

    public function run(array $data): Category
    {
        return DB::transaction(function () use ($data) {
            $category = $this->task->run($data);

            $data['category_id'] = $category->id;

            $this->createCategoryAttributeAction->run($data);

            return $category;
        });
    }
}
