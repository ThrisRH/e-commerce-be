<?php

namespace App\Containers\AppSection\Authentication\Actions;

use App\Containers\AppSection\Authentication\Tasks\UpdateUserPasswordTask;
use App\Ship\Parents\Actions\Action;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class ChangePasswordAction extends Action
{
    public function __construct(
        protected UpdateUserPasswordTask $updateUserPasswordTask
    ) {}

    public function run(array $data)
    {
        $user = Auth::user();

        if (!Hash::check($data['old_password'], $user->password)) {
            throw ValidationException::withMessages([
                'old_password' => ['The current password does not match.'],
            ]);
        }

        return $this->updateUserPasswordTask->run($user, $data['new_password']);
    }
}
