<?php

namespace App\Containers\AppSection\Authentication\Actions;

use App\Containers\AppSection\Authentication\Tasks\CreateUserTask;
use App\Containers\AppSection\Authorization\Tasks\AssignRoleTask;
use App\Ship\Parents\Actions\Action;
use Illuminate\Support\Facades\DB;

class RegisterAction extends Action
{
    public function run(array $data)
    {
        DB::transaction(function () use ($data) {
            $user = app(CreateUserTask::class)->run($data);

            app(AssignRoleTask::class)->run($user, $data['role'] ?? 'n-customer');

            return [
                'user' => $user,
            ];
        });
    }
}
