<?php

namespace App\Containers\AppSection\Authentication\Actions;

use App\Containers\AppSection\Authentication\Tasks\LogoutUserTask;
use App\Ship\Parents\Actions\Action;

class LogoutAction extends Action
{
    public function __construct(private LogoutUserTask $task) {}

    public function run()
    {
        return $this->task->run();
    }
}
