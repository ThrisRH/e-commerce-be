<?php

namespace App\Containers\UserSection\User\Tasks;

use App\Containers\AppSection\Authentication\Models\User;
use App\Ship\Parents\Tasks\Task;
use Illuminate\Support\Facades\Hash;

class CreateStaffAccountTask extends Task
{
    public function run(array $data, $password)
    {
        User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'phone_number' => $data['phone_number'],
            'password' => Hash::make($password),
            'role' => $data['role'],
        ]);
    }
}
