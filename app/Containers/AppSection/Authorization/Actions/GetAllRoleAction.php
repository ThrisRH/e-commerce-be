<?php

namespace App\Containers\AppSection\Authorization\Actions;

use App\Containers\AppSection\Authorization\Tasks\GetAllRoleTask;
use App\Ship\Parents\Actions\Action;

class GetAllRoleAction extends Action
{
    public function __construct(private GetAllRoleTask $getAllRoleTask) {}

    public function run()
    {
        return $this->getAllRoleTask->run();
    }
}
