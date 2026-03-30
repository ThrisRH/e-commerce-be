<?php

namespace App\Containers\AppSection\Authentication\UI\API\Transfomers;

class AuthTransfomer
{
    public function transform($user)
    {
        return [
            'id' => $user->id,
            'name' => $user->name,
            'email' => $user->email,
            'roles' => $user->getRoleNames(),
        ];
    }
}
