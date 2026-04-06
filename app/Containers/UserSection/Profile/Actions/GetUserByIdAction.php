<?php

namespace App\Containers\UserSection\Profile\Actions;

use App\Containers\UserSection\User\Tasks\GetUserByIdTask;
use App\Ship\Parents\Actions\Action;

class GetUserByIdAction extends Action
{
    public function __construct(private GetUserByIdTask $getUserByIdTask) {}

    public function run($id)
    {
        return $this->getUserByIdTask->run($id);
    }
}
