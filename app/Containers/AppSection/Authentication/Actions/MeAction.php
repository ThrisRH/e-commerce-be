<?php

namespace App\Containers\AppSection\Authentication\Actions;

use App\Ship\Parents\Actions\Action;

class MeAction extends Action
{
    public function run()
    {
        return auth('api')->user();
    }
}
