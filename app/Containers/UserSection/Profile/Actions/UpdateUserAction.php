<?php

namespace App\Containers\UserSection\Profile\Actions;

use App\Containers\UserSection\User\Tasks\GetUserByIdTask;
use App\Containers\UserSection\User\Tasks\UpdateUserTask;
use App\Ship\Parents\Actions\Action;

class UpdateUserAction extends Action
{
    public function __construct(
        private GetUserByIdTask $getUserByIdTask,
        private UpdateUserTask $updateUserTask
    ) {}

    public function run($id, array $data)
    {
        $user = $this->getUserByIdTask->run($id);
        
        return $this->updateUserTask->run($user, $data);
    }
}
