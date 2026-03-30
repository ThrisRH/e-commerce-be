<?php

namespace App\Containers\AppSection\Authorization\Actions;

use App\Containers\AppSection\Authorization\Tasks\CreateRoleTask;
use App\Ship\Parents\Actions\Action;

class CreateRoleAction extends Action
{
    public function run(array $data)
    {
        return app(CreateRoleTask::class)->run($data);
    }
}
