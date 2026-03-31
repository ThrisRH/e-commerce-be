<?php

namespace App\Containers\HomeSection\Category\UI\API\Controllers;

use App\Containers\HomeSection\Category\Actions\GetCateSectionAction;
use App\Containers\HomeSection\Category\UI\API\Transfomers\HomeTransformer;
use App\Ship\Helper\ApiResponse;
use App\Ship\Parents\Controllers\Controller;

class HomeController extends Controller
{
    public function index(GetCateSectionAction $action)
    {
        $data = $action->run();

        return ApiResponse::success(new HomeTransformer()->collection($data));
    }
}
