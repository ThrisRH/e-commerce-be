<?php

namespace App\Facades;

use App\Services\AttributeService;
use Illuminate\Support\Facades\Facade;

class AttributeFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return AttributeService::class;
    }
}
