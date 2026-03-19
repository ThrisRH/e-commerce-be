<?php

namespace App\Facades;

use App\Services\AttributeValidatorService;
use Illuminate\Support\Facades\Facade;

class AttributeValidatorFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return AttributeValidatorService::class;
    }
}
