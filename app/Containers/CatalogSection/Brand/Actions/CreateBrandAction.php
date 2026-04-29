<?php

namespace App\Containers\CatalogSection\Brand\Actions;

use App\Containers\CatalogSection\Brand\Tasks\CheckBrandExistTask;
use App\Containers\CatalogSection\Brand\Tasks\CreateBrandTask;
use App\Ship\Exceptions\DuplicateSlugException;
use App\Ship\Parents\Actions\Action;

class CreateBrandAction extends Action
{
    public function __construct(private CreateBrandTask $task, private CheckBrandExistTask $checkBrandExistTask) {}

    public function run(array $data)
    {
        if ($this->checkBrandExistTask->run($data['name'])) {
            throw new DuplicateSlugException('name', $data['name']);
        }

        return $this->task->run($data);
    }
}
