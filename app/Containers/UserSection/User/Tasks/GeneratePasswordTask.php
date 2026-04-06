<?php

namespace App\Containers\UserSection\User\Tasks;

use App\Ship\Parents\Tasks\Task;
use Illuminate\Support\Str;

class GeneratePasswordTask extends Task
{
    public function run()
    {
        return Str::random(8, true, true, true, false);
    }
}
