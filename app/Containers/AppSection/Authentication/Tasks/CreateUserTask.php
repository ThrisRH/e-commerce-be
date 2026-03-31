<?php

namespace App\Containers\AppSection\Authentication\Tasks;

use App\Containers\AppSection\Authentication\Models\User;
use App\Ship\Parents\Tasks\Task;

class CreateUserTask extends Task
{
    public function run(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => $data['password'],
            'phone_number' => $data['phone_number'],
        ]);
    }
}
